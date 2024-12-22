  <div class="col-lg-6 col-md-6 col-12">
    <!-- Start Single Blog -->
    <div class="single-blog-grid">
        <div class="blog-img">
            <a href="<?php the_permalink();?>">
                <?php the_post_thumbnail(); ?>
            </a>
            <p class="date">
                <?php the_time('d')?>
                <span class="day">
                    <?php the_time('M') ?>
                </span>
            </p>
        </div>
        <div class="blog-content">
            <a class="category" href="<?php the_permalink();?>"><?php the_category()?></a>
            <h4>
                <a href="<?php the_permalink()?>
"><?php the_title();?></a>
            </h4>
            <p><?php the_excerpt();?></p>
            <a href="<?php the_permalink()?>" class="more-btn">Read Blog <i
                    class="lni lni-arrow-right"></i></a>
        </div>
    </div>
    <!-- End Single Blog Grid -->
</div>