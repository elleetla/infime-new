<?php
/*
template name: Réalisations2
*/
?>

<?php get_template_part('includes/header'); ?>



<section id="nos-projet" class="container-fluid clearfix"><!-- section-->
    <div id="PostProjet">
        <?php

          query_posts('post_type=recettes');
            while (have_posts()) : the_post();
            //Récupérer les catégories de chaque projet
            $terms = get_the_terms($post->ID, 'origine');
            $terms_name = array();
            foreach($terms as $term) { $terms_name[] = $term->name; }

        ?>

        <article class="col-md-3 col-lg-3 col-sm-6 realisations-structure <?php echo $term->slug; ?>"><!-- realisation -->

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
                           
						  
				
                            <?php $cat = trim(get_field ('categorie_de_projet'));
                                //var_dump($cat);
                                if ($cat == 'image'){
                                    echo '<img data = "image" class="picto-image" src="'.esc_url( get_template_directory_uri() ).'/images/picto-image.png">';
                                }
                                elseif ($cat == 'video'){
                                    echo '<img data = "video" class="picto-image" src="'.esc_url( get_template_directory_uri() ).'/images/picto-video.png">';
                                }
                                elseif ($cat == 'interactive'){
                                    echo '<img  data = "interactive" class="picto-image" src="'.esc_url( get_template_directory_uri() ).'/images/picto-interactif.png">';
                                }
                            ?>
                        </ul><!-- /.infos -->
                    </div><!-- /.mask -->
                    <a>
                        <?php the_post_thumbnail(); ?>
                    </a>
                </div><!-- /.view -->

                
        </article><!-- fin realisaton structure -->

        <?php endwhile; ?>
    </div><!-- fin post projet -->
</section><!-- fin nos projets-->

<!-- Modal -->
<div class="modal fade bstmodal" id="DisplayProjet" tabindex="-1" role="dialog" aria-labelledby="DisplayProjetLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <span class="modal-prev" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/flecheModalLeft.png"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="modal-media">
                </div>
                <span class="modal-next" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/flecheModalRight.png"></span>
            </div>
            <div class="modal-footer">
                <h1 class="modal-title" id="DisplayProjetLabel"><?php the_title(); ?></h1>
                <h2 class="modal-title" id="DisplayTypeProjetLabel"></h2>
            </div>
        </div>
    </div>
</div>
<?php wp_reset_query(); ?>

<?php get_template_part('includes/footer'); ?>
