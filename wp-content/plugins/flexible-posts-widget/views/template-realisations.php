<?php
/**
 * Flexible Posts Widget: model derniers projets
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

<div class="row"><!-- row -->

		<?php while ( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>

		<article id="projet-<?=$i ?>"class="col-md-3 col-lg-3 col-sm-6 realisations-structure <?php echo $term->slug; ?>"><!-- realisation -->
            <?php $i++; ?>
                <input type="hidden" class="link-value" value="<?php
                if( !empty( get_field ('lien_image') ) ){
                    $img = get_field ('lien_image');
                    echo $img["url"];
                }
                elseif(!empty(get_field ('lien_interactif')) ){
                    echo  trim(get_field ('lien_interactif'));
                }elseif(!empty(get_field ('lien_video')) ){
                    echo  trim(get_field ('lien_video'));
                }
            ?>">

            <input type="hidden" class="content-value" value ="<?php echo strip_tags(get_the_content());?>">
                <div class="view"><!-- view -->
                    <div class="mask"><!-- mask -->
                        <ul class="infos"><!-- infos -->
                            <span id="categorie-infos"><?php the_field('categorie_de_projet'); ?></span>
                            <?php $cat = trim(get_field ('categorie_de_projet'));
                                //var_dump($cat);
                                if ($cat == 'image'){
                                    echo '<img data = "image" class="picto-image" src="'.esc_url( get_template_directory_uri() ).'/images/picto-image.png">';
                                }
                                elseif ($cat == 'video'){
                                    echo '<img data = "video" class="picto-image" src="'.esc_url( get_template_directory_uri() ).'/images/picto-video.png">';
                                }
                                elseif ($cat == 'interactifs'){
                                    echo '<img  data = "interactifs" class="picto-image" src="'.esc_url( get_template_directory_uri() ).'/images/picto-interactif.png">';
                                }
                            ?>
                        </ul><!-- /.infos -->
                    </div><!-- /.mask -->
                    <a>
                        <?php the_post_thumbnail(); ?>
                    </a>
                </div><!-- /.view -->

                <figcaption id="infos">
                    <h1>
                        <?php the_title(); ?>
                        <?php // echo (strlen(get_the_title()) > 20)  ? substr(get_the_title(), 0, 20).'...' : get_the_title(); ?>
                    </h1>
                    <h2>
                        <?php the_field('localisations'); ?>
                    </h2>
                    <div class="type-projet">
                        <?php the_field('type_de_projet'); ?>
                    </div>
                </figcaption><!-- fin infos -->
        </article><!-- fin realisaton structure -->
		<?php endwhile; ?>

		<!-- Modal -->
<div class="modal fade bstmodal" id="DisplayProjet" tabindex="-1" role="dialog" aria-labelledby="DisplayProjetLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
							<span class="glyphicon glyphicon-menu-left modal-prev" aria-hidden="true"></span>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<div class="modal-media">
							</div>
							<span class="glyphicon glyphicon-menu-right modal-next" aria-hidden="true"></span>
            </div>
            <div class="modal-footer">
                <h1 class="modal-title" id="DisplayProjetLabel"><?php the_title(); ?></h1>
                <h2 class="modal-title" id="DisplayTypeProjetLabel"></h2>
            </div>
        </div>
    </div>
</div>


		<?php wp_reset_query(); ?>
</div><!-- end row -->

<?php
endif; // End have_posts()

echo $after_widget;
