<?php 
$header_logo_image = get_theme_mod('header_logo_image',get_template_directory_uri() . '/assets/images/logo/logo.svg');
$header_btn_text = get_theme_mod('header_btn_text','Get Started');
$header_btn_url = get_theme_mod('header_btn_url','#');


?>

<!-- Start Header Area -->
<header class="header navbar-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="nav-inner">
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="<?php echo site_url('/home'); ?>">
                            <img src="<?php echo esc_url($header_logo_image)?>">
                        </a>
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <?php event_menu();?>
                            </ul>
                        </div> <!-- navbar collapse -->
                        <div class="button">
                            <a href="<?php echo esc_url($header_btn_url)?>"
                                class="btn"><?php echo esc_html($header_btn_text)?><i class="lni lni-ticket"></i></a>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</header>
<!-- End Header Area -->
<?php 
     
     ?>