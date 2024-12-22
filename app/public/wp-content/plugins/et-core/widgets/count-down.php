<?php
namespace event_widget\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

class event_count_down extends Widget_Base
{

    public function get_name()
    {
        return 'count-down';
    }

    public function get_title()
    {
        return __('Count Down Widget', 'elementor-hello-world');
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
            'content_section',
            [
                'label' => esc_html__('Content', 'textdomain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
    'count_down_day_text',
    [
        'label' => esc_html__('Enter Day Text', 'textdomain'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Days', 'textdomain'),
        'placeholder' => esc_html__('Type your text here', 'textdomain'),
        'label_block' => true,
    ]
);

$this->add_control(
			'count_down_day',
			[
				'label' => esc_html__( 'Day counter', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 10,
            
			]
		);
        $this->add_control(
    'count_down_hour_text',
    [
        'label' => esc_html__('Enter hour Text', 'textdomain'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Hours', 'textdomain'),
        'placeholder' => esc_html__('Type your text here', 'textdomain'),
        'label_block' => true,
    ]
);

        $this->add_control(
			'count_down_hour',
			[
				'label' => esc_html__( 'Hour counter', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 10,
			]
		);
        $this->add_control(
    'count_down_minute_text',
    [
        'label' => esc_html__('Enter minute Text', 'textdomain'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Minutes', 'textdomain'),
        'placeholder' => esc_html__('Type your text here', 'textdomain'),
        'label_block' => true,
    ]
);

        $this->add_control(
			'count_down_minute',
			[
				'label' => esc_html__( 'Minutes counter', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 10,
			]
		);
        $this->add_control(
    'count_down_secondes_text',
    [
        'label' => esc_html__('Enter secondes Text', 'textdomain'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('secondes', 'textdomain'),
        'placeholder' => esc_html__('Type your text here', 'textdomain'),
        'label_block' => true,
    ]
);

        $this->add_control(
			'count_down_secondes',
			[
				'label' => esc_html__( 'secondes counter', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 10,
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

<!-- Start Count Down Area -->
<div class="count-down">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head">
                    <div class="box-content">
                        <div class="box">
                            <h1 id="days"><?php echo esc_html($settings['count_down_day']); ?></h1>
                            <h2 id="daystxt"><?php echo esc_html($settings['count_down_day_text']); ?></h2>
                        </div>
                        <div class="box">
                            <h1 id="hours"><?php echo esc_html($settings['count_down_hour']); ?></h1>
                            <h2 id="hourstxt"><?php echo esc_html($settings['count_down_hour_text']); ?></h2>
                        </div>
                        <div class="box">
                            <h1 id="minutes"><?php echo esc_html($settings['count_down_minute']); ?></h1>
                            <h2 id="minutestxt"><?php echo esc_html($settings['count_down_minute_text']); ?></h2>
                        </div>
                        <div class="box">
                            <h1 id="seconds"><?php echo esc_html($settings['count_down_secondes']); ?></h1>
                            <h2 id="secondstxt"><?php echo esc_html($settings['count_down_secondes_text']); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Count Down Area -->
















<!-- Start Hero Area -->
<section class="hero-area d-none">
    <div class="main__circle"></div>
    <div class="main__circle2"></div>
    <div class="main__circle3"></div>
    <div class="main__circle4"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                <div class="hero-content">

                    <h5 class="wow zoomIn" data-wow-delay=".2s"><i
                            class="lni lni-map-marker"></i><?php echo esc_html($settings['hero_section_bar_title']); ?>
                    </h5>

                    <h2 class="wow fadeInUp" data-wow-delay=".4s">
                        <?php echo esc_html($settings['hero_section_top_title']); ?></h2>


                    <p class="wow fadeInUp" data-wow-delay=".6s">
                        <?php echo esc_html($settings['hero_section_bio_text']); ?></p>


                    <div class="button wow fadeInUp" data-wow-delay=".8s">
                        <a href="<?php echo $this->get_render_attribute_string('button_link1'); ?>"
                            class="btn "><?php echo esc_html($settings['button_text1']); ?></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero Area -->

<?php
}
}

$widgets_manager->register(new event_count_down());