<?php
/*
Plugin name: CPT equipe
Description:
Author: Julien Grelet
Version: 1.0
*/

/*  Copyright 2014 Julien Maury  (email : contact@juliengrelet.com)

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

add_action( 'init', '_equipe_cpt_create_post_type' );
function _equipe_cpt_create_post_type() {


		$labels = array(
		'name'               => _x( 'Equipes', 'post type general name', 'equipe-cpt' ),
		'singular_name'      => _x( 'Equipe', 'post type singular name', 'equipe-cpt' ),
		'menu_name'          => _x( 'Equipes', 'admin menu', 'equipe-cpt' ),
		'name_admin_bar'     => _x( 'Equipe', 'add new on admin bar', 'equipe-cpt' ),
		'add_new'            => _x( 'Ajouter nouvelle', 'equipe', 'equipe-cpt' ),
		'add_new_item'       => __( 'Ajouter une nouvelle', 'equipe-cpt' ),
		'new_item'           => __( 'Nouvelle equipe', 'equipe-cpt' ),
		'edit_item'          => __( 'Edit equipe', 'equipe-cpt' ),
		'view_item'          => __( 'Voir la equipe', 'equipe-cpt' ),
		'all_items'          => __( 'Toutes les Equipes', 'equipe-cpt' ),
		'search_items'       => __( 'Rechercher dans les Equipes', 'equipe-cpt' ),
		'not_found'          => __( 'Aucune equipe pour le moment.', 'equipe-cpt' ),
		'not_found_in_trash' => __( 'Aucune equipe dans la corbeille.', 'equipe-cpt' )
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,// http://monsite.com/?equipes=slug_1er_equipe
			'show_ui'            => true,
			'show_in_menu'       => true, 
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'equipes','with_front' => false ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon'			 => 'dashicons-welcome-widgets-menus'//http://melchoyce.github.io/dashicons/
		);

	register_post_type( 'equipes', $args);


}

add_action('init', '_equipe_cpt_create_taxonomy');
function _equipe_cpt_create_taxonomy(){

		$labels = array(
		'name'              => _x( 'Categoies', 'taxonomy general name', 'equipe-cpt'  ),
		'singular_name'     => _x( 'Categoie', 'taxonomy singular name', 'equipe-cpt'  ),
		'search_items'      => __( 'Rechercher des Categories', 'equipe-cpt'  ),
		'all_items'         => __( 'Toutes les Categories', 'equipe-cpt'  ),
		'parent_item'       => __( 'Categories parente', 'equipe-cpt'  ),
		'parent_item_colon' => __( 'Categories parente:', 'equipe-cpt'  ),
		'edit_item'         => __( 'Modifier l\'Categories', 'equipe-cpt'  ),
		'update_item'       => __( 'Mettre à jour l\'Categories', 'equipe-cpt'  ),
		'add_new_item'      => __( 'Ajouter une nouvelle Categories', 'equipe-cpt'  ),
		'new_item_name'     => __( 'Nouvelle Categories', 'equipe-cpt'  ),
		'menu_name'         => __( 'Categories', 'equipe-cpt'  ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'categoie','with_front' => false ),
	);

	register_taxonomy( 'categoie', array( 'equipes' ), $args );

}

/*
Sources :
	- http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
	- http://codex.wordpress.org/Plugin_API/Action_Reference/manage_$post_type_posts_custom_column
*/

add_filter( 'manage_edit-equipes_columns', '_equipe_cpt_set_custom_edit_recipes_columns' );
add_action( 'manage_equipes_posts_custom_column' , '_equipe_cpt_custom_recipes_column', 20, 2 );

function _equipe_cpt_set_custom_edit_recipes_columns($columns) {

	$columns['equipes_thumbs'] = __('Illustrations','equipe-cpt');

    return $columns;
}

function _equipe_cpt_custom_recipes_column( $column, $post_id ) {


	if ( $column == 'equipes_thumbs' )
		echo the_post_thumbnail(array(200,100));

}