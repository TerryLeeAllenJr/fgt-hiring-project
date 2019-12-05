@extends('layouts.master')

@section('content')
    <div class="row" id="body-row">
        <!-- Sidebar -->
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
            <!-- Bootstrap List Group -->
            <ul class="list-group">
                <!-- Separator with title -->
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>MAIN MENU</small>
                </li>
                <!-- /END Separator -->
                <a href="#" class="bg-light list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-book fa-fw mr-3"></span>
                        <span class="menu-collapsed">Blog</span>
                    </div>
                </a>

                <!-- Separator with title -->
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>Settings</small>
                </li>

                @auth
                <!-- Menu with submenu -->
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-edit fa-fw mr-3"></span>
                        <span class="menu-collapsed">Posts</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <!-- Submenu content -->
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

                <!-- Menu with submenu -->
                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-address-card-o fa-fw mr-3"></span>
                        <span class="menu-collapsed">Categories</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <!-- Submenu content -->
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

                <!-- Menu with submenu -->
                <a href="#submenu3" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start disabled">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-tag fa-fw mr-3"></span>
                        <span class="menu-collapsed">Tags</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <!-- Submenu content -->
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

                <!-- Menu with submenu -->
                <a href="#submenu3" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start disabled">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-file fa-fw mr-3"></span>
                        <span class="menu-collapsed">Files</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <!-- Submenu content -->
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
                <!-- Separator without title -->
                <li class="list-group-item sidebar-separator menu-collapsed"></li>
                <!-- /END Separator -->
                <a href="#" class="bg-light list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-question fa-fw mr-3"></span>
                        <span class="menu-collapsed">Help</span>
                    </div>
                </a>
                <a href="#" data-toggle="sidebar-colapse" class="bg-light list-group-item list-group-item-action d-flex align-items-center">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                        <span id="collapse-text" class="menu-collapsed">Collapse</span>
                    </div>
                </a>
                @endauth
            </ul><!-- List Group END-->
        </div><!-- sidebar-container END -->

        <!-- MAIN -->
        <div class="col bg-dark py-4 px-4" id="body-col">
            <div class="row">
                <div class="col-sm-12 col-md-3 my-3">
                    <div class="card">
                        <div class="thumbnail text-center">
                            <img class="card-img-top" src="http://lorempixel.com/800/800?cache_bust={{microtime()}}" alt="Card image cap">
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
                <div class="col-sm-12 col-md-3 my-3">
                    <div class="card">
                        <div class="thumbnail text-center">
                            <img class="card-img-top" src="http://lorempixel.com/800/800?cache_bust={{microtime()}}" alt="Card image cap">
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
                <div class="col-sm-12 col-md-3 my-3">
                    <div class="card">
                        <div class="thumbnail text-center">
                            <img class="card-img-top" src="http://lorempixel.com/800/800?cache_bust={{microtime()}}" alt="Card image cap">
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
                <div class="col-sm-12 col-md-3 my-3">
                    <div class="card">
                        <div class="thumbnail text-center">
                            <img class="card-img-top" src="http://lorempixel.com/800/800?cache_bust={{microtime()}}" alt="Card image cap">
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
                <div class="col-sm-12 col-md-3 my-3">
                    <div class="card">
                        <div class="thumbnail text-center">
                            <img class="card-img-top" src="http://lorempixel.com/800/800?cache_bust={{microtime()}}" alt="Card image cap">
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
                <div class="col-sm-12 col-md-3 my-3">
                    <div class="card">
                        <div class="thumbnail text-center">
                            <img class="card-img-top" src="http://lorempixel.com/800/800?cache_bust={{microtime()}}" alt="Card image cap">
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
                <div class="col-sm-12 col-md-3 my-3">
                    <div class="card">
                        <div class="thumbnail text-center">
                            <img class="card-img-top" src="http://lorempixel.com/800/800?cache_bust={{microtime()}}" alt="Card image cap">
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
                <div class="col-sm-12 col-md-3 my-3">
                    <div class="card">
                        <div class="thumbnail text-center">
                            <img class="card-img-top" src="http://lorempixel.com/800/800?cache_bust={{microtime()}}" alt="Card image cap">
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
                <div class="col-sm-12 col-md-3 my-3">
                    <div class="card">
                        <div class="thumbnail text-center">
                            <img class="card-img-top" src="http://lorempixel.com/800/800?cache_bust={{microtime()}}" alt="Card image cap">
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
                </div><div class="col-sm-12 col-md-3 my-3">
                    <div class="card">
                        <div class="thumbnail text-center">
                            <img class="card-img-top" src="http://lorempixel.com/800/800?cache_bust={{microtime()}}" alt="Card image cap">
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
                <div class="col-sm-12 col-md-3 my-3">
                    <div class="card">
                        <div class="thumbnail text-center">
                            <img class="card-img-top" src="http://lorempixel.com/800/800?cache_bust={{microtime()}}" alt="Card image cap">
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
                </div><div class="col-sm-12 col-md-3 my-3">
                    <div class="card">
                        <div class="thumbnail text-center">
                            <img class="card-img-top" src="http://lorempixel.com/800/800?cache_bust={{microtime()}}" alt="Card image cap">
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
        </div><!-- Main Col END -->
    </div>
@endsection
