<?php $this->load->view('templates/header'); ?>

<body class="sb-nav-fixed">
    <div class="loader"></div>
    
        <?php $this->load->view('templates/nav_admin'); ?>
    
        <div id="layoutSidenav">
            <?php $this->load->view('templates/sidebar_admin',$admin); ?>
            <div id="layoutSidenav_content">
                
                <?php $this->load->view('templates/main_admin', [$jmlBlog, $admin]); ?>
                <?php $this->load->view('templates/footer_admin', $jmlKategori); ?>
            
            </div>
        </div>


<?php $this->load->view('templates/footer'); ?>