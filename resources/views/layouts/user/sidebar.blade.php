<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{route('home')}}" class="app-brand-link">
        
        <span class="app-brand-logo demo">
            <img src="{{ asset('img/logo.png') }}" alt="Brand Logo" width="60">
        </span>
        <span class="app-brand-text demo menu-text fw-bolder">Monitoring</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a href="{{ route('home')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      <li class="menu-item {{ request()->routeIs('arus') ? 'active' : '' }}">
            <a href="{{ route('arus', 1) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cube"></i>
                <div data-i18n="Basic">Arus</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('tegangan') ? 'active' : '' }}">
            <a href="{{ route('tegangan', 1) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cube"></i>
                <div data-i18n="Basic">Tegangan</div>
            </a>
        </li>
      <li class="menu-item {{request()->routeIs('id_dmcr',1) ? 'active' : ''}}">
        <a href="{{ route('id_dmcr',1) }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-cube"></i>
          <div data-i18n="Basic">DMCR</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{ route('logout') }}" class="menu-link"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="menu-icon tf-icons bx bx-log-out-circle"></i>
            <div data-i18n="Basic">Logout</div>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
      {{-- <li class="menu-item">
        <a href="{{ route('suhu') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-cube"></i>
          <div data-i18n="Basic">Suhu</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{route('tegangan')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-cube"></i>
          <div data-i18n="Basic">Tegangan</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{route('tekanan')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-cube"></i>
          <div data-i18n="Basic">Tekanan</div>
        </a>
      </li> --}}
      
      <!-- Layouts -->
      {{-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Arus</div>
        </a>
      </li> --}}
    </ul>
  </aside>