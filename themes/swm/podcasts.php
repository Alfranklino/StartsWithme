<?php

/**
 * The template for displaying all pages.
 * Template Name: Podcasts
 * @package RED_Starter_Theme
 */

get_header(); ?>

<!-- <div id="primary resourcesPage" class="content-area">
    <main id="main" class="site-main" role="main">
        <header class="entry-header resourcesMenu">
            <h3>Resources</h3>

            <ul class="resourcesMenuCategories">
                <a class="menuFeatured" href="">
                    <li>Featured</li>
                </a>
                <a class="menuEbook" href="">
                    <li>E-Book</li>
                </a>
                <a class="menuVideos" href="">
                    <li>Videos</li>
                </a>
                <a class="menuPodcasts" href="">
                    <li>Podcasts</li>
                </a>
                <a class="menuBlog" href="">
                    <li>Blog</li>
                </a>
            </ul>

            <?php while (have_posts()) : the_post(); ?>


        </header>
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


        <article class="resourcesPodcastsContainer">

            <?php
            $resources_podcast_args = array(
                'post_type' => 'resources',
                "posts_per_page" => '12',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'resource_category',
                        'field' => 'slug',
                        'terms' => 'podcasts',
                    )
                )
            );
            ?>

            <?php
            $resources_podcast_query = new WP_Query($resources_podcast_args);
            while ($resources_podcast_query->have_posts()) : $resources_podcast_query->the_post(); ?>
                <section class="singleResourcesPodcastsContainer" <?php the_ID(); ?>>
                    <?php the_cfc_field('podcastattributes', 'podcast-sources-link'); ?>
                </section>
            <?php endwhile; ?>
        </article>



    </div><!-- .entry-content -->
</article><!-- #post-## -->





<?php get_footer(); ?>