<?php 
new \Kirki\Panel(
    'event_option_panel',
    [
        'priority' => 10,
        'title' => esc_html__('Theme Panel', 'kirki'),
        'description' => esc_html__('My Panel Description.', 'kirki'),
    ]
);
new \Kirki\Section(
    'event_header_section',
    [
        'title' => esc_html__('header Section', 'kirki'),
        'description' => esc_html__('My Section Description.', 'kirki'),
        'panel' => 'event_option_panel',
        'priority' => 160,
    ]
);
new \Kirki\Field\Image(
    [
        'settings' => 'header_logo_image',
        'label' => esc_html__('Add Logo Image', 'kirki'),
        'description' => esc_html__('The saved value will be an array.', 'kirki'),
        'section' => 'event_header_section',
        'default' => get_template_directory_uri() . '/assets/images/logo/logo.svg',
    ]
);
new \Kirki\Field\Text(
    [
        'settings' => 'header_btn_text',
        'label' => esc_html__('Button Text', 'kirki'),
        'section' => 'event_header_section',
        'default' => esc_html__('Get Started', 'kirki'),
        'priority' => 10,
    ]
);new \Kirki\Field\URL(
    [
        'settings' => 'header_btn_url',
        'label' => esc_html__('Enter Button URL', 'kirki'),
        'section' => 'event_header_section',
        'default' => 'https://yoururl.com/',
        'priority' => 10,
    ]
);


