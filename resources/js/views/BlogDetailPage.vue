<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-1">
                                <a class="detail-header-icon" href="/"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-md-11">
                                <p class="detail-created-at text-right">Created on {{ postedDate }} by {{post.user.name}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row detail-body">
                            <div class="col-md-4">
                                <h1>{{post.title}}</h1>
                                <p>{{post.short_desc}}</p>
                                <hr/>
                            </div>
                            <div class="col-md-8">
                                <img src="https://placehold.it/800x800"/>
                            </div>
                        </div>
                        <div class="row detail-body">
                            <div class="col-md-12">
                                <p>{{post.desc}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

  import moment from 'moment';

  export default {
    data: () => {
      return {
        id: 0,
        post: {
          user:{
            name:''
          }
        }
      }
    },
    created() {

      this.id = this.$route.params.id;

      axios.get('api/entries/'+this.id).then((res) =>{
        this.post = res.data.data;
      });

    },
    computed: {
      postedDate() {
        return moment(this.post.created_at).format('MMMM Do, YYYY');
      }
    }

  }
</script>
