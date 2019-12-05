
require('./bootstrap');

import router from './routes/admin.js';

const app = new Vue({
  el: '#app',
  data: {
    'categories': {},
    'posts': {},
    'currentPage': 1,
    'selectedCategory': 0

  },
  mounted() {
    axios.get('api/categories').then((res)=>{
      // Set the categories value, then set the default selected category to the first one returned.
      this.categories = res.data.data.data;
      this.selectedCategory = this.categories[0].id;

      // Broadcast the categories-updated event so that the children components can update.
      Event.$emit('categories-updated',this.categories);

    }).then(()=>{
      axios.get('api/entries?category_id='+this.categories[0].id+'&limit=5',).then((res)=>{

        // Sending over the whole response so that we can hook up pagination.
        this.posts = res.data.data;

        // Broadcast the posts-update event so that the children components can update.
        Event.$emit('posts-updated',this.posts);

      });
    });
  },
  created() {

    // Listen for the categories to be updated and update accordingly.
    Event.$on('selected-category-updated', (categoryId) => {
      this.selectedCategory = categoryId;

      axios.get('api/entries?category_id='+this.selectedCategory+'&limit=5',).then((res)=>{

        // Sending over the whole response so that we can hook up pagination.
        this.posts = res.data.data;

        // Broadcast the posts-update event so that the children components can update.
        Event.$emit('posts-updated',this.posts);

      });

    });

    // Listen for the page to be update and update accordingly.
    Event.$on('current-page-updated', (selectedPage) => {
      this.currentPage = selectedPage;
      axios.get('api/entries?category_id='+this.selectedCategory+'&limit=5&page='+this.currentPage,).then((res)=>{

        // Sending over the whole response so that we can hook up pagination.
        this.posts = res.data.data;

        // Broadcast the posts-update event so that the children components can update.
        Event.$emit('posts-updated',this.posts);

      });
    });
  }
});
