<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Whitacre
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'whitacre' ); ?></a>

  <? if ( is_front_page() && is_home() ) : ?>
    <section class="hero" >
      <div class="fullscreen-bg">
          <video loop muted autoplay poster="images/black.png" class="fullscreen-bg__video">
              <source src="<?php echo get_template_directory_uri() ?>/videos/gloria-trimmed.mp4" type="video/mp4">
          </video>
      </div>

      <div class="logo">
        <?php the_custom_logo(); ?>
      </div>

      <h1 class="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          Sing <em>Together</em>
        </a>
      </h1>

      <?php
        $whitacre_description = get_bloginfo( 'description', 'display' );
        if ( $whitacre_description || is_customize_preview() ) : ?>

          <p class="lead">
            <?php echo $whitacre_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
          </p>

      <?php endif; ?>

      <a href="#join-us" class="button">Join us</a>
    </section> 

    <?php get_template_part( 'template-parts/banner' ) ?>

  <?php endif; ?>

	<nav id="site-navigation" class="main-navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'whitacre' ); ?></button>

    <?php the_custom_logo(); ?>

		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			)
		);
		?>
	</nav>

	<div id="content" class="site-content">
