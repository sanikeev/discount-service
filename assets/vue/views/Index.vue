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
                    <label for="fio" class="col-sm-4 col-md-4 col-form-label text-right">ФИО</label>
                    <div class="col-sm-6 col-md-6">
                        <input required type="text" class="form-control" id="fio" v-model="form.full_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-md-4 col-form-label text-right">Услуги</label>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-check" v-for="serv in service">
                            <input v-model="form.service" class="form-check-input" type="checkbox" v-bind:value="serv.id" v-bind:id="'check' + serv.id">
                            <label class="form-check-label" v-bind:for="'check' + serv.id">{{ serv.title }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="birthday" class="col-sm-4 col-md-4 col-form-label text-right">Дата рождения</label>
                    <div class="col-sm-6 col-md-6">
                        <input required type="text" class="form-control" id="birthday" v-model="form.birthday">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-6 col-md-4 col-form-label text-right">Телефон</label>
                    <div class="col-sm-6 col-md-6">
                        <input type="text" class="form-control" id="phone" v-model="form.phone">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-md-4 col-form-label text-right">Пол</label>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="female" v-model="form.gender">
                            <label class="form-check-label" for="inlineRadio1">Женский</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="male" v-model="form.gender">
                            <label class="form-check-label" for="inlineRadio2">Мужской</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-md-4 col-form-label"></label>
                    <div class="col-sm-6 col-md-6">
                        <button type="submit" class="btn btn-primary">Расчитать</button>
                        <button type="reset" class="btn btn-danger">Сброс</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
  import {service} from '../services/service';
  import OrderService from '../services/order';

  export default {
    name: "Index",
    data: function () {
      return {
        form: {
          "birthday": null,
          "phone": null,
          "service": [],
          "full_name": null,
          "gender": null
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
    methods : {
      submit() {
        OrderService.apply(this.form).then(data => {
          this.isSubmitted = true
          this.msg = data
        });
      }
    }
  }
</script>

<style scoped>
    form {
        width: 100%;
    }
</style>