<?php
/* Template Name: Homepage Template */

get_header();
$herosection = get_field('hero_banner');

?>

<section id="hero" class="hero d-flex align-items-center"
    style="background: url(<?php echo $herosection['banner_image']['url'] ?>) center center no-repeat;">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up text-white"><?php echo $herosection['banner_title']; ?></h1>
                <h2 data-aos="fade-up text-white" data-aos-delay="400">
                    <?php echo $herosection['banner_description'];  ?></h2>
                    <a href="/book-now" type="submit" class="btn-get-started scrollto d-inline-flex align-items-center  align-self-baseline "><span class="py-2">Book Now</span></a>
    
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">

                    </div>
                </div>
            </div>
            
        </div>
    </div>

</section>
<section id="FACILITIES" class="values">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2 class="fs-4 pt-5"><?php the_field('facilities_title'); ?></h2>
            <p class="fs-5"><?php the_field('facilities_sub_title'); ?></p>
        </header>

        <div class="row">
            <?php 
              $rows = get_field('room_facilities');
              if( $rows ): 
              foreach( $rows as $row ):?>
            <div class="col-md-6 mt-4 mt-lg-0 text-center facilites" data-aos="fade-up" data-aos-delay="400">
            <div class="row">
              <div class="col-4"><img src="<?php echo $row['icon']['url'];  ?>" class="img-fluid" alt="<?php echo $row['text'] ?>"></div>
                
              <div class="col-8"><h5 class="pt-3"><?php echo $row['text'] ?></h5></div>

              </div>
            </div>
            <?php endforeach; endif; ?>
        </div>

    </div>

</section>

<?php
$args = array(
    'post_type' => 'room-nilson',
);
$room_query = new WP_Query($args);
if ($room_query->have_posts()): while ($room_query->have_posts()): $room_query->the_post();?>
<?php get_template_part('template-parts/room', 'management');?>
<?php endwhile;endif;?>

<!-- ======= Contact Section ======= -->



<?php
get_footer();?>