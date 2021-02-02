        <!-- SIDEBAR -->
        <aside class="site-sidebar scrollbar-enabled clearfix">
        <!-- Sidebar Menu -->
        <!-- li selected menu : current-page active -->
        <!-- text color for selected : span : color-color-scheme -->
        <!--  -->
        <nav class="sidebar-nav">
            <ul class="nav in side-menu">
                <?php
                $menus = $this->omah->get_navs_html("", "app");
                if(count($menus) > 0) {
                    foreach($menus as $m) {
                        echo $m;
                    }
                }
                ?>
                <?php
                $menus = $this->omah->get_navs_html("", "report");
                if(count($menus) > 0) {
                ?>
                <li class="list-divider"></li>
                <?php
                    foreach($menus as $m) {
                        echo $m;
                    }
                }
                ?>
                <?php
                $menus = $this->omah->get_navs_html("", "system");
                if(count($menus) > 0) {
                ?>
                <li class="list-divider"></li>
                <?php
                    foreach($menus as $m) {
                        echo $m;
                    }
                }
                ?>
            </ul>
            <!-- /.side-menu -->
        </nav>
        <!-- /.sidebar-nav -->
        </aside>
        <!-- /.site-sidebar -->