<?php
/**
 * Flexible Posts Widget: Default perso template
 * 
 * @since 3.4.0
 *
 * This template was added to overcome some often-requested changes
 * to the old default template (widget.php).
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( ! empty( $title ) )
	echo $before_title . $title . $after_title;

if ( $flexible_posts->have_posts() ):
?>

<div class="row">
	<ul class="dpe-flexible-posts template-perso">
		<?php while ( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>
		<div id="post-<?php the_ID(); ?>" class="col-md-3 col-sm-3" <?php post_class(); ?>>
			<div class="article-home"><!-- view -->
				<a href="<?php echo the_permalink(); ?>">
					<?php
						if ( $thumbnail == true ) {
							// If the post has a feature image, show it
							if ( has_post_thumbnail() ) {
							the_post_thumbnail( $thumbsize );
							// Else if the post has a mime type that starts with "image/" then show the image directly.
							} elseif ( 'image/' == substr( $post->post_mime_type, 0, 6 ) ) {
							echo wp_get_attachment_image( $post->ID, $thumbsize );
							}
						}
					?>
			</a>
			<time  class="text-muted time-article" datetime="<?php the_time('d-m-Y')?>"><?php the_time('j F Y') ?></time>
			<div class="infos">
                        <div class="titre"><?php the_title(); ?></div>
                        <!--<li class="second_titre"><?php the_field('second_titre'); ?></li>-->
                        <p><?php echo substr(strip_tags($post->post_content), 0, 140); ?>...</p>
                        <a class="ensavoirplus" href="<?php the_permalink(); ?>">En savoir plus<img width="6px" height="11px" src="<?php bloginfo('template_directory'); ?>/images/fleche-esp.png"?></a>
            </div>
		</div>
		</div>
	<?php endwhile; ?>
	</ul><!-- .dpe-flexible-posts -->
</div>
<?php	
endif; // End have_posts()
	
echo $after_widget;
