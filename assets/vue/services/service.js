import axios from 'axios';

let service = {
  "list": function () {
    return axios.get('/api/service/')
  },
  "create": function (params) {
    return axios.post('/api/service/', params)
  },
  "get": function (id) {
    return axios.get('/api/service/' + id).then(data => data.data)
  },
  "update": function (id, params) {
    return axios.put('/api/service/' + id, params)
  },
  "del": function (id) {
    return axios.delete('/api/service/' + id)
  }
}

export {service};