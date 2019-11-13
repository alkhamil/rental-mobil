<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <!-- Images -->
  <div class="app-sidebar__user">
    <img class="app-sidebar__user-avatar" src="<?php echo base_url() ?>assets/images/logo.png" alt="Rental Mobil">
  <div>
      <p class="app-sidebar__user-name">PT. KELOMPOK V</p>
      <p class="app-sidebar__user-designation">&copy; 2019</p>
    </div>
  </div>
  <ul class="app-menu">
    <!-- Menu Dashboard -->
    <li>
      <a class="app-menu__item" href="#">
        <i class="app-menu__icon fa fa-dashboard"></i>
        <span class="app-menu__label">Dashboard</span>
      </a>
    </li>

    <!-- Menu Users -->
    <li>
      <a class="app-menu__item" href="<?= base_url('user') ?>">
        <i class="app-menu__icon fa fa-user"></i>
        <span class="app-menu__label">Users</span>
      </a>
    </li>

    <!-- Menu Logout -->
    <li>
      <a class="app-menu__item" href="<?= base_url('product') ?>">
        <i class="app-menu__icon fa fa-folder"></i>
        <span class="app-menu__label">Product</span>
      </a>
    </li>

    <!-- Menu Logout -->
    <li>
      <a class="app-menu__item" href="<?= base_url('auth/logout/'.$data['role']) ?>">
        <i class="app-menu__icon fa fa-sign-out"></i>
        <span class="app-menu__label">Logout</span>
      </a>
    </li>

  </ul>
</aside>