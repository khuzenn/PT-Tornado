<div class="wrapper">
<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="#" class="logo text-white">
          <img
            src="<?= base_url("/assets/kaiadmin") ?>/assets/img/kaiadmin/tornado.png"
            alt="navbar brand"
            class="navbar-brand"
            height="80"
          />
          PT - Tornado
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
        <?php
                function showMenu($data, $link_active, $openMenu)
                {
                    foreach ($data as $menuUtama) {
                        if ($menuUtama->child) {
                ?>
                            <li class="nav-item <?php echo (in_array($menuUtama->id_menu, $openMenu)) ? 'here show' : NULL; ?>">
                                <a data-bs-toggle="collapse" href="#menu_<?php echo $menuUtama->id_menu; ?>" aria-expanded="<?php echo (in_array($menuUtama->id_menu, $openMenu)) ? 'true' : 'false'; ?>">
                                    <i class="<?php echo (empty($menuUtama->icon)) ? 'bx bx-circle' : $menuUtama->icon; ?>"></i>
                                    <p><?php echo $menuUtama->nama_menu ?></p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse <?php echo (in_array($menuUtama->id_menu, $openMenu)) ? 'show' : NULL; ?>" id="menu_<?php echo $menuUtama->id_menu; ?>">
                                    <ul class="nav nav-collapse">
                                        <?php showMenu($menuUtama->content_child, $link_active, $openMenu); ?>
                                    </ul>
                                </div>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item <?php echo ($link_active == site_url($menuUtama->href)) ? 'active' : NULL; ?>">
                                <a class="nav-item" href="<?php echo site_url($menuUtama->href) ?>">
                                    <span class="nav-icon pb-1">
                                        <span class="svg-icon svg-icon-2">
                                            <i class="<?php echo (empty($menuUtama->icon)) ? '' : $menuUtama->icon; ?>"></i>
                                        </span>
                                    </span>
                                    <span class="nav-item"><?php echo $menuUtama->nama_menu ?></span>
                                </a>
                            </li>
                <?php
                        }
                    }
                }
                $link_active = current_url();
                showMenu($ShowMenu, $link_active, $openMenu);
                ?>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->