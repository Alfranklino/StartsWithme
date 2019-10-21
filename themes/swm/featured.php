<?php

/**
 * The template for displaying all pages.
 * Template Name: Featured
 * @package RED_Starter_Theme
 */

get_header(); ?>

<div id="primary resourcesPage" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- <header class="entry-header resourcesMenu">
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


        </header> -->
    <?php endwhile; ?>
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
            <article class="resourcesFeaturedContainer">
                <section class="featuredVideoContainer">
                    <?php
                    $resources_video_featured_query = new WP_Query($resources_video_featured_args);
                    while ($resources_video_featured_query->have_posts()) : $resources_video_featured_query->the_post(); ?>
                        <?php $video_sharing_link = get_cfc_field('videoattributes', 'featured-video-option'); ?>
                        <?php if ($video_sharing_link == 'yes') { ?>
                            <div class="singleFeaturedVideoContainer">
                                <?php the_cfc_field('videoattributes', 'video-sharing-link'); ?>
                            </div>
                    <?php }
                    endwhile ?>
                    <?php
                    $resources_video_featured_alternate_query = new WP_Query($resources_video_featured_alternate_args);
                    while ($resources_video_featured_alternate_query->have_posts()) : $resources_video_featured_alternate_query->the_post(); ?>
                        <?php $video_sharing_link = get_cfc_field('videoattributes', 'featured-video-option'); ?>
                        <?php if ($video_sharing_link == 'no') { ?>
                            <div class="singleFeaturedVideoContainer">
                                <?php the_cfc_field('videoattributes', 'video-sharing-link'); ?>
                            </div>
                    <?php }
                    endwhile ?>
                </section>
                <section class="featuredVideosContainer">
                    <h5>Featured Videos</h5>


                    <div class='test'>
                        <?php

                        $resources_videos_featured_query = new WP_Query($resources_videos_featured_args);
                        while ($resources_videos_featured_query->have_posts()) : $resources_videos_featured_query->the_post();
                            ?>
                            <div class="singleFeaturedVideosContainer">
                                <?php the_cfc_field('videoattributes', 'video-sharing-link'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>

                <section class="featuredBlogContainer">
                    <h5>Featured Blogs</h5>
                    <div class="test2">
                        <?php
                        $resources_blogs_featured_query = new WP_Query($resources_blogs_featured_args);
                        while ($resources_blogs_featured_query->have_posts()) : $resources_blogs_featured_query->the_post();
                            ?>
                            <div class="singleFeaturedBlogContainer">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
                <section class="featuredPodcastsContainer">
                    <h5>Featured Podcasts</h5>
                    <?php
                    $resources_podcasts_featured_query = new WP_Query($resources_podcasts_featured_args);
                    while ($resources_podcasts_featured_query->have_posts()) : $resources_podcasts_featured_query->the_post();
                        ?>
                        <div class="singleFeaturedPodcastsContainer">
                            <?php the_cfc_field('podcastattributes', 'podcast-sources-link');
                                ?>
                        </div>
                    <?php endwhile; ?>
                </section>

                <section class="featuredEbookContainer">
                    <h5>E-Book</h5>

                    <?php
                    $resources_ebook_featured_query = new WP_Query($resources_ebook_featured_args);
                    while ($resources_ebook_featured_query->have_posts()) : $resources_ebook_featured_query->the_post();
                        ?>


                        <div class="singleFeaturedEbookContainer">
                            <a href="<?php the_cfc_field('ebooksattributes', 'ebook-sources-link'); ?>"><img src='<?php the_cfc_field('ebooksattributes', 'ebook-thumbnail-image'); ?>'></a>
                            <?php the_excerpt(); ?>
                        </div>
                    <?php endwhile; ?>

            </article>



        </div><!-- .entry-content -->
    </article><!-- #post-## -->



    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>