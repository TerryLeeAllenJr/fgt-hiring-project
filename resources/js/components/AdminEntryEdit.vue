<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Create or Edit a Post</div>
            <div class="card-body">
                <form @submit="storePost">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" v-model="post.title">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" v-model="post.slug">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" v-model="post.category_id">
                            <option disabled value="">Please select one</option>
                            <option v-for="category in categories" :value="category.id">{{category.name}}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="short_desc">Short Description</label>
                        <ckeditor id="short_desc" :editor="editor" v-model="post.short_desc" :config="editorConfig"></ckeditor>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <ckeditor id="description" :editor="editor" v-model="post.desc" :config="editorConfig"></ckeditor>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

  import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

  // The default values to use on the Create Post page.
  const defaultPost = {
    id: null,
      title: '',
      slug: '',
      category_id: null,
      short_desc: '',
      desc: ''
  };
  export default {
    data: () => {
      return  {
        editor: ClassicEditor,
        editorConfig: {
          // The configuration of the editor.
        },
        editorData: '<p>Content of the editor.</p>',
        categories: {},
        post:defaultPost,
      }
    },
    methods: {
      storePost(e) {
        e.preventDefault();

        let method = (this.post.id != null) ? 'put' : 'post';
        let url = (this.post.id != null) ? 'api/entries/'+this.post.id : 'api/entries/';

        if(this.post.id != null) {
          axios({
            method: 'put',
            url: 'api/entries/'+this.post.id,
            data: {
              title: this.post.title,
              slug: this.post.slug,
              category_id: this.post.category_id,
              short_desc: this.post.short_desc,
              desc: this.post.desc
            }
          }).then((res)=>{
            this.$router.push('/posts')
          });
        } else {
          axios({
            method: 'post',
            url: 'api/entries',
            data: {
              title: this.post.title,
              slug: this.post.slug,
              category_id: this.post.category_id,
              short_desc: this.post.short_desc,
              desc: this.post.desc
            }
          }).then((res)=>{
            this.$router.push('/posts')
          });
        }

      }
    },
    mounted() {

      // Get the categories to use in the dropdown.
      axios.get('api/categories').then((res)=>{
        // Set the categories value, then set the default selected category to the first one returned.
        this.categories = res.data.data.data;
      })

      // Check to see if the route has an entry ID.
      if(this.$route != null &&this.$route.params.id != null) {
        axios.get('api/entries/'+this.$route.params.id).then((res) =>{
          this.post = res.data.data;
        });
      }else {
        this.post = defaultPost;
      }
    },
    watch: {
      '$route' (to, from) {
        if(to.params.id == null) {
          this.post = defaultPost;
        }
      }
    }
  }
</script>
