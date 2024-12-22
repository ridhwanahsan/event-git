<?php get_header()?>

<?php 
$author_name = get_the_author_meta('description');


?>
<!-- Start Blog Singel Area -->
    <section class="section blog-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="single-inner">

                    
                        <div class="post-details">
                            <div class="main-content-head">
                                <div class="post-thumbnils">
                                <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="meta-information">
                                    <h2 class="post-title"><?php the_title();?>
                                    </h2>
                                    <!-- End Meta Info -->
                                    <ul class="meta-info">
                                        <li>
                                            <a href="javascript:void(0)">By <?php echo esc_html($author_name); ?> </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><?php the_time('d M y ')?></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><?php the_category()?></a>
                                        </li>
                                    </ul>
                                    <!-- End Meta Info -->
                                </div>
                                <div class="detail-inner">
                                   <?php the_content()?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Comments -->
                    <div class="post-comments">
                
    <?php if (comments_open() || get_comments_number()):
        comments_template();
    endif;
    ?>
                    </div>
                    <!-- End Comments -->
                    <!-- Start Comment Form -->
                    <!-- <div class="comment-form">
                        <h3 class="comment-reply-title">Leave a comment</h3>
                        <form action="#" method="POST">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-box form-group">
                                        <label>Your name</label>
                                        <input type="text" name="name" class="form-control form-control-custom"
                                            placeholder="Alex Deo" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-box form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control form-control-custom"
                                            placeholder="example@gmail.com" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-box form-group">
                                        <label>Comment</label>
                                        <textarea name="#" class="form-control form-control-custom"
                                            placeholder="Write your Comments"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="button">
                                        <button type="submit" class="btn">Post Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> -->
                    <!-- End Comment Form -->
                </div>
                <aside class="col-lg-4 col-md-12 col-12">
                    <div class="sidebar">
                        <!-- Start Single Widget -->
                        <?php get_sidebar();?>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->


<?php get_footer()?>