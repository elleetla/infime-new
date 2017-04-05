<?php
/*
template name: Réalisations
*/
?>

<?php get_template_part('includes/header'); ?>

<div id="menu-isotope" class="container-fluid">
    <div class="col-md-12">
        <nav class="primary">
	    <h4>Filtrer par</h4>
            <ul>
                <li style="display:none;"><a href="#" class="selected" data-filter="*">Tous les projets</a></li>
		<li id="menu1" class=""><a href="#"  rel="#menu1" class="level1">Prestations</a>
      		<ul rel="#menu1">
                <li><a href="#" data-filter=".image" rel="#menu1">Image</a></li>
                
                <li><a href="#" data-filter=".video" rel="#menu1">Vidéo</a></li>
		<li><a href="#" data-filter=".interactive" rel="#menu1">Interactif 360°</a></li>
		</ul>
            	</li>
		<li id="menu2" class=""><a href="#" rel="#menu2"  class="level1">Secteurs</a>
      		<ul rel="#menu2">
                <li><a href="#" data-filter=".secteur1" rel="#menu2">Logement & Résidentiel</a></li>
                <li><a href="#" data-filter=".secteur2" rel="#menu2">Tertiaire & Entreprise</a></li>
                <li><a href="#" data-filter=".secteur3" rel="#menu2">Urbanisme & Aménagement</a></li>
		<li><a href="#" data-filter=".secteur4" rel="#menu2">Retail & Centres Commerciaux</a></li>
		</ul>
            	</li>
            </ul>
        </nav><!-- fin nav primary -->
    </div><!-- fin col md -->
</div><!-- fin menu isotope -->

<section id="notreAgence" class="Projets"><!-- section-->
<div class="container-fluid">
    <div id="PostProjet">
        <?php

          query_posts('post_type=recettes');
            while (have_posts()) : the_post();
            //Récupérer les catégories de chaque projet
            $terms = get_the_terms($post->ID, 'origine');
            $terms_name = array();
            foreach($terms as $term) { 	$terms_name[] = $term->name; }	
	foreach($terms  as $term ) {
        $termslist=$termslist.$term->slug.'  ';
        }
       $termslist = substr($termslist,0,-2);
    

        ?>

                    <?php
		

  			        if (trim(get_field('secteurs')) == 'Logement & Résidentiel'){
                                    $data0 = "secteur1";
                                }
                                elseif (trim(get_field('secteurs')) == 'Tertiaire & Entreprise'){
                                   $data0 = "secteur2";
                                }
                                elseif (trim(get_field('secteurs')) == 'Urbanisme & Aménagement'){
                                    $data0 = "secteur3";
                                }
				elseif (trim(get_field('secteurs')) == 'Retail & Centre commercial'){
                                    $data0 = "secteur4";
                                }
	 	      ?>
			<?php
			$cat = trim(get_field ('categorie_de_projet'));

  			        if ($cat == 'image'){
                                    $data = "image";
                                }
                                elseif ($cat == 'video'){
                                   $data = "video";
                                }
                                elseif ($cat == 'interactive'){
                                    $data = "interactive";
                                } ?>
        <article id="projet-<?PHP the_ID(); ?>" class="col-md-3 col-lg-3 col-sm-6 realisations-structure <?php echo $data0; ?> <?php echo $data; ?>  "><!-- realisation -->

                <input type="hidden" class="link-value" value="<?php
                if( !empty( get_field ('lien_image') ) ){
                    $img = get_field ('lien_image');
                    echo $img["url"];
                }
                elseif(!empty(get_field ('lien_interactive')) ){
                    echo  trim(get_field ('lien_interactive'));
                }elseif(!empty(get_field ('lien_video')) ){
                    echo  trim(get_field ('lien_video'));
                }
            ?>">

            <input type="hidden" class="content-value" value ="<?php echo strip_tags(get_the_content());?>">
                <div class="view"><!-- view -->
                    <div class="mask"><!-- mask -->
                        <?php $cat = trim(get_field ('categorie_de_projet'));
                                 //var_dump($cat);
                                if ($cat == 'image'){
                                    echo '<img data = "image" class="picto-image" src="'.esc_url( get_template_directory_uri() ).'/images/loupe.png">';
                                }
                                elseif ($cat == 'video'){
                                    echo '<img data = "video" class="picto-image" src="'.esc_url( get_template_directory_uri() ).'/images/loupe.png">';
                                }
                                elseif ($cat == 'interactive'){
                                    echo '<img  data = "interactive" class="picto-image" src="'.esc_url( get_template_directory_uri() ).'/images/loupe.png">';
                                }
                            ?>
                        <figcaption id="infos">
                            <h1>
                                <?php the_title(); ?>
                                <?php // echo (strlen(get_the_title()) > 20)  ? substr(get_the_title(), 0, 20).'...' : get_the_title(); ?>
                            </h1>
                            <h2>
                                <?php the_field('localisations'); ?>
                            </h2>
                            <div class="type-projet">
                                <?php the_field('secteurs'); ?>
                            </div>
                        </figcaption><!-- fin infos -->
                    </div><!-- /.mask -->
                    <a>
                        <?php the_post_thumbnail(); ?>
                    </a>

                </div><!-- /.view -->
				 
        </article><!-- fin realisaton structure -->

        <?php endwhile; ?>
    </div><!-- fin post projet -->
  </div>
</section><!-- fin nos projets-->
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/wow/animate.css">
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/wow/wow.min.js"></script>
      <script>
       new WOW().init();
     </script>
<!-- Modal -->
<div class="modal fade bstmodal" id="DisplayProjet" tabindex="-1" role="dialog" aria-labelledby="DisplayProjetLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <span class="modal-prev" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/flecheModalLeft.png"></span>
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
