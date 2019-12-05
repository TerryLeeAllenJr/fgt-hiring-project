<template>
    <div class="col-md-2">
        <div class="card">
            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <router-link class="nav-link" to="/">Dashboard</router-link>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Posts</a>
                        <div class="dropdown-menu">
                            <router-link class="nav-link" to="/posts">List</router-link>
                            <router-link class="nav-link" to="/posts/create">Create New</router-link>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
                        <div class="dropdown-menu">
                            <router-link class="nav-link" to="/categories">List</router-link>
                            <router-link class="nav-link" to="/categories/create">Create New</router-link>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data: () => {
      return  {}
    },
    methods: {},
    created() {}
  }
</script>
