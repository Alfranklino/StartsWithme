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

				 <!-- Fontawesome Social Icons Variables -->

				<?php $linkedin_icon = '<i class="fab fa-linkedin"></i>' ?>
				<?php $youtube_icon = '<i class="fab fa-youtube-square"></i>' ?>
				<?php $instagram_icon = '<i class="fab fa-instagram"></i>' ?>
				<?php $twitter_icon = '<i class="fab fa-twitter-square"></i>' ?>


				<?php while (have_posts()) : the_post(); ?>

					<section class="single-speaker-info">
						<h1 class="single-speaker-job"><?php the_cfc_field('speaker_title1', 'speaker-title');  ?></h1>

						<h2 class="single-speaker-name"><?php the_title();  ?></h2>
						
						<?php $speaker_biography_image = get_cfc_field('speaker_biography_image', 'speaker-biography-image'); ?>
						<?php  ?>
							<?php	 add_image_size( 'single-speaker-image',900, 1000, true );  ?>	
						<article class="single-speaker-additional-image"><?php echo wp_get_attachment_image($speaker_biography_image, 'single-speaker-image'); ?></article>

					<p class="single-speaker-bio"><?php the_cfc_field('speakers_biography', 'speaker-biography');  ?></p>
		
				</section>

					<section class="single-speaker-social">
					<?php foreach (get_cfc_meta('speaker_social_media') as $key => $value) { ?>
						<?php $single_speakers_social_media = get_cfc_field('speaker_social_media', 'speaker-social-platform', false, $key); ?>
						<?php if ($single_speakers_social_media == 'linkedin') { ?>
							<a href="<?php get_cfc_field('speaker_social_media', 'speaker-social-link', false, $key); ?>" class="single-speaker-social-linkedin"><?php echo $linkedin_icon; ?></a>
						<?php } elseif ($single_speakers_social_media == 'youtube') { ?>
							<a href="<?php the_cfc_field('speaker_social_media', 'speaker-social-link', false, $key); ?>"><?php echo $youtube_icon; ?></a>
						<?php } elseif ($single_speakers_social_media == "instagram") { ?>
							<a href="<?php the_cfc_field('speaker_social_media', 'speaker-social-link', false, $key); ?>"><?php echo $instagram_icon; ?></a>
						<?php } elseif ($single_speakers_social_media == "twitter") { ?>
							<a href="<?php the_cfc_field('speaker_social_media', 'speaker-social-link', false, $key); ?>"><?php echo $twitter_icon; ?></a>
						<?php }; ?>

					<?php }  ?>
						</section>
					<?php foreach (get_cfc_meta('speaker_as_seen_in') as $key => $value) { ?>
						<?php $speaker_as_seen_in_image = get_cfc_field('speaker_as_seen_in', 'speaker-company-logo'); ?>
						<section class="single-speaker-as-seen"><a href="<?php the_cfc_field('speaker_as_seen_in', 'speaker-link-as-seen-in');  ?>"> <?php $speaker_as_seen_in_image = get_cfc_field('speaker_as_seen_in', 'speaker-company-logo'); ?>
							<?php echo wp_get_attachment_image($speaker_as_seen_in_image); ?></a></section>
					<?php }  ?>
				<?php

				endwhile; ?>

				<!-- End Loop -->

			</div><!-- .entry-content -->
		</article><!-- #post-## -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>