<?php
/*
The Default Loop (used by index.php and category.php)
=====================================================

If you require only post excerpts to be shown in index and category pages, then use the [---more---] line within blog posts.

If you require different templates for different post types, then simply duplicate this template, save the copy as, e.g. "content-aside.php", and modify it the way you like it. (The function-call "get_post_format()" within index.php, category.php and single.php will redirect WordPress to use your custom content template.)

Alternatively, notice that index.php, category.php and single.php have a post_class() function-call that inserts different classes for different post types into the section tag (e.g. <section id="" class="format-aside">). Therefore you can simply use e.g. .format-aside {your styles} in css/bst.css style the different formats in different ways.
*/
?>
<?php
query_posts('orderby=date&order=desc&cat=1');
?>

  <div class="container-fluid"><!-- container-->
<?php $i=0;  if(have_posts()): while(have_posts()): the_post();  $i=$i+1; ?>
<article class="col-lg-3 col-md-3 col-sm-6 notreagence-structure    wow fadeInLeft" id="post_<?php the_ID()?>"  rel="#masque<?php echo $i; ?>">


		<div class="view">
                       <?php the_post_thumbnail(); ?>
                        
                    <div class="mask"  id="masque<?php echo $i; ?>">
                        <ul class="infos">
                            <h3><?php the_title(); ?></h3>
                            <div class="fonction-equipe"><?php /*<h4><time datetime="<?php the_time('d-m-Y')?>"><?php the_time('j F, Y') ?></time></h4>*/ ?>
                            <p><?php echo substr(strip_tags($post->post_content), 0, 180); ?></p></div>
                        </ul><!-- fin infos -->
                    </div><!-- fin mask -->
                    <?php 
                        $image = get_field('photo_adulte');
                        if(!empty($image) ): ?>
                        <img class="equipe-adulte" src="<?php echo $image['url']; ?>" alt="<?php echo $image['url']; ?>" />
                    <?php endif; ?>
                </div><!-- fin view -->
    </article>
<?php endwhile; ?>
</div>

<?php if ( function_exists('bst_pagination') ) { bst_pagination(); } else if ( is_paged() ) { ?>
  <ul class="pagination">
    <li class="older"><?php next_posts_link('<i class="glyphicon glyphicon-arrow-left"></i> ' . __('Previous', 'bst')) ?></li>
    <li class="newer"><?php previous_posts_link(__('Next', 'bst') . ' <i class="glyphicon glyphicon-arrow-right"></i>') ?></li>
  </ul>
<?php } ?>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/wow/animate.css">
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/wow/wow.min.js"></script>
      <script>
       new WOW().init();
     </script>
<?php else: wp_redirect(get_bloginfo('siteurl').'/404', 404); exit; endif;

?>
