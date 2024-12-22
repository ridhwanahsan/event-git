<?php get_header();?>



<section class="section blog-grid-page bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <div class="row">
                    <?php if (have_posts()): while (have_posts()): the_post();?>
                    <?php get_template_part('template-parts/content');?>
                    <?php endwhile;else: ?>
                    <p><?php _e('No Posts To Display.');?></p>
                    <?php endif;?>



                </div>
                <!-- Pagination -->
                <?php event_navigation()?>
                <!--/ End Pagination -->
            </div>
            <aside class="col-lg-4 col-md-12 col-12">
                <div class="sidebar">
                    <?php get_sidebar();?>
                </div>
            </aside>
        </div>
    </div>
</section>














<?php get_footer();?>