
<div class="col-lg-4 mt-4 mb-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
      <div class="box">
          <?php $location_images = get_field('location_image'); ?>
        <img src="<?php echo $location_images['url'];  ?>" class="img-fluid" alt="<?php the_title(); ?>">
        <h3 class="pt-3"><?php the_title(); ?></h3>
        <p><?php echo the_field( 'location_description' ); ?></p>
      </div>
    </div>