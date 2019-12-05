
require('./bootstrap');

import router from './routes/admin.js';

const app = new Vue({
  el: '#app',
  router:router,
  data: {},
  mounted() {},
  created() {}
});
