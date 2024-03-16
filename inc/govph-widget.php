<?php
/**
 * gwt_wp default widgets
 *
 * @package GWT
 * @since Government Website Template 2.0
 * eol-144
 */

class govph_widget_pst extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		$widget_ops = array( 
			'classname' => 'pst_widget',
			'description' => 'A widget for Philippine Standard Time.',
		);
		parent::__construct( 'govph_widget_pst', 'Philippine Standard Time', $widget_ops );
	}


	function widget( $args, $instance ) {
		// Widget output
		echo $args['before_widget'];
		echo '<div id="pst-container">
				<div>Philippine Standard Time:</div>
				<div id="pst-time"></div>
			</div>';
		echo $args['after_widget'];
	}
}

function pst_register_widgets() {
	register_widget( 'govph_widget_pst' );
}

add_action( 'widgets_init', 'pst_register_widgets' );



class govph_widget_transparency extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		$widget_ops = array( 
			'classname' => 'transparency_widget',
			'description' => 'A widget for Transparency Seal logo.',
		);
		parent::__construct( 'govph_widget_transparency', 'Transparency Seal', $widget_ops );
	}

	function widget( $args, $instance ) {
		// Widget output
		echo $args['before_widget'];
		if ( ! empty( $instance['url'] ) ) {
			echo '<a href="'.$instance['url'].'"><img id="tp-seal" src="'. get_template_directory_uri() .'/images/transparency-seal-160x160.png" alt="transparency seal logo" title="Transparency Seal"></a>';
		}
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = array();
		$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : 'http://domain.gov.ph/transparency';

		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		$url = ! empty( $instance['url'] ) ? $instance['url'] : __( 'http://domain.gov.ph/transparency' );
		?>
<p style="text-align:center;"><img id="tp-seal"
        src="<?php echo get_template_directory_uri(); ?>/images/transparency-seal-160x160.png"
        alt="transparency seal logo" title="Transparency Seal" /></p>
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"><?php _e( esc_attr( 'URL:' ) ); ?></label>
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"
        name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" type="text"
        value="<?php echo esc_attr( $url ); ?>">
    <span class="description"><em>insert the url of transparency page</em></span>
</p>
<?php 
	}
}

function transparency_register_widgets() {
	register_widget( 'govph_widget_transparency' );
}

add_action( 'widgets_init', 'transparency_register_widgets' );



class govph_widget_foi extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		$widget_ops = array( 
			'classname' => 'foi_widget',
			'description' => 'A widget for Freedom of Information logo.',
		);
		parent::__construct( 'govph_widget_foi', 'Freedom of Information', $widget_ops );
	}

	function widget( $args, $instance ) {
		// Widget output
		echo $args['before_widget'];
		if ( ! empty( $instance['url'] ) ) {
			echo '<a href="'.$instance['url'].'"><img id="foi-logo" src="'. get_template_directory_uri() .'/images/foi-logo-160x160.png" alt="freedom of information logo" title="Freedom of Informstion"></a>';
		}
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = array();
		$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : 'https://www.foi.gov.ph/';

		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		$url = ! empty( $instance['url'] ) ? $instance['url'] : __( 'https://www.foi.gov.ph/' );
		?>
<p style="text-align:center;"><img id="foi-logo"
        src="<?php echo get_template_directory_uri(); ?>/images/foi-logo-160x160.png" alt="freedom of information logo"
        title="Freedom of Information" /></p>
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"><?php _e( esc_attr( 'URL:' ) ); ?></label>
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"
        name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" type="text"
        value="<?php echo esc_attr( $url ); ?>">
    <span class="description"><em>insert the url of freedom of information page</em></span>
</p>
<?php 
	}
}

function foi_register_widgets() {
	register_widget( 'govph_widget_foi' );
}
add_action( 'widgets_init', 'foi_register_widgets' );