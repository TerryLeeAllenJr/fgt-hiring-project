<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Posts</div>
            <div class="card-body">
                <nav aria-label="post-pagination">
                    <ul class="pagination">
                        <li class="page-item" :class="{'disabled': currentPage == 1}" @click="previousPage">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>

                        <li class="page-item" v-for="n in posts.last_page" :class="{'active': currentPage === n}">
                            <a class="page-link"  href="#" @click="updateCurrentPage" :data-selectedPage="n">{{n}}</a>
                        </li>


                        <li class="page-item" :class="{'disabled': currentPage == posts.last_page}" @click="nextPage">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>

                    <ul class="list-group">
                        <li class="list-group-item" v-for="post in posts.data">
                            {{post.title}}
                            <span class="admin-list-icons">
                            <router-link :to="'/posts/edit/'+post.id" title="Edit this category.">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </router-link>
                            <a @click="deletePost"  href="#" title="Delete this category.">
                                <i :data-postId="post.id" class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </span>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data: () => {
      return  {
        posts: {},
        currentPage: 1
      }
    },
    methods: {
      deletePost(e) {
        e.preventDefault();
        // Delete the category. Normally I would have more logic surrounding a deletion, but not for this exercise.
        axios.delete('api/entries/'+e.target.getAttribute('data-postId')).then((res)=>{
          Event.$emit('posts-updated');
        });
      },
      nextPage(e) {
        e.preventDefault();
        if(this.currentPage < this.posts.last_page) {
          this.currentPage ++;
          Event.$emit('current-page-updated',this.currentPage);
        }
      },
      previousPage(e) {
        e.preventDefault();
        if(this.currentPage > 1)
          this.currentPage --;
        Event.$emit('current-page-updated',this.currentPage);
      },
      updateCurrentPage(e) {
        e.preventDefault();

        console.info('updateCurrentPage',e.target.getAttribute('data-selectedPage'));
        // Get the selected page from the data attribute.
        this.currentPage = e.target.getAttribute('data-selectedPage');

        Event.$emit('current-page-updated',this.currentPage);
      }
    },
    mounted() {
      Event.$emit('posts-updated');
    },
    created() {
      Event.$on('posts-updated',()=>{
        axios.get('api/entries?limit=25&page='+this.currentPage,).then((res)=>{

          // Sending over the whole response so that we can hook up pagination.
          this.posts = res.data.data;

          console.info(this.posts);
          // Update the current page so that the pagination works right.
          this.currentPage = this.posts.current_page;
        });
      });
      Event.$on('current-page-updated',(currentPage)=>{
        this.currentPage = currentPage;
        Event.$emit('posts-updated');
      });
    }
  }
</script>
