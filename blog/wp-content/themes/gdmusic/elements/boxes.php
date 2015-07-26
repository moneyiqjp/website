<?php
/**
 * Title: Boxes Element
 *
 * Description: Defines custom post type boxes. Defines markup for element "Boxes".
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category Cyber Chimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

function cyberchimps_init_boxes_post_type() {

	// Register the custom post type "boxes"
	register_post_type( 'boxes',
		array(
			'labels' => array(
				'name'			=> __('Boxes', 'cyberchimps'),
				'singular_name'	=> __('Boxes', 'cyberchimps'),
			),
			'public'		=> true,
			'show_ui'		=> true, 
			'supports'		=> array('title'),
			'taxonomies'	=> array( 'boxes_categories'),
			'has_archive'	=> true,
			'menu_icon'		=> get_template_directory_uri() . '/cyberchimps/lib/images/custom-types/boxes.png',
			'rewrite'		=> array('slug' => 'boxes')
		)
	);
	
	// Define lebels to be supplied while registering custom category
	$labels = array(
		'name'				=> _x( 'Boxes Categories', 'taxonomy general name', 'cyberchimps' ),
		'singular_name'		=> _x( 'Boxes Catergory', 'taxonomy singular name', 'cyberchimps' ),
		'search_items'		=> __( 'Search Boxes', 'cyberchimps' ),
		'all_items'			=> __( 'All Boxes', 'cyberchimps' ),
		'parent_item'		=> __( 'Boxes Category', 'cyberchimps' ),
		'parent_item_colon'	=> __( 'Boxes Category:', 'cyberchimps' ),
		'edit_item'			=> __( 'Edit Boxes Category', 'cyberchimps' ), 
		'update_item'		=> __( 'Update Boxes Category', 'cyberchimps' ),
		'add_new_item'		=> __( 'Add New Boxes Category', 'cyberchimps' ),
		'new_item_name'		=> __( 'New Boxes Category Name', 'cyberchimps' ),
		'menu_name'			=> __( 'Boxes Category', 'cyberchimps' )
	);
			
	// Register category for "boxes" posts
	register_taxonomy( 'boxes_categories',array('boxes'), array(
		'public'			=> true,
		'show_in_nav_menus'	=> false,
		'hierarchical'		=> true,
		'labels'			=> $labels,
		'show_ui'			=> true
	));
			
	$meta_boxes = array();
	
	$mb = new Chimps_Metabox('boxes', __( 'Boxes Element', 'cyberchimps' ), array('pages' => array('boxes')));
	$mb
		->tab( __( 'Boxes Element', 'cyberchimps' ) )
			->single_image('cyberchimps_box_image', __( 'Box Image', 'cyberchimps' ), '')
			->text('cyberchimps_box_url', __( 'Box URL', 'cyberchimps' ), '')
			->textarea('cyberchimps_box_text', __( 'Box Text', 'cyberchimps' ), '')
		->end();
		
	foreach ($meta_boxes as $meta_box) {
		$my_box = new RW_Meta_Box_Taxonomy($meta_box);
	}
}
add_action( 'init', 'cyberchimps_init_boxes_post_type' );

add_action( 'boxes', 'cyberchimps_boxes_render_display' );

// Define content for boxes
function cyberchimps_boxes_render_display() {
	
	// Intialize box counter
	$box_counter = 1;
	
	// Set template directory uri
	$template_directory = get_template_directory_uri();
	
	// Get selected custom category for box element
	if ( is_page() ) {
		$customcategory = get_post_meta( get_the_ID(), 'boxes_category' , true );
	}
	else {
		$customcategory = cyberchimps_get_option( 'boxes_category', '' );
	}
	
	// Custom box query
	$args = array(
					'numberposts'		=> 3,
					'offset'			=> 0,
					'boxes_categories'	=> $customcategory,
					'orderby'			=> 'post_date',
					'order'				=> 'ASC',
					'post_type'			=> 'boxes',
					'post_status'		=> 'publish'
				);
	$boxes = get_posts( $args );
?>
	<div id="boxes-container" class="row-fluid">
		<div class="boxes">
		<?php
	if( $boxes && $customcategory != '' ):	
		foreach( $boxes as $box ):
				
				// Break after desired number of boxes displayed
				if( $box_counter > 3 )
					break;
				
				// Get the image of the box
				$box_image = get_post_meta( $box->ID, 'cyberchimps_box_image', true );
				
				// Get the URL of the box
				$box_url = get_post_meta( $box->ID, 'cyberchimps_box_url', true );
				// Get the text of the box
				$box_text = get_post_meta( $box->ID, 'cyberchimps_box_text', true );
		?>	
				<div id="box<?php echo $box_counter?>" class="box span4">
        <?php if( $box_url != '' ): ?>
					<a href="<?php echo $box_url; ?>" class="box-link">
						<img class="box-image" src="<?php echo $box_image; ?>" />
          </a>
        <?php else: ?>
        	<a class="box-no-url">
						<img class="box-image" src="<?php echo $box_image; ?>" />
          </a>
        <?php endif; ?>
					<h2 class="box-widget-title"><?php echo $box->post_title; ?></h2>
					<p><?php echo $box_text; ?></p>
				</div><!--end box1-->
		<?php   
			$box_counter++;
			endforeach;
			else: ?>
				<div class="box span4">
					<a href="http://cyberchimps.com" class="box-link">
						<img class="box-image" src="<?php echo $template_directory; ?><?php echo apply_filters( 'cyberchimps_box1_image', '/elements/lib/images/boxes/slidericon.png' ); ?>" alt="CyberChimps Slider" />
          </a>
					<h2 class="box-widget-title"><?php _e( 'Professional Slider', 'cyberchimps' ); ?></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut suscipit, augue at rhoncus viverra, velit.</p>
				</div><!--end box1-->
        
        <div class="box span4">
					<a href="http://cyberchimps.com" class="box-link">
						<img class="box-image" src="<?php echo $template_directory; ?><?php echo apply_filters( 'cyberchimps_box2_image', '/elements/lib/images/boxes/blueprint.png' ); ?>" alt="CyberChimps Blueprint" />
          </a>
					<h2 class="box-widget-title"><?php _e( 'Responsive Design', 'cyberchimps' ); ?></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut suscipit, augue at rhoncus viverra, velit.</p>
				</div><!--end box3-->
        
        <div class="box span4">
					<a href="http://cyberchimps.com" class="box-link">
						<img class="box-image" src="<?php echo $template_directory; ?><?php echo apply_filters( 'cyberchimps_box3_image', '/elements/lib/images/boxes/docs.png' ); ?>" alt="CyberChimps Help" />
          </a>
					<h2 class="box-widget-title"><?php _e( 'Excellent Support', 'cyberchimps' ); ?></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut suscipit, augue at rhoncus viverra, velit.</p>
				</div><!--end box4-->
			
		<?php	endif;
		?>
		</div><!-- end boxes -->
	</div><!-- end row-fluid -->
<?php	
} 
?>