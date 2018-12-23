import axios from 'axios';

export default {
  apply (form) {
    return axios.post('/api/discount', form, { headers: {
        'Content-type': 'application/x-www-form-urlencoded',
      }
    }).then( response => response.data )
  }
}