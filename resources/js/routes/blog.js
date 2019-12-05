import VueRouter from 'vue-router';

let routes = [
  {
    path: '/',
    component: require('../views/BlogListPage.vue').default
  },
  {
    path: '/:id',
    component: require('../views/BlogDetailPage.vue').default
  }

];

export default new VueRouter({
  routes: routes
})
