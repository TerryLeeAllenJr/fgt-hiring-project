<template>
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>MAIN MENU</small>
            </li>
            <!-- /END Separator -->
            <router-link :to="/" class="bg-light list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-book fa-fw mr-3"></span>
                    <span class="menu-collapsed">Blog</span>
                </div>
            </router-link>

            <div v-if="user">
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>Settings</small>
                </li>

                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-edit fa-fw mr-3"></span>
                        <span class="menu-collapsed">Posts</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu1' class="collapse sidebar-submenu card">
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Department </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <form>
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-label">
            				    Mersedes Benz
            				  </span>
                                    </label> <!-- form-check.// -->
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-label">
            				    Nissan Altima
            				  </span>
                                    </label>  <!-- form-check.// -->
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-label">
            				    Another Brand
            				  </span>
                                    </label>  <!-- form-check.// -->
                                </form>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- card-group-item.// -->
                </div>

                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-address-card-o fa-fw mr-3"></span>
                        <span class="menu-collapsed">Categories</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu2' class="collapse sidebar-submenu card">
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Department </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <form>
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-label">
            				    Mersedes Benz
            				  </span>
                                    </label> <!-- form-check.// -->
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-label">
            				    Nissan Altima
            				  </span>
                                    </label>  <!-- form-check.// -->
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-label">
            				    Another Brand
            				  </span>
                                    </label>  <!-- form-check.// -->
                                </form>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- card-group-item.// -->
                </div>

                <a href="#submenu3" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start disabled">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-tag fa-fw mr-3"></span>
                        <span class="menu-collapsed">Tags</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu3' class="collapse sidebar-submenu card">
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Department </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <form>
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-label">
            				    Mersedes Benz
            				  </span>
                                    </label> <!-- form-check.// -->
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-label">
            				    Nissan Altima
            				  </span>
                                    </label>  <!-- form-check.// -->
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-label">
            				    Another Brand
            				  </span>
                                    </label>  <!-- form-check.// -->
                                </form>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- card-group-item.// -->
                </div>

                <a href="#submenu4" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start disabled">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-file fa-fw mr-3"></span>
                        <span class="menu-collapsed">Files</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu4' class="collapse sidebar-submenu card">
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Department </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <form>
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-label">
            				    Mersedes Benz
            				  </span>
                                    </label> <!-- form-check.// -->
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-label">
            				    Nissan Altima
            				  </span>
                                    </label>  <!-- form-check.// -->
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-label">
            				    Another Brand
            				  </span>
                                    </label>  <!-- form-check.// -->
                                </form>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- card-group-item.// -->
                </div>

            </div>


        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->
</template>

<script>
  export default {
    data: () => {
      return  {
        user: false
      }
    },
    methods: {},
    created() {},
    mounted() {
      this.user = window.user;
      console.info(this.user);
    }
  }
</script>
