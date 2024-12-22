<?php

function event_breadcrumb(){
    global $post;  

    if ( is_front_page() && is_home() ) {
        $title = esc_html__( 'Home', 'harry' );
    }
    elseif ( is_front_page() ) {
        $title = esc_html__( 'Front Page', 'harry' );
    }
    elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts') );
        }
    }
    elseif ( is_single() && 'post' == get_post_type() ) {
      $title = get_the_title();
    } 
    elseif ( is_single() && 'service' == get_post_type() ) {
      $title = get_the_title();
    } 
    elseif ( is_single() && 'product' == get_post_type() ) {
        $title = get_theme_mod( 'breadcrumb_product_details', __( 'Shop', 'harry' ) );
    } 
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'harry' ) . get_search_query();
    } 
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'harry' );
    } 
    elseif ( is_archive() ) {
        $title = get_the_archive_title();
    } 
    else {
        $title = get_the_title();
    }



    $_id = get_the_ID();

    if ( is_single() && 'product' == get_post_type() ) { 
        $_id = $post->ID;
    } 
    elseif ( function_exists("is_shop") AND is_shop()  ) { 
        $_id = wc_get_page_id('shop');
        
    } 
    elseif ( is_home() && get_option( 'page_for_posts' ) ) {
        $_id = get_option( 'page_for_posts' );
    }


    // $breadcrumb_bg_img = get_theme_mod('breadcrumb_bg_img');
    $breadcrumb_switch = function_exists('get_field') ? get_field('breadcrumb_switch',$_id) : null;
    $breadcrumb_img = function_exists('get_field') ? get_field('
breadcrumb_img',$_id) : null;

    ?>
    <?php if(!empty($breadcrumb_switch) ) : ?>
 <!-- Start Breadcrumbs -->
    <div class="breadcrumbs" data-background="<?php echo esc_url($breadcrumb_img); ?>" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title"><?php echo event_kses($title); ?></h1>
                        <ul class="breadcrumb-nav">
                           <?php bcn_display(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

   


    <?php endif; ?>
<?php
}

add_action( 'event_header_before' , 'event_breadcrumb' );