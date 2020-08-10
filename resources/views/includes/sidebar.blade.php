    <?php $role = Auth::user()->roles; ?>
    
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
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

      @if($role == "USER")
        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Dashboard</span></a>
        </li>
      @endif 
      <!-- Nav Item - Photo on Page -->
      

      <li class="nav-item {{ Request::is('purchases') || Request::is('purchases/create')  ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#purchasescollapsePages" aria-expanded="true" aria-controls="purchasescollapsePages">
          <i class="fas fa-cart-arrow-down"></i>
          <span>Pembelian</span>
        </a>
        <div id="purchasescollapsePages" class="collapse {{ Request::is('purchases') || Request::is('purchases/create')  ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('purchases/create') ? 'active' : '' }}" href="{{ route('purchases.create') }}">Input Data Pembelian</a>
            @if($role == "USER")
              <div class="dropdown-divider"></div>
              <a class="collapse-item {{ Request::is('purchases') ? 'active' : '' }}" href="{{ route('purchases.index') }}">Data Pembelian</a>
            @endif
          </div>
        </div>
      </li>

      <!-- <li class="nav-item {{ Request::is('support_purchases') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('support_purchases') }}">
          <i class="fas fa-cart-plus"></i>
          <span>Pembelian - Support</span></a>
      </li> -->


      <li class="nav-item {{ Request::is('sales') || Request::is('sales/create') ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#salescollapsePages" aria-expanded="true" aria-controls="salescollapsePages">
          <i class="fas fa-cash-register"></i>
          <span>Penjualan</span>
        </a>
        <div id="salescollapsePages" class="collapse {{ Request::is('sales') || Request::is('sales/create') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('sales/create') ? 'active' : '' }}" href="{{ route('sales.create') }}">Input Data Penjualan</a>
            @if($role == "USER")
              <div class="dropdown-divider"></div>
              <a class="collapse-item {{ Request::is('sales') ? 'active' : '' }}" href="{{ route('sales.index') }}">Data Penjualan</a>
            @endif
          </div>
        </div>
      </li>
      
      <li class="nav-item {{ Request::is('weightdata') || Request::is('weightdata/create') ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#weightdatacollapsePages" aria-expanded="true" aria-controls="weightdatacollapsePages">
          <i class="fas fa-fw fa-balance-scale"></i>
          <span>Data Timbangan</span>
        </a>
        <div id="weightdatacollapsePages" class="collapse {{ Request::is('weightdata/create') || Request::is('weightdata') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('weightdata/create') ? 'active' : '' }}" href="{{ route('weightdata.create') }}">Input Data Timbangan</a>
            @if($role == "USER")
            <div class="dropdown-divider"></div>
            <a class="collapse-item {{ Request::is('weightdata') ? 'active' : '' }}" href="{{ route('weightdata.index') }}">Data Timbangan</a>
            @endif
          </div>
        </div>
      </li>


      <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item {{ Request::is('farmers') || Request::is('farmers/create') ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#farmerscollapsePages" aria-expanded="true" aria-controls="farmerscollapsePages">
          <i class="fas fa-address-card"></i>
          <span>Petani</span>
        </a>
        <div id="farmerscollapsePages" class="collapse {{ Request::is('farmers') || Request::is('farmers/create') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('farmers/create') ? 'active' : '' }}" href="{{ route('farmers.create') }}">Daftarkan Petani Baru</a>
            <div class="dropdown-divider"></div>
            <a class="collapse-item {{ Request::is('farmers') ? 'active' : '' }}" href="{{ route('farmers.index') }}">Data Petani</a>
          </div>
        </div>
      </li>
      
      <!-- Divider -->
      @if($role == "USER")
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item {{ Request::is('reports') ? 'active' : '' }}">
          <a class="nav-link" href="#" data-toggle="collapse" data-target="#reportcollapsePages" aria-expanded="true" aria-controls="reportcollapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan</span>
          </a>
          <div id="reportcollapsePages" class="collapse {{ Request::is('reports') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item {{ Request::is('reports') ? 'active' : '' }}" href="{{ route('reports.index') }}">Laporan Laba / Rugi</a>
            </div>
          </div>
        </li>
      @endif

      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar --
