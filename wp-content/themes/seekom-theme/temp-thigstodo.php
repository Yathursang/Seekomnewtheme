<?php
/**
 * Template Name: what we do
 * Description: what we do.
 *
 */

get_header();

?>
    <section id="values" class="values bg-blue page-pad-top">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2 class="fs-4">Things To Do</h2>
                <p class="fs-5">Pigeon Bay is where time has stopped and is full of places of historic interest to visit and explore. Being part of Banks Peninsula, there are plenty of other interesting places to explore or activities to try within an hours drive:</p>
            </header>

            <div class="row">

                <?php
                $args = array(
                    'post_type' => 'near-location',
                );
                $room_query = new WP_Query($args);
                if ($room_query->have_posts()): while ($room_query->have_posts()): $room_query->the_post();?>
                <?php get_template_part('template-parts/location', 'management');?>
                <?php endwhile;endif;?>
            </div>

        </div>
    </section>
    
      

<?php
get_footer();