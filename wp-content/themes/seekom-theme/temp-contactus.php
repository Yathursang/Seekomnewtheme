<?php
/**
 * Template Name: Contact
 * Description: Contact
 *
 */

get_header();
$contact = get_field('contact');
?>
    <section id="values" class="values bg-blue page-pad-top">
        <div class="container" data-aos="fade-up">
          <section id="contact" class="contact">
              <div class="container" data-aos="fade-up">
                <header class="section-header">
                  <h1>Location and Site Map</h1>
                </header>
                <div class="row gy-4">
                  <div class="col-lg-6 ">
                  <div id="booknow" class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        <?php $image = get_field('sitemap'); ?>
                        <div class=" portfolio-item ">
                            <div class="portfolio-wrap">
                                <img src="<?php echo $contact['site_map']['url']  ?>" class="img-fluid image-shadow "
                                    alt="<?php echo esc_attr($contact['site_map']['alt']); ?>">
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        <a href="<?php echo $contact['site_map']['url']  ?>"
                                            data-gallery="portfolioGallery" class="portfokio-lightbox"
                                            title="<?php echo esc_attr($contact['site_map']['alt']); ?>"><span class="fullview" >CLICK FOR FULL VIEW </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                        </div>
                  <div class="col-lg-1 "></div>
                  <div class="col-lg-5 ">
                      <h1>Enquiry Form</h1>
                  <?php echo $contact['form'];  ?>
                  </div>
                </div>
                <div class="row gy-4 pt-4">
                <?php echo $contact['google_map'];  ?>
                </div>
              </div>
          </section>
        </div>
    </section>
  
      

<?php
get_footer();