<?php

function bst_widgets_init() {

  /*
  Sidebar (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Sidebar', 'bst' ),
    'id'              => 'sidebar-widget-area',
    'description'     => __( 'The sidebar widget area', 'bst' ),
    'before_widget'   => '<section class="%1$s %2$s">',
    'after_widget'    => '</section>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

  /*
  Footer (three widget areas)
   */
  register_sidebar( array(
    'name'            => __( 'Footer', 'bst' ),
    'id'              => 'footer-widget-area',
    'description'     => __( 'The footer widget area', 'bst' ),
    'before_widget'   => '<div class="%1$s %2$s">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

  /*
  Avant footer
   */

  register_sidebar( array(
    'name'            => __( 'Avant footer 1', 'bst' ),
    'id'              => 'prefooter-1',
    'description'     => __( 'The prefooter widget area', 'bst' ),
    'before_widget'   => '<div class="%1$s %2$s">',
    'after_widget'    => '</div>',
    'before_title'    => '<h5>',
    'after_title'     => '</h5>',
  ) );

  register_sidebar( array(
    'name'            => __( 'Avant footer 2', 'bst' ),
    'id'              => 'prefooter-2',
    'description'     => __( 'The prefooter widget area', 'bst' ),
    'before_widget'   => '<div class="%1$s %2$s">',
    'after_widget'    => '</div>',
    'before_title'    => '<h5>',
    'after_title'     => '</h5>',
  ) );

  register_sidebar( array(
    'name'            => __( 'Avant footer 3', 'bst' ),
    'id'              => 'prefooter-3',
    'description'     => __( 'The prefooter widget area', 'bst' ),
    'before_widget'   => '<div class="%1$s %2$s">',
    'after_widget'    => '</div>',
    'before_title'    => '<h5>',
    'after_title'     => '</h5>',
  ) );

  register_sidebar( array(
    'name'            => __( 'Avant footer 4', 'bst' ),
    'id'              => 'prefooter-4',
    'description'     => __( 'The prefooter widget area', 'bst' ),
    'before_widget'   => '<div class="%1$s %2$s">',
    'after_widget'    => '</div>',
    'before_title'    => '<h5>',
    'after_title'     => '</h5>',
  ) );

  /*
  Derniers articles (three widget areas)
   */
  register_sidebar( array(
    'name'            => __( 'Derniers Articles', 'bst' ),
    'id'              => 'derniersarticles-widget-area',
    'description'     => __( 'les derniers projets widget area', 'bst' ),
    'before_widget'   => '<div>',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

}
add_action( 'widgets_init', 'bst_widgets_init' );
