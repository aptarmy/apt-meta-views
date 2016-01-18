<?php
/*
Plugin Name: APT Post View
Description: Display post-views.
Author: Mr.Pakpoom Tiwakornkit
Version: 1.0
*/
function apt_meta_views_increase() {
	if (is_single()) {

		global $post;
		//Set the name of the Posts Custom Field.
		$count_key = 'apt_meta_views'; 

		//Returns values of the custom field with the specified key from the specified post.
		$count = get_post_meta($post->ID, $count_key, true);

		//If the the Post Custom Field value is empty. 
		if($count == ''){
			$count = 1; // set the counter to one.

			//Delete all custom fields with the specified key from the specified post. 
			delete_post_meta($post->ID, $count_key);

			//Add a custom (meta) field (Name/value)to the specified post.
			add_post_meta($post->ID, $count_key, $count);

		//If the the Post Custom Field value is NOT empty.
		}else{
			$count++; //increment the counter by 1.
			//Update the value of an existing meta key (custom field) for the specified post.
			update_post_meta($post->ID, $count_key, $count);
		}
		//delete_post_meta_by_key($count_key);
	}
}
add_action('wp_head', 'apt_meta_views_increase');


if (!function_exists('apt_meta_views_get')) {
	/**
	 * display post view count using post metadata.
	 * @output simple text indecating the views.
	 */
	function apt_meta_views_get() {
		$meta_value = get_post_meta(get_the_ID(), 'apt_meta_views', true );
		if( !empty( $meta_value ) ) {
			echo $meta_value;
		} else {
			echo "0";
		}
	}
}