    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sukorejo</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Main Page
      </div>

      
      <!-- Nav Item - Photo on Page -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Dashboard</span></a>
      </li>


      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-cart-arrow-down"></i>
          <span>Input Pembelian</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-cart-plus"></i>
          <span>Input Pembelian Support</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-cash-register"></i>
          <span>Input Penjualan</span></a>
      </li>
      

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Laporan</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('sales.index') }}">Laporan Penjualan</a>
            <div class="dropdown-divider"></div>
            <a class="collapse-item" href="{{ route('purchases.index') }}">Laporan Pembelian</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-user-plus"></i>
          <span>Daftarkan Petani</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar --
