<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                Categories
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item" v-for="category in categories">
                        {{category.name}}
                        <span class="admin-list-icons">
                            <router-link :to="'/categories/edit/'+category.id" title="Edit this category.">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </router-link>
                            <a @click="deleteCategory"  href="#" title="Delete this category.">
                                <i :data-categoryId="category.id" class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data: () => {
      return  {
        categories: {}
      }
    },
    methods: {
      deleteCategory(e) {
        e.preventDefault();
        // Delete the category. Normally I would have more logic surrounding a deletion, but not for this exercise.
        axios.delete('api/categories/'+e.target.getAttribute('data-categoryId')).then((res)=>{
          Event.$emit('categories-updated');
        });
      }
    },
    mounted() {
      axios.get('api/categories').then((res)=>{
        // Set the categories value, then set the default selected category to the first one returned.
        this.categories = res.data.data.data;
        console.info(this.categories);
      })
    },
    created() {
      Event.$on('categories-updated',()=>{
        axios.get('api/categories').then((res)=>{
          // Set the categories value, then set the default selected category to the first one returned.
          this.categories = res.data.data.data;
          console.info(this.categories);
        })
      });
    }
  }
</script>
