<nav class="sidebar sidebar-offcanvas" id="sidebar">

    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">
          
          <span class="menu-title"  >Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="ti-palette menu-icon"></i>
          <span class="menu-title">Manage products</span>
          <i class="menu-arrow"></i>
        </a>

        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.products')}}">manage Products</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.product.create')}}">Add Products</a></li>

          </ul>
        </div>

      </li>

      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#category-pages" aria-expanded="false" aria-controls="ui-basic">
          <i class="ti-palette menu-icon"></i>
          <span class="menu-title">Manage category</span>
          <i class="menu-arrow"></i>
        </a>

        <div class="collapse" id="category-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.categories')}}">manage category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.category.create')}}">Add category</a></li>

          </ul>
        </div>

      </li>


           
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#brand-pages" aria-expanded="false" aria-controls="ui-basic">
          <i class="ti-palette menu-icon"></i>
          <span class="menu-title">Manage Brand</span>
          <i class="menu-arrow"></i>
        </a>

        <div class="collapse" id="brand-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.brands')}}">manage brand</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.brand.create')}}">Add brand</a></li>

          </ul>
        </div>

      </li>


   
      <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <i class="ti-pie-chart menu-icon"></i>
          <span class="menu-title">Charts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="ti-view-list-alt menu-icon"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/themify.html">
          <i class="ti-star menu-icon"></i>
          <span class="menu-title">Icons</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="ti-write menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>