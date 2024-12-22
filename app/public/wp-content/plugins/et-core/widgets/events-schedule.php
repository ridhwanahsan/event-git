<?php
namespace event_widget\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

class events_schedule extends Widget_Base
{

    public function get_name()
    {
        return 'events-schedule';
    }

    public function get_title()
    {
        return __('Events Schedule', 'elementor-hello-world');
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
        $this->start_controls_section(
            'tab_section',
            [
                'label' => esc_html__('Tab Content', 'textdomain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $tab_repeater = new \Elementor\Repeater();

        $tab_repeater->add_control(
            'tab_title',
            [
                'label' => esc_html__('Tab Title', 'textdomain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Day 1', 'textdomain'),
                'label_block' => true,
            ]
        );

        $tab_repeater->add_control(
            'tab_date',
            [
                'label' => esc_html__('Tab Date', 'textdomain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Mar 05, 2023', 'textdomain'),
                'label_block' => true,
            ]
        );

        $event_repeater = new \Elementor\Repeater();

        $event_repeater->add_control(
            'event_day',
            [
                'label' => esc_html__('Event Day', 'textdomain'),
                'type' => Controls_Manager::TEXT,
                'default' => '30',
                'label_block' => true,
            ]
        );

        $event_repeater->add_control(
            'event_month',
            [
                'label' => esc_html__('Event Month', 'textdomain'),
                'type' => Controls_Manager::TEXT,
                'default' => 'March',
                'label_block' => true,
            ]
        );

        $event_repeater->add_control(
            'event_time',
            [
                'label' => esc_html__('Event Time', 'textdomain'),
                'type' => Controls_Manager::TEXT,
                'default' => '8:00 AM - 08:45 AM',
                'label_block' => true,
            ]
        );

        $event_repeater->add_control(
            'event_image',
            [
                'label' => esc_html__('Event Image', 'textdomain'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $event_repeater->add_control(
            'event_title',
            [
                'label' => esc_html__('Event Title', 'textdomain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Media est eligendi oatio cumrue', 'textdomain'),
                'label_block' => true,
            ]
        );

        $event_repeater->add_control(
            'event_speaker',
            [
                'label' => esc_html__('Event Speaker', 'textdomain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Andio Lexa', 'textdomain'),
                'label_block' => true,
            ]
        );

        $event_repeater->add_control(
            'event_location',
            [
                'label' => esc_html__('Event Location', 'textdomain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Prism Club, USA', 'textdomain'),
                'label_block' => true,
            ]
        );

        $tab_repeater->add_control(
            'events',
            [
                'label' => esc_html__('Events', 'textdomain'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $event_repeater->get_controls(),
                'default' => [
                    [
                        'event_title' => esc_html__('Event #1', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ event_title }}}',
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => esc_html__('Tabs', 'textdomain'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $tab_repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => esc_html__('Day 1', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->style_tab_content();
    }

    protected function style_tab_content()
    {
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'textdomain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tab_color',
            [
                'label' => esc_html__('Tab Color', 'textdomain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-link' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'tab_active_color',
            [
                'label' => esc_html__('Tab Active Color', 'textdomain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-link.active' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'event_title_color',
            [
                'label' => esc_html__('Event Title Color', 'textdomain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .event-info h4 a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

<!-- Start Events Schedule Area -->
<section class="events-schedule section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12">
                <!-- Start Events Schedule Tab -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php foreach ($settings['tabs'] as $index => $tab): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo $index === 0 ? 'active' : ''; ?>"
                            id="tab-<?php echo $index; ?>" data-bs-toggle="tab"
                            data-bs-target="#content-<?php echo $index; ?>" type="button" role="tab">
                            <?php echo $tab['tab_title']; ?>
                            <span><?php echo $tab['tab_date']; ?></span>
                        </button>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <?php foreach ($settings['tabs'] as $index => $tab): ?>
                    <div class="tab-pane fade <?php echo $index === 0 ? 'show active' : ''; ?>"
                        id="content-<?php echo $index; ?>" role="tabpanel">
                        <div class="events-head">
                            <?php foreach ($tab['events'] as $event): ?>
                            <div class="single-event">
                                <div class="row align-items-center">
                                    <div class="col-lg-3 col-md-3 col-12">
                                        <div class="date">
                                            <h2><?php echo $event['event_day']; ?></h2>
                                            <p><?php echo $event['event_month']; ?>
                                                <span><?php echo $event['event_time']; ?></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-12">
                                        <div class="event-info">
                                            <div class="image">
                                                <img src="<?php echo $event['event_image']['url']; ?>" alt="#">
                                            </div>
                                            <div class="info">
                                                <h4><a href="#"><?php echo $event['event_title']; ?></a></h4>
                                                <ul>
                                                    <li>
                                                        <i class="lni lni-user"></i>
                                                        <a href="#"> By: <?php echo $event['event_speaker']; ?></a>
                                                    </li>
                                                    <li>
                                                        <i class="lni lni-map-marker"></i>
                                                        <a href="#"> At: <?php echo $event['event_location']; ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-12">
                                        <div class="button">
                                            <a class="btn" href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Events Schedule Area -->

<?php
    }
}

$widgets_manager->register(new events_schedule());