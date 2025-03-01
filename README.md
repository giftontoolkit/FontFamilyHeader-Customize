# Font Family Header-Section Customization

### Base repo: g10

# Version 1 (v1)

- In this version, we introduce below two functions in `functions.php` file. You can see outputs, after applying these two functions.
- First function has two parts. One is for `background` and other is for `text`.
- In second function, I accessed `CSS-Class` of the `landing-header.php` and then styled according to `Color-Customization` tab.
- we used `wp_header()`. This hook is used by WordPress, plugins, and your theme to:
  - Load CSS stylesheets.
  - Add inline CSS (like myTM_custom_styles() function).
  - Include JavaScript scripts.
  - Add meta tags (e.g., for SEO).
  - Load other essential header elements.

# Code neccessary in `index.php`

use of `wp_header()` in `<head> tag`. So that we can trigger inline-CSS.

```ruby
<?php wp_head(); ?>
```

# Code `functions.php` File

```ruby
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
```

# Output Before Functions

![Output image before applying functions.php](/images/before_function.jpg)

# Output After Functions

![Output image after applying functions.php 1](/images/after_function_1.jpg)
![Output image after applying functions.php 2](/images/after_function_2.jpg)
