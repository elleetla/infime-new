<?php
/*
template name: Notre offre
*/
?>


<?php get_header() ?>  <!-- get_template_part('includes/header'); -->


<section id="notreAgence"><!-- section-->
    <div class="container">
        <?php the_content()?>
    <?php
    $images = get_field('slider');
    if( $images ): ?>

    <div id="owl-demo" class="owl-carousel owl-theme">

        <?php foreach( $images as $image ): ?>
            <a href=" <?php echo $image['lien'];?>" target="_blank"> 
                <div class="item">
                    <img class="lazyOwl" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <div id="itemsBlack"></div>
                    <span id="categorie-infos">
                        <?php echo $image['title'];?>
                    </span>
                </div>
            </a>
        <?php endforeach; ?> 
    
    </div>
    <?php endif; ?>
<script>
$( ".lienNormal" ).click(function() {

	window.location.href=$(this).attr('href');
	return false;

});
</script>

    </div><!-- fin container -->
</section><!-- fin section-->

<?php get_footer(); ?> <!-- get_template_part('includes/footer'); -->
