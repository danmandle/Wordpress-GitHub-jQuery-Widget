<?php

/*
Plugin Name: GitHub Widget
Plugin URI: http://www.danmandle.com/blog/github-widget-for-wordpress/
Version: 1.0
Author: Dan Mandle
Description: Has a shortcode for dropping a GitHub widget

*/

add_action( 'wp_enqueue_scripts', 'add_github_widget_script' );

function add_github_widget_script() {
	wp_register_script( 'github-widget-js', plugins_url( '/jquery.githubRepoWidget.min.js' , __FILE__ ), array(), '1.0.0', true );
}

// [github_widget repo="danmandle/Wordpress-GitHub-jQuery-Widget"]
function github_widget_func( $atts ) {
	extract( shortcode_atts( array(
		'repo' => 'danmandle/Wordpress-GitHub-jQuery-Widget'
	), $atts ) );

	wp_enqueue_script( 'github-widget-js' );

	return '<div class="github-widget" data-repo="'.$repo.'"></div>';

}
add_shortcode( 'github_widget', 'github_widget_func' );

