<?php
// Registrar el menú
function anato_register_menus() {
    register_nav_menus(array(
        'header-menu' => __('Header Menu'), // Menú principal del encabezado
    ));
}
add_action('init', 'anato_register_menus');

// Añadir soporte básico al tema
function anato_theme_setup() {
    // Soporte para títulos dinámicos
    add_theme_support('title-tag');
    // Soporte para post thumbnails
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'anato_theme_setup');

// Estilo y scripts del tema
function anato_enqueue_styles() {
    // Encolar la hoja de estilos principal del tema
    wp_enqueue_style('anato-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'anato_enqueue_styles');

// Registrar Custom Post Type "Agencias"
function anato_register_agencias_cpt() {
    $labels = array(
        'name' => 'Agencias',
        'singular_name' => 'Agencia',
        'add_new' => 'Agregar Nueva Agencia',
        'add_new_item' => 'Agregar Nueva Agencia',
        'edit_item' => 'Editar Agencia',
        'new_item' => 'Nueva Agencia',
        'view_item' => 'Ver Agencia',
        'all_items' => 'Todas las Agencias',
        'search_items' => 'Buscar Agencias',
        'not_found' => 'No se encontraron Agencias',
        'not_found_in_trash' => 'No se encontraron Agencias en la papelera',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-building', // Icono en el panel
        'supports' => array('title'), // Solo requiere título
        'show_in_rest' => true, // Habilita soporte para Gutenberg
    );

    register_post_type('agencias', $args);
}
add_action('init', 'anato_register_agencias_cpt');

// Añadir Meta Boxes para Agencias
function anato_add_agencias_meta_boxes() {
    add_meta_box(
        'agencia_info', // ID único
        'Información de la Agencia', // Título
        'anato_render_agencia_meta_box', // Callback para mostrar los campos
        'agencias', // Custom Post Type donde se mostrará
        'normal', // Contexto
        'default' // Prioridad
    );
}
add_action('add_meta_boxes', 'anato_add_agencias_meta_boxes');

// Renderizar los campos en el Meta Box
function anato_render_agencia_meta_box($post) {
    // Obtener los valores actuales de los campos
    $nombre_agencia = get_post_meta($post->ID, '_nombre_agencia', true);
    $nit_agencia = get_post_meta($post->ID, '_nit_agencia', true);

    // Campos del Meta Box
    ?>
    <p>
        <label for="nombre_agencia">Nombre Agencia:</label><br>
        <input type="text" id="nombre_agencia" name="nombre_agencia" value="<?php echo esc_attr($nombre_agencia); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="nit_agencia">NIT:</label><br>
        <input type="text" id="nit_agencia" name="nit_agencia" value="<?php echo esc_attr($nit_agencia); ?>" style="width: 100%;">
    </p>
    <?php
}

// Guardar los datos de los campos personalizados
function anato_save_agencias_meta_boxes($post_id) {
    // Verificar permisos y seguridad
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Guardar el campo "Nombre Agencia"
    if (isset($_POST['nombre_agencia'])) {
        update_post_meta($post_id, '_nombre_agencia', sanitize_text_field($_POST['nombre_agencia']));
    }

    // Guardar el campo "NIT"
    if (isset($_POST['nit_agencia'])) {
        update_post_meta($post_id, '_nit_agencia', sanitize_text_field($_POST['nit_agencia']));
    }
}
add_action('save_post', 'anato_save_agencias_meta_boxes');
?>
