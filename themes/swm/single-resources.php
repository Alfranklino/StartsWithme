<?php
/**
 * The template for displaying all single speakers posts.
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
				
				</header>

				<div class="entry-content">

					<!-- Speakers Archive Loop Start -->  

					<?php
					$single_archives_speakers_args = array(
						'post_type' => 'speakers',
					);
					?> 

<?php $linkedin_icon = '<i class="fab fa-linkedin"></i>' ?>
            <?php $youtube_icon = '<i class="fab fa-youtube-square"></i>' ?>
            <?php $instagram_icon = '<i class="fab fa-instagram"></i>' ?>
            <?php $twitter_icon = '<i class="fab fa-twitter-square"></i>' ?>

					
					<?php while ( have_posts() ) : the_post(); ?>
					
					
					<?php the_cfc_field('speaker_title1', 'speaker-title');  ?>
					
					<?php the_title();  ?>

					<?php $header_image_id2 = get_cfc_field('speaker_biography_image', 'speaker-biography-image'); ?>
					<?php echo wp_get_attachment_image($header_image_id2);?>
					

					<?php the_cfc_field('speakers_biography', 'speaker-biography');  ?>

					<?php foreach (get_cfc_meta('speaker_social_media') as $key => $value) { ?>
                    <?php $social_media2 = get_cfc_field('speaker_social_media', 'speaker-social-platform', false, $key); ?>
<?php if ($social_media2 == 'linkedin'){ ?>
    <a href="<?php get_cfc_field('speaker_social_media', 'speaker-social-link', false, $key); ?>"><?php echo $linkedin_icon; ?></a>
<?php } elseif ($social_media2 == 'youtube'){ ?>
    <a href="<?php the_cfc_field('speaker_social_media', 'speaker-social-link', false, $key); ?>"><?php echo $youtube_icon; ?></a>
<?php }elseif ($social_media2 == "instagram"){ ?>
    <a href="<?php the_cfc_field('speaker_social_media', 'speaker-social-link', false, $key); ?>"><?php echo $instagram_icon; ?></a>
<?php } elseif ($social_media2 == "twitter"){ ?>
    <a href="<?php the_cfc_field('speaker_social_media', 'speaker-social-link', false, $key); ?>"><?php echo $twitter_icon; ?></a>
<?php }; ?>

				<?php }  ?>
				<?php foreach (get_cfc_meta('speaker_as_seen_in') as $key => $value) { ?>
				<?php $header_image_id3 = get_cfc_field('speaker_as_seen_in', 'speaker-company-logo'); ?>
				<a href="<?php the_cfc_field('speaker_as_seen_in', 'speaker-link-as-seen-in');  ?>">		<?php $header_image_id3 = get_cfc_field('speaker_as_seen_in', 'speaker-company-logo'); ?>
					<?php echo wp_get_attachment_image($header_image_id3);?></a>
				<?php }  ?>
					<?php

					endwhile;?>

					<!-- End Loop -->

			

				</div><!-- .entry-content -->

			
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
