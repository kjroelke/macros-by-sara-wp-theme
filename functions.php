<?php 
function enqueue_macros_scripts() {

  // Get modification time. Enqueue files with modification date to prevent browser from loading cached scripts and styles when file content changes.

  $modified_styles = date('YmdHi', filemtime(get_stylesheet_directory() . '/dist/global.css'));
  $modified_scripts = date('YmdHi', filemtime(get_stylesheet_directory() . '/dist/global.js'));

  
  wp_enqueue_style('main', get_template_directory_uri() . '/dist/global.css', array(), $modified_styles);
  wp_enqueue_script('macros-script', get_template_directory_uri() . '/dist/global.js', array(),$modified_scripts, true);
  wp_localize_script('macros-script','macrosSiteData',array('rootUrl' => home_url()));

  // IE Warning
  wp_localize_script('macros-script', 'macros', array(
    'ie_title'                 => __('Internet Explorer detected', 'macros'),
    'ie_limited_functionality' => __('This website will offer limited functionality in this browser.', 'macros'),
    'ie_modern_browsers_1'     => __('Please use a modern and secure web browser like', 'macros'),
    'ie_modern_browsers_2'     => __(' <a href="https://www.mozilla.org/firefox/" target="_blank">Mozilla Firefox</a>, <a href="https://www.google.com/chrome/" target="_blank">Google Chrome</a>, <a href="https://www.opera.com/" target="_blank">Opera</a> ', 'macros'),
    'ie_modern_browsers_3'     => __('or', 'macros'),
    'ie_modern_browsers_4'     => __(' <a href="https://www.microsoft.com/edge" target="_blank">Microsoft Edge</a> ', 'macros'),
    'ie_modern_browsers_5'     => __('to display this site correctly.', 'macros'),
  ));
  // IE Warning End
}

add_action('wp_enqueue_scripts', 'enqueue_macros_scripts');



function register_macros_menus(){
  register_nav_menus( array(
    'primary_menu' => __( 'Primary Menu', 'macros' ),
    'mobile_menu' => __( 'Mobile Menu', 'macros' ),
    'footer_menu'  => __( 'Footer Menu', 'macros' ),
  ));
}

add_action( 'after_setup_theme', 'register_macros_menus');