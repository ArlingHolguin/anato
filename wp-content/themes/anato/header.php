<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<header style="background-color: blue; padding: 20px; display: flex; justify-content: space-between; align-items: center;">
    <!-- Columna 1: Logo -->
    <div style="width: 25%; text-align: center;">
        <img src="https://anato.org/wp-content/uploads/2019/11/logo-web-anato-1-1.png" alt="Logo Anato" style="max-width: 100%;">
    </div>

    <!-- Columna 2: Menú -->
    <div style="width: 50%; text-align: center;">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'header-menu',
            'menu_class' => 'header-menu',
            'container' => false,
        ));
        ?>
    </div>

    <!-- Columna 3: Link Buscar -->
    <div style="width: 25%; text-align: center;">
        <a href="#" style="color: white; text-decoration: none;">Buscar</a>
    </div>
</header>
