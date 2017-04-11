<?php
/*
template name: Équipe
*/
?>


<?php get_template_part('includes/header'); ?>

<section id="notreAgence"><!-- section-->
    <div class="container-fluid"><!-- container-->
        <?php
            $i=0;
                query_posts('post_type=equipes'); while (have_posts()) : the_post();
            $i=$i+1;

            //get back classes of each project
		    $terms = get_the_terms($post->ID, 'categorie');
		    $terms_name = array();

		    foreach($terms as $term) {
		        $terms_name[] = $term->name;
		    }
        ?>
            
        <article id="projet-<?php the_ID(); ?>" class="col-lg-3 col-md-3 col-sm-6 notreagence-structure<?php echo $term->slug; ?>  wow fadeInLeft" rel="#masque<?php echo $i; ?>">
            <div class="view">
                <?php
                    $image = get_field('photo_adulte');
                    if(!empty($image) ): ?>
                    <img class="equipe-adulte" src="<?php echo $image['url']; ?>" alt="<?php echo $image['url']; ?>" />
                <?php endif; ?>

                <div class="mask" id="masque<?php echo $i; ?>">
                    <ul class="infos">
                        <h3><?php the_title(); ?></h3>
                        <div class="fonction-equipe"><?php the_field('fonction'); ?></div>
                    </ul><!-- fin infos -->
                </div><!-- fin mask -->

                <?php
                    $image = get_field('photo_enfant');
                    if(!empty($image) ): ?>
                    <img class="equipe-enfant" src="<?php echo $image['url']; ?>" alt="<?php echo $image['url']; ?>" />
                <?php endif; ?>
            </div><!-- fin view -->
        </article><!-- fin article -->

        <?php endwhile; ?>
        <?php wp_reset_query(); ?>

    </div><!-- fin container-->
</section><!-- fin section-->

<?php get_template_part('includes/footer'); ?>



