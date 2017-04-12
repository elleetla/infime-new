<?php
/*
All the functions are in the PHP pages in the functions/ folder.
*/

require_once locate_template('/functions/cleanup.php');
require_once locate_template('/functions/setup.php');
require_once locate_template('/functions/enqueues.php');
require_once locate_template('/functions/navbar.php');
require_once locate_template('/functions/widgets.php');

function true_load_theme_textdomain(){
    load_theme_textdomain( 'bst', get_template_directory() . '/languages' );
}
add_action('after_setup_theme', 'true_load_theme_textdomain');

function jc_post_by_category($atts, $content = null) {
    extract(shortcode_atts(array(
        "nb" => '20',
        "orderby" => 'ID',
        "order" => 'ASC',
        "category" => '1'
    ), $atts));
    global $post;
    $tmp_post = $post;
    $myposts = get_posts('showposts='.$nb.'&orderby='.$orderby.'&category='.$category);
    $out = '';
    foreach($myposts as $post){
        setup_postdata( $post );
	$titre = get_post_meta($post->ID, 'Titre', true);
	$illu = get_post_meta($post->ID, 'Illu', true);
	$lien = get_post_meta($post->ID, 'lien', true);
	$Telechargement = get_post_meta($post->ID, 'Titre_Catalogues', true);
	$Telechargement2 = get_post_meta($post->ID, 'Catalogues', true);

 $out .= '<article class="col-lg-3 col-md-3 col-sm-6 notreagence-structure LanceurModal   wow fadeInLeft" id="Offres"><a href="';
 //$out .= $lien;
 $out .= '#"><div class="view" id="bloc';
 $out .= $post->ID;
 $out .= '">';
 $out .= '<img src="';
 $out .= $illu;
 $out .= '" alt="" >';
 $out .= '<div class="mask2" style="display:block;" data="interactive"><ul class="infos"><h3>';
 $out .= $titre;
 $out .= '</h3>';
  $out .= '<input class="link-value" type="hidden" value="';
 $out .= $lien;
 $out .= '">';
 $out .= '<div class="fonction-equipe"></div></ul></div></div></a>';
 if($Telechargement!=''){
 $out .= '<h3 class="titre2">';
 $out .= $Telechargement;
 $out .= '</h3>';
 }
 if($Telechargement2!=''){
 $out .= $Telechargement2;
 }
 $out .= '</article>';
    }

    wp_reset_postdata();
    $post = $tmp_post;
    return $out;
}
add_shortcode("post-by-category", "jc_post_by_category");

function jc_post_by_category2($atts, $content = null) {
    extract(shortcode_atts(array(
        "nb" => '20',
        "orderby" => 'ID',
        "order" => 'ASC',
        "category" => '1'
    ), $atts));
    global $post;
    $tmp_post = $post;
    $myposts = get_posts('showposts='.$nb.'&orderby='.$orderby.'&category='.$category);
    $out = '';
    foreach($myposts as $post){
        setup_postdata( $post );
	$titre = get_post_meta($post->ID, 'Contact', true);
	$illu = get_post_meta($post->ID, 'Illu', true);

 $out .= '<article class="col-lg-3 col-md-3 col-sm-6 notreagence-structure   wow fadeInLeft"><div class="view" id="bloc';
 $out .= $post->ID;
 $out .= '">';
 $out .= '<img src="';
 $out .= $illu;
 $out .= '" alt="" >';
 $out .= '<div class="mask3" style="display:block;"><ul class="infos"><h3>';
 $out .= $titre;
 $out .= '</h3><div class="fonction-equipe"></div></ul></div></div>';
 $out .= '</article>';
    }

    wp_reset_postdata();
    $post = $tmp_post;
    return $out;
}
add_shortcode("post-by-category2", "jc_post_by_category2");
?>