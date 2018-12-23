import axios from 'axios';

let service = {
  "list": function () {
    return axios.get('/api/service/')
  },
  "create": function (params) {
    return axios.post('/api/service/', params)
  }
}

export {service};