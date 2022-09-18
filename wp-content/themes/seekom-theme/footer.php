<footer id="footer" class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <h3>Links</h3>
            <?php
                if( have_rows('other_holiday_park_links','option') ):
                while( have_rows('other_holiday_park_links','option') ) : the_row();
            
                $link = get_sub_field('links','option');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
               ?>
                    <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></br>
                <?php endif;
              
                endwhile;
                else :
                endif;
                ?>
                 <h3 class="pt-3">Facilities</h3>
            <?php
                if( have_rows('facilitieslink','option') ):
                while( have_rows('facilitieslink','option') ) : the_row();
            
                $link = get_sub_field('links','option');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
               ?>
                    <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></br>
                <?php endif;
              
                endwhile;
                else :
                endif;
                ?>
          </div>
        
          <div class="col-lg-7 col-md-12 footer-contact text-center text-md-start">
         
          <!-- <form class="form-inline" action="/book-now/" target="" method="get" onsubmit="return">
					<input type="hidden" name="reset" value="true">
					<div class="form-group jj">
						<label class="titlefontsize"> Availability</label>
						<input type="date" name="name" class="form-control" placeholder="Your Name">		
					<button type="submit" name="submit" title="Search" id="submit" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center "><span class="py-2" >Book Now</span></button>
					</div>
				</form> -->
          <!-- <form action="/book-now" method="get" target="" class="php-email-form  py-4" onsubmit="return">
          <input type="hidden" name="reset" value="true">
              <div class="row gy-4 align-items-center ">
                <div class="col-md-4 text-start">
                  <input type="date" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="col-md-4 text-center">
                  <a  type="submit" name="submit" id="submit" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center "><span class="py-2" >Book Now</span></a>
                </div>

              </div>
            </form> -->
            <a href="/book-now/"  type="submit" name="submit" id="submit" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center "><span class="py-2" >Book Now</span></a>
              <h4 class="pt-4">PHONE:</h4> <?php echo the_field('phone_number','option') ?><br>
              <h4 class="pt-4">PIGEON BAY CAMPING GROUNG ADDRESS:</h4>  <?php echo the_field('address','option') ?><br>
           
           
          </div>

        </div>
      </div>
    </div>

    <div class="container  pb-4">
      <div class="copyright text-white">
      <?php echo the_field('footer_description','option') ?>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
		
		
	
	<?php
		wp_footer();
	?>
</body>
</html>
