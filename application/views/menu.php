<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?= base_url("assets/img/profile_small.jpg")?>" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="">Profile</a></li>
                                <li><a href="">Contacts</a></li>
                                <li><a href="">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            ts.io
                        </div>
                    </li>
                    <li>
                        <a href="<?= base_url("index.php/dashboard")?>"><i class="fa fa-line-chart"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url("index.php/medias")?>"><i class="fa fa-list-alt"></i> <span class="nav-label">Medias</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url("index.php/tags")?>"><i class="fa fa-tag"></i> <span class="nav-label">Tags</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url("index.php/mentions")?>"><i class="fa fa-bookmark"></i> <span class="nav-label">Mentions</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url("index.php/invoices")?>"><i class="fa fa-suitcase"></i> <span class="nav-label">Invoices</span></a>
                    </li>
                </ul>

            </div>
        </nav>