<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Blog Posts</div>

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
                </nav>

                <div class="list-group">
                    <a :href="'#/'+post.id" class="list-group-item list-group-item-action flex-column align-items-start" v-for="post in posts.data">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{post.title}}</h5>
                            <small class="text-muted">{{post.category.name}}</small>
                        </div>
                        <div class="d-flex w-100 justify-content-between">
                            <p class="mb-1">{{post.short_desc}}</p>
                            <img src="https://placehold.it/100x100"/>
                        </div>
                    </a>
                </div>
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

        // Get the selected page from the data attribute.
        this.currentPage = e.target.getAttribute('data-selectedPage');

        Event.$emit('current-page-updated',this.currentPage);
      }
    },
    created() {
      Event.$on('posts-updated',(posts)=>{
        this.posts = posts;
        this.currentPage = posts.current_page;
      });
    }
  }
</script>
