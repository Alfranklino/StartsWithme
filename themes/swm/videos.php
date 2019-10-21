<?php

/**
 * The template for displaying all pages.
 * Template Name: Videos
 * @package RED_Starter_Theme
 */

get_header(); ?>


<?php while (have_posts()) : the_post(); ?>


<?php endwhile; ?> -->
<?php wp_nav_menu(array('menu' => 'submenu', 'menu_id' => 'primary-menu2')); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content resourcesContainer">

        <?php
        $resources_video_featured_args = array(
            'post_type' => 'resources',
            'posts_per_page' => '1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'resource_category',
                    'field' => 'slug',
                    'terms' => 'videos',
                )
            )
        );

        $resources_video_featured_alternate_args = array(
            'post_type' => 'resources',
            'posts_per_page' => '1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'resource_category',
                    'field' => 'slug',
                    'terms' => 'videos',
                )
            )
        ); ?>
        <?php
        $resources_videos_featured_args = array(
            'post_type' => 'resources',
            'posts_per_page' => '3',
            'tax_query' => array(
                array(
                    'taxonomy' => 'resource_category',
                    'field' => 'slug',
                    'terms' => 'videos',
                )
            )
        ); ?>
        <?php
        $resources_blogs_featured_args = array(
            'post_type' => 'post',
            'posts_per_page' => '3',
        ); ?>
        <?php
        $resources_podcasts_featured_args = array(
            'post_type' => 'resources',
            'posts_per_page' => '3',
            'tax_query' => array(
                array(
                    'taxonomy' => 'resource_category',
                    'field' => 'slug',
                    'terms' => 'podcasts',
                )
            )
        ); ?>
        <?php
        $resources_ebook_featured_args = array(
            'post_type' => 'resources',
            'posts_per_page' => '1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'resource_category',
                    'field' => 'slug',
                    'terms' => 'ebooks',
                )
            )
        );
        ?>



        <article class="resourcesVideoContainer">
            <?php
            $resources_video_args = array(
                'post_type' => 'resources',
                'posts_per_page' => '7',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'resource_category',
                        'field' => 'slug',
                        'terms' => 'videos',
                    )
                )
            );
            ?>

            <?php
            $resources_video_query = new WP_Query($resources_video_args);
            while ($resources_video_query->have_posts()) : $resources_video_query->the_post(); ?>
                <section class="vid<?php the_ID(); ?> singleResourcesVideosContainer">
                    <?php the_cfc_field('videoattributes', 'video-sharing-link'); ?>
                    <div class="videoMeta">
                        <h3><?php the_title(); ?></h3>
                        <div class="test3"> <?php echo get_the_excerpt() ?> </div>



                    </div>
                </section>
            <?php endwhile; ?>

        </article>




</article>

</div><!-- .entry-content -->
</article><!-- #post-## -->



</main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>