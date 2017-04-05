<?php get_template_part('includes/header'); ?>

<section class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div id="content" role="main">
          <?php get_template_part('includes/loops/content', 'page'); ?>
        </div><!-- /#content -->
      </div>
    
      <div class="col-md-4" id="sidebar" role="navigation">
        <?php get_template_part('includes/sidebar'); ?>
      </div>
    </div>
  </div><!-- /.container -->
</section>

<?php get_template_part('includes/footer'); ?>
