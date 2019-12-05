import VueRouter from 'vue-router';

let routes = [
  {
    path: '/',
    component: require('../views/AdminDashboardPage').default
  },
  {
    path: '/categories',
    component: require('../views/AdminCategoriesListPage').default
  },
  {
    path: '/categories/create',
    component: require('../views/AdminCategoriesEditPage.vue').default
  },
  {
    path: '/categories/edit/:id',
    component: require('../views/AdminCategoriesEditPage.vue').default
  },
  {
    path: '/posts',
    component: require('../views/AdminEntriesListPage').default
  },
  {
    path: '/posts/create',
    component: require('../views/AdminEntriesEditPage').default
  },
  {
    path: '/posts/edit/:id',
    component: require('../views/AdminEntriesEditPage').default
  }
];

export default new VueRouter({
  routes: routes
})
