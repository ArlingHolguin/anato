<?php
get_header();
?>
<main style="padding: 20px;">
    <?php
    while (have_posts()) : the_post();
        $nombre_agencia = get_post_meta(get_the_ID(), '_nombre_agencia', true);
        $nit_agencia = get_post_meta(get_the_ID(), '_nit_agencia', true);
    ?>
        <h1><?php the_title(); ?></h1>
        <p><strong>Nombre Agencia:</strong> <?php echo esc_html($nombre_agencia); ?></p>
        <p><strong>NIT:</strong> <?php echo esc_html($nit_agencia); ?></p>
        <div>
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
</main>
<?php
get_footer();
?>
