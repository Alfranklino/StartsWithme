<?php

/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 */
get_header(); ?>


<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">



        <?php while (have_posts()) : the_post(); ?>

            <header class="entry-header">
                <?php the_content(); ?>
                <?php the_post_thumbnail('full'); ?>
                <!-- Add this image for the logo -->
                <?php $uploads = wp_upload_dir(); ?>
                <img src="<?php echo $uploads['baseurl'] . '/2019/07/image_hero_gradient-mobile-version.png'; ?>" class="hero-banner-mobile" alt="Starts With Me Hero Banner mobile version">
            </header><!-- .entry-header -->

        <?php endwhile; ?>

        <div class="entry-content">

            <!-- Past Clients Loop Start  -->
            <?php
            $past_clients_args = array(
                'post_type' => 'pastclients',
                'posts_per_page' => '10',
            );
            ?>
            <section class='pastClients'>
                <h4>Past Clients</h4>
                <?php
                $past_clients_query = new WP_Query($past_clients_args); ?>
                <section class="pastClientsContainer">
                    <?php while ($past_clients_query->have_posts()) : $past_clients_query->the_post();
                        ?>

                        <a href="<?php the_cfc_field('pastclientsattributes', 'website-url-of-the-past-client'); ?> " class="aPastClient"><img src="<?php the_cfc_field('pastclientsattributes', 'past-client-icon'); ?>"></a>
                    <?php endwhile; ?>
                </section>
            </section>
            <!-- End Past Clients Loop -->

            <section class="serviceBannerContainer">
                <figure class="serviceBannerItem">
                    <img src='<?php echo get_site_url(null, '/wp-content/uploads/2019/06/icon_talk.png'); ?>'>
                    <figcaption>Talk</figcaption>
                </figure>
                <figure class="serviceBannerItem">
                    <img src='<?php echo get_site_url(null, '/wp-content/uploads/2019/06/icon_workshops.png'); ?>'>
                    <figcaption>Workshops</figcaption>
                </figure>
                <figure class="serviceBannerItem">
                    <img src='<?php echo get_site_url(null, '/wp-content/uploads/2019/06/icon_consulting.png'); ?>'>
                    <figcaption>Consulting</figcaption>
                </figure>
            </section>

            <section class="whoWeAreContainer">
                <h4>Who We Are</h4>
                <p class="whoText">We are a mental health service provider and we create platforms to support gaps in the workplace, education, and services by empowering individuals to increase their capacity for well-being.</p>
            </section>

            <section class="sloganContainer">
                <h1>Over 50,000 people have joined the movement. Change the way you live life, it starts with you.</h1>
            </section>

            <section class="howWeHelpContainer">
                <h4 class="howWeHelpTitle">How We Help</h4>
                <section class="howWeHelpIconsContainer">
                    <article class="howWeHelpBlock">
                        <img src='<?php echo get_site_url(null, '/wp-content/uploads/2019/06/icon_overcome_stress.png'); ?>'>
                        <section class="howWeHelpDescr">
                            <h4>Overcome Stress</h4>
                            <p>Stress can be advantageous when its channeled in the right way</p>
                        </section>
                    </article>
                    <article class="howWeHelpBlock">
                        <img src='<?php echo get_site_url(null, '/wp-content/uploads/2019/06/icon_inc_productivity.png'); ?>'>
                        <section class="howWeHelpDescr">
                            <h4>Increase productivity</h4>
                            <p>Cultivating mental health makes it easier to focus on work</p>
                        </section>
                    </article>
                    <article class="howWeHelpBlock">
                        <img src='<?php echo get_site_url(null, '/wp-content/uploads/2019/06/icon_openspace.png'); ?>'>
                        <section class="howWeHelpDescr">
                            <h4>Overcome Stress</h4>
                            <p>Creating a safe space for conversations about mental health makes mental illness easier to address</p>
                        </section>

                    </article>
                </section>
            </section>

            <!-- PHP code to display strong testimonials -->
            <?php if (function_exists('strong_testimonials_view')) {
                strong_testimonials_view('1');
            } ?>

            <section class="whoWeServeContainer">
                <h4>Who We Serve</h4>
                <p class="whoText">We believe that everyone has the potential to live with contentment and satisfaction. We focus on helping managers, employers, educators, and students, and will customize our services to meet your needs.</p>
            </section>

            <!--  Front Page Services Custom Loop to Display 2 Most Recent Services  -->

            <?php $front_page_services_args = ['taxonomy' => 'service_category', 'hide_empty' => 0, 'number' => '2'];
            $front_page_services_terms = get_terms($front_page_services_args);
            ?>
            <section class="front_page_services_container">
                <?php foreach ($front_page_services_terms as $terms) : ?>
                    <article class="front_page_services">
                        <?php echo get_term_thumbnail($terms->term_taxonomy_id) ?>
                        <section class="meta-services">
                            <p><?php echo $terms->name; ?></p>

                            <?php $service_url = '';
                            $service_url = get_site_url() . '/' . strtolower($terms->name) . '-services/';
                            ?>
                            <a href="<?php echo $service_url; ?>">
                                <p>Learn More <span>&#62;</span></p>
                            </a>
                        </section>
                    </article>
                <?php endforeach; ?>
            </section>
            <!-- End Loop -->

            <!--  Front Page Categories Custom Loop to Display All Categories  -->

            <section class="resourcesContainer">
                <h4 class="resourcesTitle">Resources</h4>
                <?php $front_page_services_args2 = ['taxonomy' => 'resource_category', 'hide_empty' => 0, 'number' => '4', 'parent' => '0'];
                $front_page_services_terms2 = get_terms($front_page_services_args2);
                ?>
                <section class="front_page_resources_data">
                    <?php foreach ($front_page_services_terms2 as $terms2) : ?>
                        <article class="front_page_link_container">
                            <a href="<?php echo get_term_link($terms2); ?>">
                                <section class="front_page_resources">
                                    <?php echo get_term_thumbnail($terms2->term_taxonomy_id); ?>
                                    <section class="resources_meta_text">
                                        <h4><?php echo $terms2->name; ?></h4>
                                        <p><?php echo $terms2->description; ?></p>
                                    </section>

                                </section>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </section>
            </section>

            <!-- End Loop -->

        </div><!-- #content -->
    </main><!-- #main -->
</div><!-- #primary -->

<!-- <section>  -->
<!-- <script type="text/javascript">
            jQuery(document).ready(function($){
                // $('.front_page_link_container').load('footer.php #colophon', '', function(response, status, xhr) {
                //     if (status == 'error') {
                //         var msg = "Sorry but there was an error: ";
                //         $("footer").html(msg + xhr.status + " " + xhr.statusText);
                //         // console.log(msg);
                //     }
                // });
                $('.front_page_link_container').load("archive.php");
                console.log($(location).attr("href"));
            });
        </script>  -->
<?php include 'template-parts/phone-call.php'; ?>

<?php get_footer(); ?>