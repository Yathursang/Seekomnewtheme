<?php
/**
 * Template Name: policy
 * Description: policy
 *
 */

get_header();

the_post();
?>
<section id="values" class="values bg-blue page-pad-top">
        <div class="container" data-aos="fade-up">
			<?php
				the_content();	
			?>
		</div>
</section>
<?php
get_footer();
