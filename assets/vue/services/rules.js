import axios from 'axios';

export default {
  list: function () {
    return axios.get('/api/rule/').then(data => data.data)
  },
  create: function (form) {
    return axios.post('/api/rule/', form).then(data => data.data)
  },
  update: function (id, form) {
    return axios.put('/api/rule/' + id, form).then(data => data.data)
  },
  get: function (id) {
    return axios.get('/api/rule/' + id).then(data => data.data)
  },
  del: function (id) {
    return axios.delete('/api/rule/' + id)
  }
}