<template>
    <div class="container">
        <div class="row justify-content-center">
            <category-sidebar></category-sidebar>
            <blog-list-by-category></blog-list-by-category>
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
        console.info('BlogListPageView loaded')
      }
    }
</script>
