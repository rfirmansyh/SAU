<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="d-flex justify-content-center my-4  d-sm-">
        <a href="index.html" class="col-auto text-center">
          <img src="{{ asset('img/logo/logo-unej.png') }}" alt="logo" style="width: 70%" class="shadow-light rounded-circle img-fluid">
        </a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          {{-- acitve --}}
          <li class="{{ Request::is('home') ? 'active' : ''}}">
            <a href="{{ route('index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          </li>
          <li class="menu-header">Audit</li>
          <li class="{{ Request::is('unitkerja*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('unitkerja.index') }}"><i class="far fa-newspaper"></i> <span>Unit Kerja</span></a>
          </li>
          <li class="{{ Request::is('kertaskerja*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('kertaskerja.index') }}"><i class="far fa-file-alt"></i> <span>Kertas Kerja</span></a>
          </li>
          <li class="{{ Request::is('dtm*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('kertaskerja.dtm.index') }}"><i class="far fa-file-alt"></i> <span>DTM</span></a>
          </li>
          <li class="{{ Request::is('profile') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('profile') }}"><i class="far fa-user"></i> <span>Profil</span></a>
          </li>
        </ul>

    </aside>
</div>