<?php
/**
 * Plugin Name: Anato Greeting
 * Description: Plugin que genera un saludo con un shortcode.
 */

function anato_greeting_shortcode() {
    return '<h1 style="text-align: center; color: blue;">Hola ANATO</h1>';
}
add_shortcode('anato_greeting', 'anato_greeting_shortcode');
?>
