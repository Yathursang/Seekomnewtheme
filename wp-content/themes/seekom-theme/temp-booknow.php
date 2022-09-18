<?php
/**
 * Template Name: book now
 * Description: book now.
 *
 */

get_header();

?>
    <section id="book" class="values bg-blue page-pad-top">

        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-4 ">
                    <div id="booknow" class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        <?php $image = get_field('sitemap'); ?>
                        <div class=" portfolio-item ">
                            <div class="portfolio-wrap">
                                <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid image-shadow "
                                    alt="<?php echo esc_attr($image['alt']); ?>">
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        <a href="<?php echo esc_url($image['url']); ?>"
                                            data-gallery="portfolioGallery" class="portfokio-lightbox"
                                            title="<?php echo esc_attr($image['alt']); ?>"><span class="fullview" >CLICK FOR FULL VIEW </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>                    
                </div>
                <div class="col-md-8 ">  <?php the_field('book_now_code');?></div>
            </div>
          
        </div>
    </section>
  
      

<?php
get_footer();