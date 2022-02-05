<?php

//changing default login icon wordpress
function change_login_logo()
{
    echo "
    <style>
    body.login #login h1 a {
    background: url('https://grupopilarengenharia.com.br/wp-content/uploads/2022/02/PAPELARIA-PILAR-CC-1024x382-1.png') no-repeat scroll center top transparent;
    height: 90px;
    width: 250px;
    }
    </style>
    ";
}

add_action("login_head", "change_login_logo");


//specific query using a custom id created in the elementor plugin
function my_query_by_post_meta( $query ) {
	
	$current_user = wp_get_current_user();
 
	$meta_query = $query->get( 'meta_query' );

	if ( ! $meta_query ) {
		$meta_query = [];
	}

	$meta_query[] = [
		'key' => 'email',
		'value' => $current_user->user_email,
		'compare' => 'in',
	];

	$query->set( 'meta_query', $meta_query );

}
add_action( 'elementor/query/project_list', 'my_query_by_post_meta' );

//function to show admin bar only administrator users
function remove_admin_bar(){
	if (!current_user_can('administrator') && !is_admin()) {
  		show_admin_bar(false);
	}
}

add_action('after_setup_theme', 'remove_admin_bar');

