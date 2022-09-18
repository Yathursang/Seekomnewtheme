<?php  $a=get_the_title();?>
<div id="<?php  echo strtok($a," "); ?>" class="pt-4">
<section id="portfolio" class="portfolio values ">

    <div  class="container" data-aos="fade-up">
 
        <header class="section-header">
           <!-- <h2 class="fs-4 pt-5"  ><?php the_title(); ?></h2> -->
            <!-- <p class="fs-5"><?php echo the_field( 'top_title_description' ); ?></p> -->
        </header>
        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-4 pricing" data-aos="zoom-in" data-aos-delay="200">
                <div class="box">
                    <?php if (get_field( 'offer_price' )): ?>
                    <span class="featured">Offer price</span>
                    <?php endif; ?>
                    <h3 style="color: #00549f;" ><?php the_title(); ?></h3>
                  
                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/values-1.png" class="img-fluid" alt=""> -->
                    <hr>
                    <?php if( have_rows('featured_descriptions') ): ?>
                    <ul class="text-start pt-3">
                        <?php while( have_rows('featured_descriptions') ) : the_row(); ?>
                        <li><?php echo the_sub_field('featured_description'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                    <a href="/book-now/" class="btn-buy">BOOK NOW</a>
                </div>

            </div>
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <?php 
                
            $imagesgallery = get_field('image_gallery');
            //  var_dump($imagesgallery) ;
            $images=$imagesgallery['images'] ;
           
            if( $images ): ?>

                    <?php foreach( $images as $imageID ): ?>

                    <div class="col-lg-4 col-md-4 col-6 portfolio-item ">
                        <div class="portfolio-wrap">
                            <img src="<?php echo $imageID['url']; ?>" class="img-fluid"
                                alt="<?php echo $imageID['alt']; ?>">
                            <div class="portfolio-info">
                                <h5><?php echo $imageID['title']; ?></h5>
                                <p><?php echo $imageID['caption']; ?></p>
                                <div class="portfolio-links">
                                    <a href="<?php echo $imageID['url']; ?>"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox"
                                        title="<?php echo $imageID['caption']; ?>"><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</section><!-- End Portfolio Section -->
                    </div>