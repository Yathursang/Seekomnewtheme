<?php
/**
 * The Template for displaying Search Results pages.
 */

get_header();
?>
<section>
<div class="container pt-5 my-5">
<?php
if ( have_posts() ) :
?>	
	<header class="page-header">
		<h1 class="page-title bg-green p-3"><?php printf( esc_html__( 'Search Results for: %s', 'seekom' ), get_search_query() ); ?></h1>
	</header>
<?php
	get_template_part( 'archive', 'loop' );
else :
?>
	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'seekom' ); ?></h1>
		</header><!-- /.entry-header -->
		<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'seekom' ); ?></p>
		<?php
			get_search_form();
		?>
	</article><!-- /#post-0 -->

<?php
endif;
wp_reset_postdata();
?>
</div>
</section>
<?php

get_footer();
