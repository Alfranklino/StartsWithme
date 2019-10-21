<?php
/**
 * The template for displaying all speakers pages.
 * Template Name: Speakers Template
 * @package RED_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

  

            <header class="entry-header">
                <!-- Code to display the "Our Team" page content -->
                <?php
                $page = get_page_by_path('speakers');
                $id = $page->ID;
                $p = get_page($id);
                echo apply_filters('the_content', $p->post_content);
                ?>
                <?php the_post_thumbnail('large'); ?>
            </header><!-- .entry-header -->

      
        <div class="entry-content">

            <!-- Speakers Archive Loop Start -->
            <h3>Speakers</h3>
            <?php
            $archive_speakers_args = array(
                'post_type' => 'speakers',
            );
            ?>

            <!-- Fontawesome Social Icons Variables -->

            <?php $linkedin_icon = '<i class="fab fa-linkedin"></i>' ?>
            <?php $youtube_icon = '<i class="fab fa-youtube-square"></i>' ?>
            <?php $instagram_icon = '<i class="fab fa-instagram"></i>' ?>
            <?php $twitter_icon = '<i class="fab fa-twitter-square"></i>' ?>

            <?php
            $archive_speakers_query = new WP_Query($archive_speakers_args);
            while ($archive_speakers_query->have_posts()) : $archive_speakers_query->the_post();
                ?>
            <section class="speaker">
               <article class="speaker-image"> <img src="<?php the_cfc_field('speaker_image', 'speaker-image-file');  ?>"></article>
               <article class="speaker-info">
               <h4 class="speaker-name"> <?php the_title();  ?></h3>
               <p class="speaker-job"> <?php the_cfc_field('speaker_title1', 'speaker-title');  ?></p>
               <p class="speaker-bio"> <?php the_cfc_field('speaker_summary1', 'speaker-summary');  ?></p>

                <a href="<?php esc_url(the_permalink()) ?>">read more &rarr;</a>
           

            <?php foreach (get_cfc_meta('speaker_social_media') as $key => $value) { ?>
                <?php $speakers_social_media = get_cfc_field('speaker_social_media', 'speaker-social-platform', false, $key); ?>
                <?php if ($speakers_social_media == 'linkedin') { ?>
                    <a href="<?php get_cfc_field('speaker_social_media', 'speaker-social-link', false, $key); ?>" class="speaker-social-linkedin"><?php echo $linkedin_icon; ?></a>
                <?php } elseif ($speakers_social_media == 'youtube') { ?>
                    <a href="<?php the_cfc_field('speaker_social_media', 'speaker-social-link', false, $key); ?>" class="speaker-social-youtube"><?php echo $youtube_icon; ?></a>
                <?php } elseif ($speakers_social_media == "instagram") { ?>
                    <a href="<?php the_cfc_field('speaker_social_media', 'speaker-social-link', false, $key); ?>" class="speaker-social-instagram"><?php echo $instagram_icon; ?></a>
                <?php } elseif ($speakers_social_media == "twitter") { ?>
                    <a href="<?php the_cfc_field('speaker_social_media', 'speaker-social-link', false, $key); ?>" class="speaker-social-twitter"><?php echo $twitter_icon; ?></a>
                <?php }; ?>

            <?php }  ?>
            </article>
                </section>

            <?php endwhile; ?>

          
                      
            <!-- End Loop -->

        </div><!-- .entry-content -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>