<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Create or Edit a Post</div>
            <div class="card-body">
                <form @submit="storeCategory">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" v-model="category.name">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" v-model="category.slug">
                    </div>
                    <div class="form-group">
                        <label for="category">Parent Category</label>
                        <select class="form-control" id="category" v-model="category.parent_id">
                            <option disabled value="">Please select one</option>
                            <option v-for="thisCategory in categories" :value="thisCategory.id">{{thisCategory.name}}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

  // The default values to use on the Create Post page.
  const defaultCategory = {
    id: null,
    name: '',
    slug: '',
    parent_id: null
  };
  export default {
    data: () => {
      return  {
        categories: {},
        category:defaultCategory,
      }
    },
    methods: {
      storeCategory(e) {
        e.preventDefault();
        if(this.category.id != null) {
          console.info('updating current category');
          axios({
            method: 'put',
            url: 'api/categories/'+this.category.id,
            data: {
              name: this.category.name,
              slug: this.category.slug,
              parent_id: this.category.parent_id
            }
          }).then((res)=>{
            this.$router.push('/categories')
          });
        } else {
          axios({
            method: 'post',
            url: 'api/categories',
            data: {
              name: this.category.title,
              slug: this.category.slug,
              parent_id: this.category.parent_id,
            }
          }).then((res)=>{
            this.$router.push('/categories')
          });
        }

      }
    },
    mounted() {
      // Get the list of categories to populate the Parent dropdown.
      axios.get('api/categories').then((res)=>{
        // Set the categories value, then set the default selected category to the first one returned.
        this.categories = res.data.data.data;
      })

      // Check to see if the route has an entry ID to set the fields accordingly.
      if(this.$route != null && this.$route.params.id != null) {
        axios.get('api/categories/'+this.$route.params.id).then((res) =>{
          this.category = res.data.data;
        });
      }else {
        this.category = defaultPost;
      }
    },
    created() {


    },
    watch: {
      '$route' (to, from) {
        if(to.params.id == null) {
          this.category = defaultStatus;
        }
      }
    }
  }
</script>
