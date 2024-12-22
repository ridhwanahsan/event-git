<?php
namespace event_widget\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

class heading_widget extends Widget_Base
{

    public function get_name()
    {
        return 'heading-event';
    }

    public function get_title()
    {
        return __('Heading Widget', 'elementor-hello-world');
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
            'heading_bar_title',
            [
                'label' => esc_html__('heading Bar Title', 'textdomain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('5m people trust us', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'heading_top_title',
            [
                'label' => esc_html__('heading Title', 'textdomain'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => esc_html__('Affordable Big Technology Solution.', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'heading_desc',
            [
                'label' => esc_html__('heading Desc', 'textdomain'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => esc_html__('Equipped with human-like intelligence, our chatbots establish fluent and interactive design-quality dialogues', 'textdomain'),
                'placeholder' => esc_html__('Type your content here', 'textdomain'),
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

<div class="section-title p-0 m-0">
    <h3 class="wow zoomIn" data-wow-delay=".2s"><?php echo esc_html($settings['heading_bar_title']); ?></h3>
    <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo esc_html($settings['heading_top_title']); ?></h2>
    <p class="wow fadeInUp" data-wow-delay=".6s">
        <?php echo esc_html($settings['heading_desc']); ?>
    </p>
</div>


<?php
}
}

$widgets_manager->register(new heading_widget());