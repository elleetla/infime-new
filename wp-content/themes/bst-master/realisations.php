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
                <!-- sidebar menu (Prestations/Secteurs) -->

                <?php
                $terms = get_terms("origine"); // get all categories (Image/Vidéo/Interactive 360°/Logement & Résidentiel)
                $count = count($terms);

                if ( $count > 0 ){
                    /*
                    echo '<li id="menu1" class=""><a href="#"  rel="#menu1" class="level1">Prestations</a>
                        <ul rel="#menu1">';
                    foreach ( $terms as $term ) {
                        if(  ) {


                        //create a list item with the current term slug for sorting, and name for label
                        echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>";

                    }
                    */

                    echo '<li id="menu2" class=""><a href="#" rel="#menu2"  class="level1">Secteurs</a>
                            <ul rel="#menu2">';
                        foreach ($terms as $term){

                            $term_id =get_queried_object()->term_id;
                            $choice = get_field('choix_menu_categorie', $term_id);

                            if( $choice == "secteurs"){
                                echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>";
                            }

                        }

                }
                ?>

            </ul>
        </nav><!-- fin nav primary -->
    </div><!-- fin col md -->
</div><!-- fin menu isotope -->

<section id="notreAgence" class="Projets"><!-- section-->
    <div class="container-fluid">
        <div id="PostProjet">
            <?php

            $args = array(
                    'post_type'         =>  'recettes',
                    'posts_per_page'    =>  -1,
                    //'tax_query'         => $tax
                    );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();

            ?>

            <article id="projet-<?PHP the_ID(); ?>" class="col-md-3 col-lg-3 col-sm-6 realisations-structure <?php
                //display all 2 taxonomies of the realisations
                $taxos = wp_get_post_terms($post->ID, 'origine');
                foreach ($taxos as $taxo){
                    $taxo = $taxo ->slug.' ';
                    echo $taxo; // image secteur1 ...
                }
                ?>"><!-- realisation -->

                <?php
                //for each term, define taxonomy parameters
                if($taxo == "image secteur1"){
                    $tax = array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'origine',
                            'field'    => 'slug',
                            'terms'    => array( 'image' ),
                        ),
                        array(
                            'taxonomy' => 'origine',
                            'field'    => 'slug',
                            'terms'    => array( 'secteur1' ),
                        ),
                    );
                }
                elseif ($taxo == "video"){
                    $tax = array(
                        array(
                            'taxonomy' => 'origine',
                            'field'    => 'slug',
                            'terms'    => array( 'video' ),
                        )
                    );
                }

                elseif ($taxo == "interactive"){
                    $tax = array(
                        array(
                            'taxonomy' => 'origine',
                            'field'    => 'slug',
                            'terms'    => array( 'interactive' ),
                        )
                    );
                }

                ?>

                <input type="hidden" class="link-value" value="<?php
                if( !empty( get_field ('lien_image') ) ){
                    $img = get_field ('lien_image');
                    echo $img["url"];
                }
                elseif(!empty(get_field ('lien_interactive')) ){
                    echo  trim(get_field ('lien_interactive'));
                }
                elseif(!empty(get_field ('lien_video')) ){
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
                            <h2><?php the_field('localisations'); ?></h2>

                            <div class="type-projet">
                                <?php the_field('secteurs'); ?>
                            </div>
                        </figcaption><!-- fin infos -->
                    </div><!-- /.mask -->

                    <a><?php the_post_thumbnail(); ?></a>

                </div><!-- /.view -->
            </article><!-- fin realisaton structure -->

            <?php endwhile; ?>
        </div><!-- fin post projet -->
    </div>
</section><!-- fin nos projets-->

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

<script>
    //http://www.designlunatic.com/2012/07/a-continuation-of-the-isotope-tutorial-combination-filters/
    $(document).ready(function(){

        //isotope the main container
        var $container = $('#notreAgence');

        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false,
            }
        });

        //reorder realisations when user clicks on a link
        $('#menu1 a').click(function(){

            var prestations = $(this).attr('data-filter');

            $('#menu1').attr('data-active', prestations);

            reorder();

            return false;
        });

        $('#menu2 a').click(function(){

            var secteurs = $(this).attr('data-filter');

            $('#menu2').attr('data-active', secteurs);

            reorder();

            return false;
        });

        //create the function "reorder"
        function reorder(){

            var prestations = $('#menu1').attr('data-active');
            var secteurs = $('#menu2').attr('data-active');

            //in case the user only click on a prestation or a sector, but not both filters
            //check if each variable has been defined
            if (typeof prestations === 'undefined') {
                prestations = "";
            }
            if (typeof secteurs === 'undefined') {
                secteurs = "";
            }

            var filterString = prestations+secteurs;

            //tell the container to reorder its content
            $container.isotope({
                filter: filterString,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false,
                }
            });
        }
    });
</script>

<?php get_template_part('includes/footer'); ?>
