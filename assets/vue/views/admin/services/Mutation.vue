<template>
    <div>
        <div class="row ">
            <h1>Форма услуги</h1>
        </div>
        <div class="row">
            <form @submit.prevent="submit()">
                <div class="form-group row">
                    <label for="fio" class="col-sm-4 col-md-4 col-form-label text-right">Название</label>
                    <div class="col-sm-6 col-md-6">
                        <input type="text" class="form-control" id="fio" v-model="form.title">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-md-4 col-form-label"></label>
                    <div class="col-sm-6 col-md-6">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
  import {service} from '../../../services/service'

  export default {
    name: "Mutation",
    data: function () {
      return {
        form: {
          title: null,
        }
      }
    },
    beforeCreate() {
      service.get(this.$route.params.id).then(data => {
        this.form.title = data.title
      })
    },
    methods: {
      submit() {
        let id = this.$route.params.id
        if (id) {
          service.update(id, this.form).then(data => {
            window.location.replace('/admin/services')
          })
        } else {
          service.create(this.form).then(data => {
            window.location.replace('/admin/services')
          })
        }
      }
    }
  }
</script>

<style scoped>
    form {
        width: 100%;
    }
</style>