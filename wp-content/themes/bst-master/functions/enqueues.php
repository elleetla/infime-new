<?php

function bst_enqueues() {

	wp_register_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', false, '3.3.4', null);
	wp_enqueue_style('bootstrap-css');

	wp_register_style('owl-css', get_template_directory_uri() . '/css/owl/owl.carousel.css', false, '3.3.4', null);
	wp_enqueue_style('owl-css');

	wp_register_style('owltheme-css', get_template_directory_uri() . '/css/owl/owl.theme.css', false, '3.3.4', null);
	wp_enqueue_style('owltheme-css');

	wp_register_style('owltransition-css', get_template_directory_uri() . '/css/owl/owl.transitions.css', false, '3.3.4', null);
	wp_enqueue_style('owltransition-css');

  	wp_register_style('style-css', get_stylesheet_uri(), false, null);
	wp_enqueue_style('style-css');

	wp_register_script('jquery', get_template_directory_uri ().'/js/jquery-2.1.4.min.js', __FILE__, false, '1.11.3');
	wp_enqueue_script( 'jquery' );

  	wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.8.3.min.js', false, null, true);
	wp_enqueue_script('modernizr');

  	wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', false, null, true);
	wp_enqueue_script('bootstrap-js');

	wp_register_script('isotope-js', get_template_directory_uri() . '/js/isotope/jquery.isotope.min.js', false, null, true);
	wp_enqueue_script('isotope-js');

	wp_register_script('owl-js', get_template_directory_uri() . '/js/owl/owl.carousel.js', false, null, true);
	wp_enqueue_script('owl-js');

	wp_register_script('bst-js', get_template_directory_uri() . '/js/bst.js', false, null, true);
	wp_enqueue_script('bst-js');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'bst_enqueues', 100);
