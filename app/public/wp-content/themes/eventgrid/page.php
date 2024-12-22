<?php get_header()?>

<div class="et-page-area pt-120 pb-120">
    <div class="container">
		<div class="row">
			<div class="col-xxl-12">
				<div class="et-page-content">
					<?php if (have_posts()): while (have_posts()): the_post();?>
						
		                        <?php the_content();?>
		                    <?php endwhile;else: ?>
                                        <p><?php _e('No Page Posts To Display.');?></p>
                    <?php endif;?>
				</div>
			</div>
		</div>
    </div>
</div>

<?php get_footer()?>