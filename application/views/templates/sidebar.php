<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu Master</li>
            <li><a href="<?php echo base_url() . 'admin/dashboard' ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="<?php echo base_url() . 'tukang' ?>"><i class="fa fa-gavel"></i> <span>Tukang</span></a></li>
            <li><a href="<?php echo base_url() . 'user' ?>"><i class="fa fa-user"></i> <span>User</span></a></li>
            <li><a href="<?php echo base_url() . 'transaksi' ?>"><i class="fa fa-credit-card"></i> <span>Transaksi Jasa</span></a></li>
            <li><a href="<?php echo base_url() . 'orderan' ?>"><i class="fa fa-shopping-cart"></i> <span>Orderan Tukang</span></a></li>
            <li><a href="<?php echo base_url() . 'jasa' ?>"><i class="fa fa-list"></i> <span>List Jasa</span></a></li>
            <li><a href="<?php echo base_url() . 'chart1/chart' ?>"><i class="fa fa-pie-chart"></i> <span>Grafik Transaksi Jasa</span></a></li>
            <li><a href="<?php echo base_url() . 'login/logout' ?>"><i class="fa fa-sign-out"></i> <span>logout</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>