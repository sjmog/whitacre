<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Whitacre
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-image: linear-gradient( rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5) ), linear-gradient(90deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.8) 50%, rgba(0,0,0,1) 100%), url('<?php the_post_thumbnail_url() ?>');">
	<header class="entry-header">
		<?php if (get_field('active_project')) : ?>
      <h3 class="upcoming-project">Upcoming project</h3>
    <? endif; ?>

    <?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
    ?>

    <?php
    $partner_logos = array_filter([
      get_field('partner_logo_1'),
      get_field('partner_logo_2'),
      get_field('partner_logo_3'),
      get_field('partner_logo_4')
    ]) ?>

    <?php
    if ( !empty($partner_logos) ) : ?>

      <ul class="partner-logos">

        <?php foreach ( $partner_logos as $url): ?>

          <img class="partner-logo" src="<?php echo esc_url($url); ?>" />

        <?php endforeach; ?>

      </ul>

    <?php endif; 
    ?>
	</header>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'whitacre' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'whitacre' ),
				'after'  => '</div>',
			)
		);
		?>

    <?php get_template_part( 'template-parts/capture' ); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->