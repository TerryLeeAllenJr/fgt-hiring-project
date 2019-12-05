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
      created() {
        console.info('BlogListPageView loaded')
      }
    }
</script>
