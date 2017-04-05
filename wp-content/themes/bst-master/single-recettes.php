<?php
/*
WP Post Template: template 1 photo
*/
?>

<?php get_template_part('includes/header'); ?>

<section class="sectionPadding"><!-- section-->
	<div class="container"><!-- container-->
		<div class="row"><!-- /.row -->
			<div class="col-md-8"><!-- /.col -->
				<?php the_content()?>
			</div><!-- /.col -->
			<div class="col-md-4"><!-- /.col -->
				<ul id="infos-bloc-right">
					<?php the_title('<li class="titre">','</li>'); ?>
                	<?php the_field('second_titre'); ?>
				</ul>
			</div><!-- ./col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.section-->

<?php get_template_part('includes/footer'); ?>