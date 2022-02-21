<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('admin/img/logo/logo.png')}}" rel="icon">
  <title>Inventory</title>
  <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('admin/css/ruang-admin.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body id="page-top">
<div id="app">
  <div id="wrapper">
    <!-- Sidebar -->


    <div id="sidebar" v-show="$route.path === '/' || $route.path === '/register' ? false : true " style="display: none">
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <router-link class="sidebar-brand d-flex align-items-center justify-content-center" to="/home">
              <div class="sidebar-brand-icon">
                <img src="{{asset('admin/img/logo/logo2.png')}}">
              </div>
              <div class="sidebar-brand-text mx-3">Inventory</div>
            </router-link>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <router-link to="/home" class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></router-link>
            </li>
            <li class="nav-item">
                <router-link to="/pos" class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>POS</span></router-link>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
              Features
            </div>
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
                aria-expanded="true" aria-controls="collapseBootstrap">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Employee</span>
              </a>
              <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <router-link to="/employeecreate" class="collapse-item">Add Employee</router-link>
                    <router-link to="/employee" class="collapse-item">All Employee</router-link>
                </div>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1"
                  aria-expanded="true" aria-controls="collapseBootstrap1">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Suppliers</span>
                </a>
                <div id="collapseBootstrap1" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link to="/supplier/create" class="collapse-item">Add Suppliers</router-link>
                    <router-link to="/supplier" class="collapse-item">All Suppliers</router-link>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
                  aria-expanded="true" aria-controls="collapseBootstrap2">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Category</span>
                </a>
                <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link to="/category" class="collapse-item">Category</router-link>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap3"
                  aria-expanded="true" aria-controls="collapseBootstrap3">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Product</span>
                </a>
                <div id="collapseBootstrap3" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link to="/product" class="collapse-item">All Product</router-link>
                    <router-link to="/product/create" class="collapse-item">Product Create</router-link>
                    <router-link to="/stock" class="collapse-item">Product Stock</router-link>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
                  aria-expanded="true" aria-controls="collapseBootstrap4">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Expense</span>
                </a>
                <div id="collapseBootstrap4" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link to="/expense" class="collapse-item">All Expense</router-link>
                    <router-link to="/expense/create" class="collapse-item">Expense Create</router-link>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap5"
                  aria-expanded="true" aria-controls="collapseBootstrap5">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Salary</span>
                </a>
                <div id="collapseBootstrap5" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link to="/given-salary" class="collapse-item">Pay  Salary</router-link>
                    <router-link to="/salary" class="collapse-item">All Salary</router-link>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap6"
                  aria-expanded="true" aria-controls="collapseBootstrap6">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Customer</span>
                </a>
                <div id="collapseBootstrap6" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link to="/customer/create" class="collapse-item">Create Customer</router-link>
                    <router-link to="/customer" class="collapse-item">All Customer</router-link>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap7"
                  aria-expanded="true" aria-controls="collapseBootstrap7">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Order</span>
                </a>
                <div id="collapseBootstrap7" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link to="/order" class="collapse-item">Today Order</router-link>
                    <router-link to="/search" class="collapse-item">Serach</router-link>
                  </div>
                </div>
              </li>
            <hr class="sidebar-divider">
            <div class="version" id="version-ruangadmin"></div>
          </ul>
    </div>


    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->


        <div id="maintopbar" v-show="$route.path === '/' || $route.path === '/register' ? false : true " style="display: none">
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top" id=""  >
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <img class="img-profile rounded-circle" src="{{asset('admin/img/boy.png')}}" style="max-width: 60px">
                      <span class="ml-2 d-none d-lg-inline text-white small">Maman Ketoprak</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                      {{--  <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                      </a>  --}}
                      <router-link class="dropdown-item" to="/logout"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout</route-link>

                    </div>
                  </li>
                </ul>
              </nav>
        </div>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
        <router-view></router-view>
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; 2022 - developed by
              <b><a href="#" target="_blank">Shakil</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>
</div>
  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('admin/js/ruang-admin.min.js')}}"></script>
  <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script>

  <script type="text/javascript">
    let token=localStorage.getItem('token');
    if(token)
    {
        $("#maintopbar").css("display","");
        $("#sidebar").css("display","");
    }
  </script>
</body>

</html>
