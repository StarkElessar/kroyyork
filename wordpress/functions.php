<?php

function byte_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-background',
		apply_filters(
			'helper_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'custom-logo',
		array(
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'byte_setup' );

add_action( 'wp_enqueue_scripts', 'add_my_scripts' );    // Фронт
function add_my_scripts(){
    wp_enqueue_style( 'main', get_stylesheet_uri() );
    wp_enqueue_style( 'style.min', get_template_directory_uri() . '/css/style.min.css');
    wp_deregister_style ('admin-bar-css');
    wp_deregister_style ('wp-block-library');
    wp_deregister_style ('global-styles-inline');
    wp_deregister_script( 'jquery' );
	wp_deregister_script( 'jquery-migrate');
	wp_enqueue_script( 'main-min', get_stylesheet_directory_uri() . '/js/app.min.js', array(), false, true);
}
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );

if( function_exists('acf_add_options_page') ) {
    acf_add_options_sub_page(array(
        'page_title'    => 'Базовые настройки',
        'menu_title'    => 'Basic Setup',
    ));
		acf_add_options_sub_page(array(
			'page_title'    => 'Скрипты в header и footer',
			'menu_title'    => 'Header&Footer custom code',
	));
}

add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}



function cptui_register_my_cpts() {

	/**
	 * Post Type: Отзывы.
	 */

	$labels = [
		"name" => esc_html__( "Отзывы", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Отзыв", "custom-post-type-ui" ),
		"menu_name" => esc_html__( "Мои Отзывы", "custom-post-type-ui" ),
		"all_items" => esc_html__( "Все Отзывы", "custom-post-type-ui" ),
		"add_new" => esc_html__( "Добавить новый", "custom-post-type-ui" ),
		"add_new_item" => esc_html__( "Добавить новый Отзыв", "custom-post-type-ui" ),
		"edit_item" => esc_html__( "Редактировать Отзыв", "custom-post-type-ui" ),
		"new_item" => esc_html__( "Новый Отзыв", "custom-post-type-ui" ),
		"view_item" => esc_html__( "Смотреть Отзыв", "custom-post-type-ui" ),
		"view_items" => esc_html__( "Смотреть Отзывы", "custom-post-type-ui" ),
		"search_items" => esc_html__( "Искать Отзывы", "custom-post-type-ui" ),
		"not_found" => esc_html__( "не найдено", "custom-post-type-ui" ),
		"not_found_in_trash" => esc_html__( "не найдено в корзине", "custom-post-type-ui" ),
		"parent" => esc_html__( "родительский Отзыв:", "custom-post-type-ui" ),
		"featured_image" => esc_html__( "Изображение Отзыв", "custom-post-type-ui" ),
		"set_featured_image" => esc_html__( "Установить главное изображение Отзыв", "custom-post-type-ui" ),
		"remove_featured_image" => esc_html__( "Удалить главное изображение Отзыв", "custom-post-type-ui" ),
		"use_featured_image" => esc_html__( "Использовать главное изображение Отзыв", "custom-post-type-ui" ),
		"archives" => esc_html__( "Отзыв архив", "custom-post-type-ui" ),
		"insert_into_item" => esc_html__( "Insert into Отзыв", "custom-post-type-ui" ),
		"uploaded_to_this_item" => esc_html__( "Загрузить Отзыв", "custom-post-type-ui" ),
		"filter_items_list" => esc_html__( "Filter Отзывы list", "custom-post-type-ui" ),
		"items_list_navigation" => esc_html__( "Отзывы list navigation", "custom-post-type-ui" ),
		"items_list" => esc_html__( "Отзывы list", "custom-post-type-ui" ),
		"attributes" => esc_html__( "Отзывы attributes", "custom-post-type-ui" ),
		"name_admin_bar" => esc_html__( "Отзыв", "custom-post-type-ui" ),
		"item_published" => esc_html__( "Отзыв опубликован", "custom-post-type-ui" ),
		"item_published_privately" => esc_html__( "Отзыв published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => esc_html__( "Отзыв reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => esc_html__( "Отзыв scheduled", "custom-post-type-ui" ),
		"item_updated" => esc_html__( "Отзыв обновлен.", "custom-post-type-ui" ),
		"parent_item_colon" => esc_html__( "родительский Отзыв:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "Отзывы", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "testimonial", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-testimonial",
		"supports" => [ "title", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "testimonial", $args );

	/**
	 * Post Type: Коллекции.
	 */

	$labels = [
		"name" => esc_html__( "Коллекции", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Коллекция", "custom-post-type-ui" ),
		"menu_name" => esc_html__( "Мои Коллекции", "custom-post-type-ui" ),
		"all_items" => esc_html__( "Все Коллекции", "custom-post-type-ui" ),
		"add_new" => esc_html__( "Добавить новую", "custom-post-type-ui" ),
		"add_new_item" => esc_html__( "Добавить новую Коллекцию", "custom-post-type-ui" ),
		"edit_item" => esc_html__( "Редактировать Коллекцию", "custom-post-type-ui" ),
		"new_item" => esc_html__( "Новая Коллекция", "custom-post-type-ui" ),
		"view_item" => esc_html__( "Смотреть Коллекция", "custom-post-type-ui" ),
		"view_items" => esc_html__( "Смотреть Коллекции", "custom-post-type-ui" ),
		"search_items" => esc_html__( "Искать Коллекции", "custom-post-type-ui" ),
		"not_found" => esc_html__( "No Коллекции found", "custom-post-type-ui" ),
		"not_found_in_trash" => esc_html__( "No Коллекции found in trash", "custom-post-type-ui" ),
		"parent" => esc_html__( "Parent Коллекция:", "custom-post-type-ui" ),
		"featured_image" => esc_html__( "Featured image for this Коллекция", "custom-post-type-ui" ),
		"set_featured_image" => esc_html__( "Set featured image for this Коллекция", "custom-post-type-ui" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Коллекция", "custom-post-type-ui" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Коллекция", "custom-post-type-ui" ),
		"archives" => esc_html__( "Коллекция archives", "custom-post-type-ui" ),
		"insert_into_item" => esc_html__( "Insert into Коллекция", "custom-post-type-ui" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this Коллекция", "custom-post-type-ui" ),
		"filter_items_list" => esc_html__( "Filter Коллекции list", "custom-post-type-ui" ),
		"items_list_navigation" => esc_html__( "Коллекции list navigation", "custom-post-type-ui" ),
		"items_list" => esc_html__( "Коллекции list", "custom-post-type-ui" ),
		"attributes" => esc_html__( "Коллекции attributes", "custom-post-type-ui" ),
		"name_admin_bar" => esc_html__( "Коллекция", "custom-post-type-ui" ),
		"item_published" => esc_html__( "Коллекция Опубликована", "custom-post-type-ui" ),
		"item_published_privately" => esc_html__( "Коллекция published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => esc_html__( "Коллекция reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => esc_html__( "Коллекция scheduled", "custom-post-type-ui" ),
		"item_updated" => esc_html__( "Коллекция Обновлена", "custom-post-type-ui" ),
		"parent_item_colon" => esc_html__( "Parent Коллекция:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "Коллекции", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "collections", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "collections", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
