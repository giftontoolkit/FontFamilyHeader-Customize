<?php
// Add Theme Customization Options
function myTM_customize_register_font_family_header_setting($wp_customize) {

    // Creating FontStyle-Header 
    $wp_customize->add_section('Header Font Family', array(
        'title' => __('Header Font Family', 'myTM-theme'),
        'priority' => 40,
    ));
    $wp_customize->add_setting('header_font_family', array(
        'default' => 'Arial, sans-serif',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('header_font_family_control', array(
        'label' => __('Header Font Family', 'myTM-theme'),
        'section' => 'Header Font Family',
        'settings' => 'header_font_family',
        'type' => 'text',
    ));
}
add_action('customize_register', 'myTM_customize_register_font_family_header_setting');


// Apply Customizations via Inline CSS
function myTM_custom_styles() {
    ?>
    <style type="text/css">
        .landing-header {
            font-family: <?php echo esc_attr(get_theme_mod('header_font_family', 'Arial, sans-serif')); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'myTM_custom_styles');
?>