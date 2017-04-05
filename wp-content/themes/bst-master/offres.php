<?php
/*
template name: Notre offre2
*/
?>

<?php get_template_part('includes/header'); ?>



<section id="nos-articles">
    <div class="container-fluid"><!-- container-->
        <?php the_content()?>
    </div>

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/wow/animate.css">
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/wow/wow.min.js"></script>
    <script> new WOW().init(); </script>
</section>

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
<?php get_template_part('includes/footer'); ?>
