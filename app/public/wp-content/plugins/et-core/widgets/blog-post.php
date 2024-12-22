<?php
namespace event_blog_post\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class event_blog_post extends Widget_Base {

	public function get_name() {
		return 'post_list';
	}

	public function get_title() {
		return __( 'post list', 'elementor-hello-world' );
	}

	public function get_icon() {
		return 'eicon-section';
	}

	public function get_categories() {
		return [ 'event_widget' ];
	}

	public function get_script_depends() {
		return [ 'elementor-hello-world' ];
	}

	protected function register_controls() {

			$this->register_controls_section();
       		 $this->style_tab_content();

	}

// content control sections 
		protected function register_controls_section() {
			// control number 1
$this->start_controls_section(
			'about_button_signature',
			[
				'label' => esc_html__( 'Button & signature', 'textdomain' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
    'post_limit',
    [
        'label' => esc_html__('Price', 'textdomain'),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'default' => 3,
    ]
);
$this->add_control(
    'post_include',
    [
        'label' => esc_html__('post include', 'textdomain'),
        'type' => \Elementor\Controls_Manager::SELECT2,
		'label_block' => true,
		'multiple' => true,
        'options' => post_cat(),
         
    ]
);
$this->add_control(
    'post_exclude',
    [
        'label' => esc_html__('post exclude', 'textdomain'),
        'type' => \Elementor\Controls_Manager::SELECT2,
		'label_block' => true,
		'multiple' => true,
        'options' => post_cat(),
         
    ]
);
$this->add_control(
    'post_title_include',
    [
        'label' => esc_html__('post title include', 'textdomain'),
        'type' => \Elementor\Controls_Manager::SELECT2,
		'label_block' => true,
		'multiple' => true,
      	'options' => get_all_post(),
         
    ]
);
$this->add_control(
    'post_title_exclude',
    [
        'label' => esc_html__('post title exclude', 'textdomain'),
        'type' => \Elementor\Controls_Manager::SELECT2,
		'label_block' => true,
		'multiple' => true,
        'options' => get_all_post(),
         
    ]
);
$this->add_control(
    'post_order',
    [
        'label' => esc_html__('Border Style', 'textdomain'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'ASC',
        'options' => [
            'asc' => esc_html__('ASC', 'textdomain'),
            'desc' => esc_html__('DESC', 'textdomain'),
            
        ],
   
    ]
);

$this->add_control(
    'post_orderby',
    [
        'label' => esc_html__('Order by', 'textdomain'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'date',
        'options' => [
            'ID' => 'Post ID',
            'author' => 'Post Author',
            'title' => 'Title',
            'date' => 'Date',
            'modified' => 'Last Modified Date',
            'parent' => 'Parent Id',
            'rand' => 'Random',
            'comment_count' => 'Comment Count',
            'menu_order' => 'Menu Order',
        ],
    ]
);


		// $this->add_control(
		// 	'button_text1',
		// 	[
		// 		'label' => esc_html__( 'Button 1 Text', 'textdomain' ),
		// 		'type' => Controls_Manager::TEXT,
		// 		'default' => esc_html__( 'Get Started', 'textdomain' ),
		// 		'placeholder' => esc_html__( 'Type your content here', 'textdomain' ),
		// 	]
		// );

		// $this->add_control(
		// 	'button_link1',
		// 	[
		// 		'label' => esc_html__( 'Button 1 Link', 'textdomain' ),
		// 		'type' => Controls_Manager::URL,
		// 		'default' => [
		// 			'url' => '',
		// 			'is_external' => true,
		// 			'nofollow' => true,
		// 		],
		// 		'label_block' => true,
		// 	]
		// );
		
		$this->end_controls_section();
	}
			

// button and signature
	

		// control style register manager 
		protected function style_tab_content() {
			$this->start_controls_section(
			'techub_style_section',
			[
				'label' => esc_html__( 'Style', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .el-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'text_color_2',
			[
				'label' => esc_html__( 'Title  Text Color ', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .el-title-2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'text_color_desc',
			[
				'label' => esc_html__( 'Desc  Text Color ', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-testimonial-left-icon a::before' => 'background: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}



		


	protected function render() {
		$settings = $this->get_settings_for_display();

		// Adding link attributes for button 1
		if ( ! empty( $settings['button_link1']['url'] ) ) {
			$this->add_link_attributes( 'button_link1', $settings['button_link1'] );
		}
		// query post_____________________

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $settings['post_limit'],
			'orderby' => $settings['post_orderby'],
			'order' => $settings['post_order'],
			'post__in' =>  $settings['post_title_include'],
			'post__not_in' => $settings['post_title_exclude'],
			
		);

 if (!empty($settings['post_include']) && !empty($settings['post_exclude'])) {

    $args['tax_query'] = array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $settings['post_include'],
            'operator' => 'IN',
        ),
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $settings['post_exclude'],
            'operator' => 'NOT IN',
        ),
    );
}
elseif(!empty($settings['post_include'] ) || !empty($settings['post_exclude'] ) ){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $settings['post_exclude'] ? $settings['post_exclude'] : $settings['post_include'],
					'operator' => $settings['post_exclude'] ? 'NOT IN' : 'IN',
				),
			);
		};
    
		$query = new \WP_Query( $args
	);
	
	// echo '<pre>';
	// var_dump($query);
		
		?>
<!-- Start Blog Section Area -->
<section class="blog-section section">
    <div class="container">
        <div class="row">
            <?php if ( $query->have_posts() ) : while( $query->have_posts()  ) : $query->the_post(); ?>
            <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".4s">
                <!-- Start Single Blog Grid -->
                <div class="single-blog-grid">
                    <div class="blog-img">
                        <a href="<?php the_permalink();?>">
                            <img src=" <?php echo get_the_post_thumbnail_url() ?: 'assets/images/blog/blog1.jpg'; ?>"
                                alt="<?php the_title_attribute();
			$categories = get_the_category(get_the_ID());
		 
			// var_dump($categories);
			
			?>">
                        </a>
                        <p class="date">
                            <?php echo get_the_date('d') ?>

                            <span class="day">
                                <?php echo get_the_date('M') ?>

                            </span>
                        </p>
                    </div>
                    <div class="blog-content">
                        <a class="category"
                            href="<?php the_permalink();?>"><?php echo esc_html($categories[0]->name);?></a>
                        <h4>
                            <a href="<?php the_permalink()?>"><?php the_title();?></a>
                        </h4>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 14); ?></p>

                        <a href="<?php the_permalink();?>" class="more-btn">Read Blog <i
                                class="lni lni-arrow-right"></i></a>
                    </div>
                </div>
                <!-- End Single Blog Grid -->
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>
<!-- End Blog Section Area -->

<!-- Blog area start -->
<section class="tp-blog-5-area pt-150 pb-105 d-none">
    <div class="container">

        <div class="row">
            <?php if ( $query->have_posts() ) : while( $query->have_posts()  ) : $query->the_post(); ?>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="tp-blog-wrapper mb-30 wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                    <div class="tp-blog-thumb">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url() ?: 'path/to/default-image.jpg'; ?>" alt="<?php the_title_attribute();
			$categories = get_the_category(get_the_ID());
		 
			// var_dump($categories);
			
			?>">
                        </a>

                    </div>
                    <div class="tp-blog-content">
                        <div class="tp-blog-date d-flex">
                            <p><?php echo esc_html($categories[0]->name);?></p>
                            <span><?php echo get_the_date()?></span>
                        </div>
                        <div class="tp-blog-content-inner">
                            <h4 class="tp-blog-content-inner-heading"><a
                                    href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                            <a class="tp-blog-btn" href="<?php the_permalink();?>">Read More <span><i
                                        class="flaticon-right-arrow"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; endif; ?>

        </div>
    </div>
</section>
<!-- Blog area end -->

<?php
	}
}
$widgets_manager->register( new event_blog_post() );