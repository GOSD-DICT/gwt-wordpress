<?php
/*
* eol-199
*/
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'gwt_wp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function gwt_wp_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on gwt_wp, use a find and replace
	 * to change 'gwt_wp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'gwt_wp', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	// add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 */
	add_theme_support( 'custom-logo', ['height'      => 240, 'width'       => 240, 'flex-height' => true] );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	// set_post_thumbnail_size( 1200, 9999 );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption'] );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	/*
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );
	*/

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// make clickable content
	apply_filters('the_content','make_clickable');

	// changes
	// add_theme_support('custom-background', $args );
	add_editor_style();

	class Off_Canvass_Menu extends Walker_Nav_Menu
	{
		function start_lvl( &$output, $depth = 0, $args = [] ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n\t\t\t\t\t". $indent . "<ul class=\"vertical menu\">\n";
		}

		function end_lvl( &$output, $depth = 0, $args = [] ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n\t\t\t\t\t". $indent . "</ul>\n";
		}

		function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? [] : (array) $item->classes;

			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . "\t\t\t\t\t" . '<li' . $id . $value . $class_names .'>';

			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
		  
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		function end_el( &$output, $item, $depth = 0, $args = [] ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$output .= $indent . "\t\t\t\t\t</li>\n";
		}

		
	}
	
	class Topbar_Nav_Menu extends Walker_Nav_Menu
	{
		function start_lvl( &$output, $depth = 0, $args = [] ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"dropdown vertical menu\">\n";
		}

		function end_lvl( &$output, $depth = 0, $args = [] ) {
			$indent = str_repeat("\t", $depth);
			$output .= "$indent</ul>\n";
		}

		function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? [] : (array) $item->classes;

			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			
			//added for mega menu
			$mega_menu_id = apply_filters( 'the_title', $item->title, $item->ID );
			$mega_menu_id = strtolower($mega_menu_id);
			$mega_menu_id = str_replace(' ', '_', $mega_menu_id);
			
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$id = strpos($class_names,'has-megamenu') ? ' id="'. $mega_menu_id .'-menu"' : $id; //added for mega menu

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
		  
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		function end_el( &$output, $item, $depth = 0, $args = [] ) {
			$output .= "</li>\n";
		}


		function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
   			 $id_field = $this->db_fields['id'];
  			 if ( !empty( $children_elements[ $element->$id_field ] ) ) {
        		$element->classes[] = 'has-dropdown';
    		}
    		Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
}
	}
}
endif; // gwt_wp_setup
add_action( 'after_setup_theme', 'gwt_wp_setup' );