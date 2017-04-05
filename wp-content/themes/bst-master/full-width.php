<?php
/*
template name: full width
*/
?>


<?php get_template_part('includes/header'); ?>

<!--<div class="fil-ariane">
  <div class="container">
    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
  </div>
</div>-->

<section>
	<div class="container">
		<?php get_template_part('includes/loops/content', 'fullwidth'); ?>
	</div>
</section>


