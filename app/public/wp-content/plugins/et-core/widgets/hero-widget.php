<?php
namespace event_widget\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

class techub_hero extends Widget_Base
{

    public function get_name()
    {
        return 'hero-widget';
    }

    public function get_title()
    {
        return __('Hero Widget', 'elementor-hello-world');
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
            'hero_section_bar_title',
            [
                'label' => esc_html__('Bar Title', 'textdomain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('5m people trust us', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'hero_section_top_title',
            [
                'label' => esc_html__('Top Title', 'textdomain'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => esc_html__('Affordable Big Technology Solution.', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'hero_section_bio_text',
            [
                'label' => esc_html__('Bio Text', 'textdomain'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => esc_html__('Equipped with human-like intelligence, our chatbots establish fluent and interactive design-quality dialogues', 'textdomain'),
                'placeholder' => esc_html__('Type your content here', 'textdomain'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'image_section',
            [
                'label' => esc_html__('Image', 'textdomain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'right_section_image',
            [
                'label' => esc_html__('Right Image', 'textdomain'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'section_shape_image',
            [
                'label' => esc_html__('Background Shape Image', 'textdomain'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'section_background_image',
            [
                'label' => esc_html__('Background Image', 'textdomain'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__('Button Section', 'textdomain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text1',
            [
                'label' => esc_html__('Button 1 Text', 'textdomain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'textdomain'),
                'placeholder' => esc_html__('Type your content here', 'textdomain'),
            ]
        );

        $this->add_control(
            'button_link1',
            [
                'label' => esc_html__('Button 1 Link', 'textdomain'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_text2',
            [
                'label' => esc_html__('Button 2 Text', 'textdomain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Contact Us', 'textdomain'),
                'placeholder' => esc_html__('Type your content here', 'textdomain'),
            ]
        );

        $this->add_control(
            'button_link2',
            [
                'label' => esc_html__('Button 2 Link', 'textdomain'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
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

<!-- Start Hero Area -->
<section class="hero-area">
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

$widgets_manager->register(new techub_hero());