<?php
namespace event_widget\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

class event_widget extends Widget_Base
{

    public function get_name()
    {
        return 'grid-box';
    }

    public function get_title()
    {
        return __('Grid future Widget', 'elementor-hello-world');
    }

    public function get_icon()
    {
        return 'eicon-thumbnails-right';
    }

    public function get_categories()
    {
        return ['event_widget'];
    }

    public function get_script_depends()
    {
        return ['elementor-hello-world'];
    }

    protected function register_controls()
    {

        $this->register_controls_section();
        $this->style_tab_content();

    }

    protected function register_controls_section()
    {

        $this->start_controls_section(
            'future_section_content',
            [
                'label' => esc_html__('future Section Content', 'textdomain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();

$repeater->add_control(
    'future_icon',
    [
        'label' => esc_html__('Future Icon', 'textdomain'),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
            'value' => 'fas fa-smile',
            'library' => 'fa-solid',
        ],

    ]
);

        
$repeater->add_control(
    'future_serial',
    [
        'label' => esc_html__('Future Serial', 'textdomain'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 01,
        'label_block' => true,
    ]
);



        $repeater->add_control(
            'future_title',
            [
                'label' => esc_html__('Future Title', 'textdomain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('5m people trust us', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'future_desc',
            [
                'label' => esc_html__('Future Desc', 'textdomain'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => esc_html__('Affordable Big Technology Solution.', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

         $repeater->add_control(
            'top_left_image',
            [
                'label' => esc_html__('Top Left Image', 'textdomain'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'bottom_right_image',
            [
                'label' => esc_html__('Bottom Right Image', 'textdomain'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
            $this->add_control(
			'item_list',
			[
				'label' => esc_html__( 'item list', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'textdomain' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'textdomain' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
				],
				'title_field' => '{{{ future_title }}}',
			]
		);
        $this->end_controls_section();
    } 

    // style register comtrol manager
    protected function style_tab_content()
    {
        $this->start_controls_section(
            'techub_style_section',
            [
                'label' => esc_html__('Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'text_color_2',
            [
                'label' => esc_html__('Title  Text Color ', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-title-2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'text_color_desc',
            [
                'label' => esc_html__('Desc  Text Color ', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-testimonial-left-icon a::before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Adding link attributes for button 1
        if (!empty($settings['button_link1']['url'])) {
            $this->add_link_attributes('button_link1', $settings['button_link1']);
        }

        // Adding link attributes for button 2
        if (!empty($settings['button_link2']['url'])) {
            $this->add_link_attributes('button_link2', $settings['button_link2']);
        }

        ?>
<!-- Start Features Area -->
<section class="features section p-0">
    <div class="container">
        <div class="row">

            <?php foreach( $settings['item_list'] as $item ) : ?>
            <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".2s">
                <!-- Start Single Feature -->
                <div class="single-featuer">
                    <img class="shape" src="<?php echo $item['top_left_image']['url'];?>" alt="#">
                    <img class="shape2" src="<?php echo $item['bottom_right_image']['url'];?>" alt="#">
                    <span class="serial"><?php echo $item['future_serial'];?></span>
                    <div class="service-icon">

                        <?php \Elementor\Icons_Manager::render_icon($item['future_icon'], ['aria-hidden' => 'true']);?>

                    </div>
                    <h3><?php echo $item['future_title'];?></h3>
                    <p><?php echo $item['future_desc'];?></p>
                </div>
                <!-- End Single Feature -->
            </div>
            <?php endforeach;?>

        </div>
    </div>
</section>
<!-- /End Features Area -->


<?php
}
}

$widgets_manager->register(new event_widget());