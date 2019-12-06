<template>
    <div class="col bg-dark py-4 px-4" id="body-col">
        <div class="row">

            <div class="col-sm-12 col-md-3 my-3">
                <div class="card blog-card">
                    <div class="thumbnail text-center">
                        <img class="card-img-top" src="http://lorempixel.com/800/800" alt="Card image cap">
                        <div class="thumbnail--category text-justify text-center align-middle">
                            <p>Modern Machines</p>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Read</a>
                    </div>
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
