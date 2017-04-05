<?php get_template_part('includes/header'); ?>



<section id="nos-articles">
	<div class="container">	</div><!-- /.container -->
 
				<?php get_template_part('includes/loops/content', get_post_format()); ?>
    	

</section>

<?php get_template_part('includes/footer'); ?>
