<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          {{-- acitve --}}
          <li class="">
            <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          </li>
          <li class="menu-header">Audit</li>
          <li class=""><a class="nav-link" href="{{ route('unitkerja.index') }}"><i class="far fa-newspaper"></i> <span>Unit Kerja</span></a></li>
          <li class=""><a class="nav-link" href=""><i class="far fa-file-alt"></i> <span>Semua DTM</span></a></li>
          <li class=""><a class="nav-link" href="{{ url('ui/profil') }}"><i class="far fa-user"></i> <span>Auditor</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
          </a>
        </div>
    </aside>
</div>