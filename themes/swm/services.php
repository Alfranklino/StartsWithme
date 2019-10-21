<?php
/**
 * The template for displaying all pages.
 * Template Name: Services 
 * @package RED_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">

                    <?php the_content(); ?>

                </header><!-- .entry-header -->

                <div class="entry-content">

                    <!-- Services Loop Start  -->

                    <?php
                    global $post;
                    $post_slug = $post->post_name;
                    $service = explode("-", $post_slug);
                    ?>

                    <?php

                    $services_args = array(
                        'post_type' => 'services',
                        'posts_per_page' => '11',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'service_category',
                                'field' => 'slug',
                                'terms' => 'service-' . $service[0],
                            )
                        )
                    );
                    ?>

                    <?php
                    $services_query = new WP_Query($services_args);
                    while ($services_query->have_posts()) : $services_query->the_post();
                        ?>
                        <section class="service">
                            <article class="services-featured-image">
                                <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('large'); ?></a>
                            </article>
                            <article class="services-information">
                                <a href="<?php the_permalink(); ?>">
                                    <h2><?php the_title(); ?></h2>
                                </a>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>">learn more &rarr;</a>
                            </article>
                        </section>
                        <hr />
                    <?php endwhile; ?>

                    <!-- End Loop -->

                </div><!-- .entry-content -->
            </article><!-- #post-## -->
        <?php endwhile; 
    ?>
    </main><!-- #main -->
</div><!-- #primary -->
<?php include 'template-parts/phone-call.php'; ?>
<?php get_footer(); ?>