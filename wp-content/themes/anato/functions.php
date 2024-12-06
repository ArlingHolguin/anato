<?php
// Registrar el menú
function anato_register_menus() {
    register_nav_menus(array(
        'header-menu' => __('Header Menu'),
    ));
}
add_action('init', 'anato_register_menus');
?>
