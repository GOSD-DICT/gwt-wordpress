<?php
define('CPT_NAME', "Slider Images");
define('CPT_SINGLE', "Slider Image");
define('CPT_TYPE', "slider-image");
define('CPT_THUMB_SIZE', 500);

add_theme_support('post-thumbnails', ['slider-image']);  
  
function efs_register() {  
    $args = [
        'label' => __(CPT_NAME),
        'singular_label' => __(CPT_SINGLE),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'public' => false,
        // it's not public, it shouldn't have it's own permalink, and so on
        'publicly_queryable' => true,
        // you should be able to query it
        'show_ui' => true,
        // you should be able to edit it in wp-admin
        'exclude_from_search' => true,
        // you should exclude it from search results
        'show_in_nav_menus' => false,
        // you shouldn't be able to add it to menus
        'has_archive' => false,
        // it shouldn't have archive page
        'rewrite' => false,
    ];  
  
    register_post_type(CPT_TYPE , $args );  
    set_post_thumbnail_size(CPT_THUMB_SIZE);
}

add_action('init', 'efs_register');

function efs_disable_editor() {
    remove_post_type_support( CPT_TYPE, 'editor' );
}
add_action('init', 'efs_disable_editor');

/**
 * Add meta box
 * eol-118
 * @param post $post The post object
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function slider_link_add_meta_boxes( $post ){
  add_meta_box( 'slider_link_meta_box', __( 'Slider Link', 'efs_slider' ), 'slider_link_build_meta_box', CPT_TYPE, 'normal', 'low' );
}
add_action( 'add_meta_boxes_slider-image', 'slider_link_add_meta_boxes' );

/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function slider_link_build_meta_box( $post ){
  // make sure the form request comes from WordPress
  wp_nonce_field( basename( __FILE__ ), 'slider_link_meta_box_nonce' );

  // retrieve the _slider_link current value
  $slider_link = get_post_meta( $post->ID, '_slider_link', true );
  ?>
  <div class='inside'>
    <div>
      <input type="text" name="slider_link" value="<?php echo $slider_link; ?>" style="width: 100%;" />
      <p>Enter the URL Linked to the slider image if any.<br/>To link internal path copy the permalink without the base URL. e.g. <strong>/2017/10/03/article-link</strong><br/> To link to external path add http:// or https:// at the beginning of the URL. e.g. <strong>http://example.com</strong></p>
    </div>

  </div>
  <?php
}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function slider_link_save_meta_box_data( $post_id ){
  // verify meta box nonce
  if ( !isset( $_POST['slider_link_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['slider_link_meta_box_nonce'], basename( __FILE__ ) ) ){
    return;
  }
  // return if autosave
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
    return;
  }
  // Check the user's permissions.
  if ( ! current_user_can( 'edit_post', $post_id ) ){
    return;
  }

  if ( isset( $_REQUEST['slider_link'] ) ) {
    update_post_meta( $post_id, '_slider_link', sanitize_text_field( $_POST['slider_link'] ) );
  }
}
add_action( 'save_post_slider-image', 'slider_link_save_meta_box_data' );

function slider_link_get_meta_box_data($post_id){
    // @todo: format the url into proper url
    $slider_link = get_post_meta($post_id, '_slider_link', true);
    if($slider_link == ''){
        return '#';
    }

    if(str_starts_with($slider_link, 'http://') || str_starts_with($slider_link, 'https://')){
        return $slider_link;
    }
    if(!str_starts_with($slider_link, '/')){
        $slider_link = '/'.$slider_link;
    }
    return get_site_url().$slider_link;
}