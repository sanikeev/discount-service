<template>
    <div>
        <div class="row ">
            <h1>Форма заказа</h1>
        </div>

        <div class="row">
            <div class="alert alert-success" role="alert" v-if="msg && msg.title && this.isSubmitted">
                Сработала скидка {{msg.discount}}% под названием {{ msg.title }}
            </div>
            <div class="alert alert-danger" role="alert" v-if="msg && !msg.title && this.isSubmitted">
                Не было применено ни одной скидки
            </div>
            <form @submit.prevent="submit()">
                <div class="form-group row">
                    <label for="phone" class="col-sm-6 col-md-4 col-form-label text-right">Название</label>
                    <div class="col-sm-6 col-md-6">
                        <input type="text" required class="form-control" id="title" v-model="form.title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-6 col-md-4 col-form-label text-right">Скидка</label>
                    <div class="col-sm-6 col-md-6">
                        <input type="text" required class="form-control" id="discount" v-model="form.discount_value">
                    </div>
                </div>

                <fieldset class="form-group">
                    <div class="form-group row">
                        <label class="col-sm-4 col-md-4 col-form-label text-right">Действует на услугу(и)</label>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-check" v-for="serv in service">
                                <input v-model="form.rule_param.services" class="form-check-input" type="checkbox"
                                       v-bind:value="serv.id" v-bind:id="'check' + serv.id">
                                <label class="form-check-label" v-bind:for="'check' + serv.id">{{ serv.title }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_filled" class="col-sm-4 col-md-4 col-form-label text-right">Телефон
                            заполнен</label>
                        <div class="col-sm-6 col-md-6">
                            <input type="checkbox" v-bind:value="true" class="form-check-input form-control" id="phone_filled"
                                   v-model="form.rule_param.phone_filled">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-6 col-md-4 col-form-label text-right">Последние 4 цифры
                            телефона</label>
                        <div class="col-sm-6 col-md-6">
                            <input :disabled="!form.rule_param.phone_filled" type="text" class="form-control" maxlength="4" id="phone"
                                   v-model="form.rule_param.phone_last_digits">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-md-4 col-form-label text-right">Пол</label>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                       value="female" v-model="form.rule_param.gender">
                                <label class="form-check-label" for="inlineRadio1">Женский</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                       value="male" v-model="form.rule_param.gender">
                                <label class="form-check-label" for="inlineRadio2">Мужской</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-md-4 col-form-label text-right">Дата рождения</label>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="bd1" v-bind:value="true"
                                       v-model="form.rule_param.birthday_week_before">
                                <label class="form-check-label" for="inlineRadio1">Неделя до</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="bd2" v-bind:value="true"
                                       v-model="form.rule_param.birthday_week_after">
                                <label class="form-check-label" for="inlineRadio2">Неделя после</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-6 col-md-4 col-form-label text-right">Дата начала</label>
                        <div class="col-sm-6 col-md-6">
                            <input type="text" required class="form-control" id="startAt"
                                   v-model="form.rule_param.started_at">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-6 col-md-4 col-form-label text-right">Дата окончания</label>
                        <div class="col-sm-6 col-md-6">
                            <input type="text" class="form-control" id="endAt" v-model="form.rule_param.ended_at">
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label class="col-sm-4 col-md-4 col-form-label"></label>
                    <div class="col-sm-6 col-md-6">
                        <button type="submit" class="btn btn-primary">Создать</button>
                        <button type="reset" class="btn btn-danger">Сброс</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
  import {service} from '../../../services/service';
  import rules from '../../../services/rules'

  export default {
    name: "Mutation",
    data: function () {
      return {
        form: {
          rule_param: {
            services: [],
            birthday_week_before: null,
            birthday_week_after: null,
            phone_filled: null,
            phone_last_digits: null,
            gender: null,
            started_at: null,
            ended_at: null
          },
          title: null,
          discount_value: null
        },
        service: [],
        msg: {
          discount: null,
          title: null
        },
        isSubmitted: false
      }
    },
    beforeMount() {
      service.list().then((data) => {
        this.service = data.data;
      });
    },
    methods: {
      submit() {
        rules.create(this.form).then(data => {
          window.location.replace('/admin/rules')
        })
      }
    }
  }
</script>

<style scoped>
    form {
        width: 100%;
    }
    fieldset {
        border-top: 1px solid #ccc;
    }
</style>