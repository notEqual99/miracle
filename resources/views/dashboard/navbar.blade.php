    
    <!-- wrapper -->
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="sidebar border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Miracle </div>
            <div class="list-group list-group-flush">
                <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action">Dashboard</a>
                <!-- <button class="dropdown-btn">Dropdown 
                    <i class="fa fa-caret-down"></i>
                </button> -->
                <a href="#" class="list-group-item dropdown-btn list-group-item-action" id="dropdown1">Products Cat&Type
                    <i class="fa fa-caret-down"></i>
                </a>
                <div class="dropdown-container" id="dropdown-container">
                    <a href="{{route('categories.index')}}" class="list-group-item list-group-item-action">
                        - Categories
                    </a>
                    <a href="{{route('types.index')}}" class="list-group-item list-group-item-action">
                        - Types
                    </a>
                </div>
               
                <a href="{{route('products.index')}}" class="list-group-item list-group-item-action">Products</a>
                <a href="" class="list-group-item list-group-item-action">Customers</a>
                <a href="#" class="list-group-item list-group-item-action">Blogs</a>
                <a href="#" class="list-group-item list-group-item-action">Profile</a>
                <a href="#" class="list-group-item list-group-item-action">Status</a>
                
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light border-bottom">
                <a class="" id="menu-toggle" href=""><img src="https://img.icons8.com/bubbles/50/000000/menu.png"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                    </li> -->
                    <li class="hov nav-item dropdown">
                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="main">
                            <li>Item1</li>
                            <li><a href="{{route('logout')}}">Logout</a></li>
                            <!-- <li>Item3</li>
                            <li>Item4</li> -->
                        </ul>
                    </li>
                </ul>
                </div>
            </nav>
            <section class="section-container">
            <!-- Page content-->
            @yield('content')
            </section>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <script>
    jQuery(document).ready(function($){
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
    })
    </script>

    <!-- sidemenu dropdown -->
    <script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
    dropdownContent.style.display = "none";
    } else {
    dropdownContent.style.display = "block";
    }
    });
    }
    </script>