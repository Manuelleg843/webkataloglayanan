        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="<?= base_url('/dashboard'); ?>" class="text-nowrap logo-img">
                        <img src="<?= base_url('/assets/images/logos/stis.png'); ?>" class="mx-1" width="40" alt="" />
                        <span class="card-title text-dark fw-bolder">Katalog Layanan STIS</span>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($tajuk == 'Dashboard') ? 'active'  : ''; ?>" href="<?= base_url('/dashboard'); ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <?php if (in_array(1, session()->get('permission')) || in_array(2, session()->get('permission'))) { ?>
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">LAYANAN</span>
                            </li>
                        <?php } ?>
                        <?php if (in_array(1, session()->get('permission'))) { ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= ($tajuk == 'Manajemen Layanan') ? 'active'  : ''; ?>" href="<?= base_url('/manajemen_layanan'); ?>" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-clipboard"></i>
                                    </span>
                                    <span class="hide-menu">Manajemen Layanan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= ($tajuk == 'Pengajuan Layanan') ? 'active'  : ''; ?>" href="<?= base_url('/create_layanan'); ?>" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-clipboard-plus"></i>
                                    </span>
                                    <span class="hide-menu">Pengajuan Layanan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= ($tajuk == 'Review Pengajuan') ? 'active'  : ''; ?>" href="<?= base_url('/review_pengajuan'); ?>" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-hourglass"></i>
                                    </span>
                                    <span class="hide-menu">Review Pengajuan</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(2, session()->get('permission'))) { ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= ($tajuk == 'Persetujuan Layanan') ? 'active'  : ''; ?>" href="<?= base_url('/manajemen_persetujuan'); ?>" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-checklist"></i>
                                    </span>
                                    <span class="hide-menu">Persetujuan Layanan</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">AUTH</span>
                        </li>
                        <?php if (in_array(3, session()->get('permission'))) { ?>
                        <?php } ?>
                        <?php if (in_array(3, session()->get('permission'))) { ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= ($tajuk == 'Manajemen Penyelenggara') ? 'active'  : ''; ?>" href="<?= base_url('/manajemen_penyelenggara'); ?>" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-home-plus"></i>
                                    </span>
                                    <span class="hide-menu">Manajemen Penyelenggara</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(4, session()->get('permission'))) { ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= ($tajuk == 'Manajemen Users') ? 'active'  : ''; ?>" href="<?= base_url('/manajemen_user'); ?>" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-user-plus"></i>
                                    </span>
                                    <span class="hide-menu">Manajemen Users</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('/logout'); ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-logout"></i>
                                </span>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->