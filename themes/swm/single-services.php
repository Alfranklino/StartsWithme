<?php
/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>	
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
			<header class="entry-header">
				<h2><?php the_title();?></h2>
				
				<?php $header_image_id = get_cfc_field('header_image_services', 'header-image-services'); ?>
				<?php  ?>
				<?php	 add_image_size( 'header-image',900, 1000, true );  ?>
				<article class="single-service-feat-img"><?php echo wp_get_attachment_image($header_image_id,'header-image');?></article>

			</header>
	
			<div class="entry-content">

				<article class="single-service-description"><?php the_content(); ?></article>
				
				<?php
					$my_meta = get_post_meta( $post->ID, 'additional_text_services', true );
					if( !empty( $my_meta[0]['additional-text-services'] ) ) : ?>
					 <aside class='ideal-for'><?php the_cfc_field('additional_text_services', 'additional-text-services'); ?></aside>;
					<?php endif;
					?>
	
				<?php foreach( get_cfc_meta( 'youtube_url_services' ) as $key => $value ){ ?>
					<?php the_cfc_field( 'youtube_url_services','youtube-video-url-services', false, $key ); ?>
				<?php }  ?>
					
				<?php foreach( get_cfc_meta( 'image_services' ) as $key => $value ){ ?>
					<article class="single-service-misc-image"><img src ='<?php the_cfc_field( 'image_services','add-image', false, $key ); ?>'></article>
				<?php }  ?>

			</div><!-- .entry-content -->

			
			</article><!-- #post-## -->
			<?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

