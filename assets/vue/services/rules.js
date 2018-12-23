import axios from 'axios';

export default {
  list: function () {
    return axios.get('/api/rule/').then(data => data.data)
  },
  create: function (form) {
    return axios.post('/api/rule/', form).then(data => data.data)
  }
}