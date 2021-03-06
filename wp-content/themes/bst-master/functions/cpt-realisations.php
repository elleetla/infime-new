<?php
/*
Plugin name: Mon premier CPT dans WordPress
Description: this plugin allows me to add a customed type of content, for example, here, "Recettes" in WordPress
Version: 1.0
*/
/*  Copyright 2014 Julien Maury  (email : contact@tweetpress.fr)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/*
 Sources:
 	- http://codex.wordpress.org/Function_Reference/register_post_type
	- http://codex.wordpress.org/Function_Reference/register_taxonomy
*/
add_action( 'init', '_mp_cpt_create_post_type' );
function _mp_cpt_create_post_type() {
    $labels = array(
        'name'               => _x( 'Porto', 'post type general name', 'mp-cpt' ),
        'singular_name'      => _x( 'Recette', 'post type singular name', 'mp-cpt' ),
        'menu_name'          => _x( 'Recettes', 'admin menu', 'mp-cpt' ),
        'name_admin_bar'     => _x( 'Recette', 'add new on admin bar', 'mp-cpt' ),
        'add_new'            => _x( 'Ajouter nouvelle', 'recette', 'mp-cpt' ),
        'add_new_item'       => __( 'Ajouter une nouvelle', 'mp-cpt' ),
        'new_item'           => __( 'Nouvelle recette', 'mp-cpt' ),
        'edit_item'          => __( 'Edit recette', 'mp-cpt' ),
        'view_item'          => __( 'Voir la recette', 'mp-cpt' ),
        'all_items'          => __( 'Toutes les recettes', 'mp-cpt' ),
        'search_items'       => __( 'Rechercher dans les recettes', 'mp-cpt' ),
        'not_found'          => __( 'Aucune recette pour le moment.', 'mp-cpt' ),
        'not_found_in_trash' => __( 'Aucune recette dans la corbeille.', 'mp-cpt' )
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,// http://monsite.com/?recettes=slug_1er_recette
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'recettes','with_front' => false ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon'			 => 'dashicons-welcome-widgets-menus'//http://melchoyce.github.io/dashicons/
    );
    register_post_type( 'recettes', $args);
}
add_action('init', '_mp_cpt_create_taxonomy');
function _mp_cpt_create_taxonomy(){
    $labels = array(
        'name'              => _x( 'Origines', 'taxonomy general name', 'mp-cpt'  ),
        'singular_name'     => _x( 'Origine', 'taxonomy singular name', 'mp-cpt'  ),
        'search_items'      => __( 'Rechercher des Origines', 'mp-cpt'  ),
        'all_items'         => __( 'Toutes les origines', 'mp-cpt'  ),
        'parent_item'       => __( 'Origine parente', 'mp-cpt'  ),
        'parent_item_colon' => __( 'Origine parente:', 'mp-cpt'  ),
        'edit_item'         => __( 'Modifier l\'origine', 'mp-cpt'  ),
        'update_item'       => __( 'Mettre à jour l\'origine', 'mp-cpt'  ),
        'add_new_item'      => __( 'Ajouter une nouvelle origine', 'mp-cpt'  ),
        'new_item_name'     => __( 'Nouvelle origine', 'mp-cpt'  ),
        'menu_name'         => __( 'Origines', 'mp-cpt'  ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'origine','with_front' => false ),
    );
    register_taxonomy( 'origine', array( 'recettes' ), $args );
}
/*
Sources :
	- http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
	- http://codex.wordpress.org/Plugin_API/Action_Reference/manage_$post_type_posts_custom_column
*/
add_filter( 'manage_edit-recettes_columns', '_mp_cpt_set_custom_edit_recipes_columns' );
function _mp_cpt_set_custom_edit_recipes_columns($columns) {
    $columns['recettes_thumbs'] = __('Illustrations','mp-cpt');
    return $columns;
}

add_action( 'manage_recettes_posts_custom_column' , '_mp_cpt_custom_recipes_column', 10, 2 );
function _mp_cpt_custom_recipes_column( $column, $post_id ) {
    if ( $column == 'recettes_thumbs' )
        echo the_post_thumbnail(array(200,100));
}