<?php

class IMimi_Walker extends Walker_Nav_Menu {
  // Our Code

	function start_lvl(&$output, $depth=0, $args=array()) {
	      $indent = str_repeat("\t", $depth);
	      //$output .= "\n$indent<ul class=\"sub-menu\">\n";

	      // Change sub-menu to dropdown menu
	      $output .= "\n$indent<ul class=\"dropdown-menu dropdown-mimi-submenu\" id=\"checkin-submenu\">\n";
	  }

	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		
		global $wp_query, $wpdb;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		
		if ($depth == 0) {
			$class_names = ' class= "nav-item border-item ' . esc_attr( $class_names ) . '"';
		}
		if ($depth == 1) {
			$class_names = ' class= "nav-item ' . esc_attr( $class_names ) . '"';	
		}

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$has_children = $wpdb->get_var("SELECT COUNT(meta_id)
				    FROM wp_postmeta
				    WHERE meta_key='_menu_item_menu_item_parent'
				    AND meta_value='".$item->ID."'");

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';


		// ATTENZIONE IMPOSTARE L'ID DEL MENU DELLE LINGUE 

		$current_element_markers = array( 'pll-parent-menu-item');
    	$current_class = array_intersect( $current_element_markers, $item->classes );

		if ( ($depth == 0 && $has_children > 0) ||  (!empty($current_class) && ($item->ID == 20 || $item->ID == 23))) {
			// These lines adds your custom class and attribute
			$attributes .= ' class="dropdown-toggle vertical-centers psc-nav-items nav-link text-right"';
			$attributes .= ' data-toggle="dropdown"';
			$attributes .= ' role="button"';
			$attributes .= ' aria-haspopup="true"';
			$attributes .= ' aria-expanded="true"';
		}
		// Added after:
		$attributes .= ' class="text-right nav-link psc-nav-items"';
		///
		$item_output = $args->before;
		$item_output .= '<a'. $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

		// Add the caret if menu level is 0
		/*if ( $depth == 0 && $has_children > 0  ) {
			$item_output .= ' <b class="caret"></b>';
		}*/

		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    
  	}
}


function mimiedesign_register_theme_menu() {
    register_nav_menu( 'primary', 'Main Navigation Menu' );
}

add_action('init', function() {
	mimiedesign_register_theme_menu();	
});

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "/path/to/default.png";
  }
  return $first_img;
}

add_filter('the_content', 'wpse_get_content_without_images');

function wpse_get_content_without_images() {
    $content = get_the_content();
    $content = preg_replace( '/<img[^>]+./', '', $content );
    echo $content;
}

function your_prefix_after_setup_theme() {
	if ( function_exists( 'pll_register_string' ) ) {
		pll_register_string('booking checkin str', 'booking_checkin_str','PodereSanCristoforo',false);
		pll_register_string('booking checkout str', 'booking_checkout_str','PodereSanCristoforo',false);
		pll_register_string('customer_contact str', 'customerContact_str','PodereSanCristoforo',false);
	  	pll_register_string('arrival_date str', 'arrivalDate_str','PodereSanCristoforo',false);
		pll_register_string('leaving_date str', 'leavingDate_str','PodereSanCristoforo',false);
		pll_register_string('num_nights str', 'numNights_str','PodereSanCristoforo',false);
		pll_register_string('total_cost str', 'totalCost_str','PodereSanCristoforo',false);
		pll_register_string('visit_date str', 'visitDate_str','PodereSanCristoforo',false);
		pll_register_string('registration str', 'registration_str','PodereSanCristoforo',false);
		pll_register_string('your_data str', 'yourData_str','PodereSanCristoforo',false);
		pll_register_string('send_request str', 'sendRequest_str','PodereSanCristoforo',false);
		pll_register_string('ask_contact str', 'askContact_str','PodereSanCristoforo',false);
		pll_register_string('notes str', 'notes_str','PodereSanCristoforo',false);
		pll_register_string('question_notes str', 'questionNotes_str','PodereSanCristoforo',false);
		
	}
}
add_action( 'after_setup_theme', 'your_prefix_after_setup_theme' );


function send_my_awesome_form(){

        //if (!isset($_POST['submit'])) { return; }

    // get the info from the from the form
    $form = array();
    $form['mi_name'] = $_POST['mi_name'];
    $form['mi_email'] = $_POST['mi_email'];
    //$form['mi_subject'] = $_POST['mi_subject'];
    $form['mi_nationality'] = $_POST['mi_nationality'];
    $form['mi_num_people'] = $_POST['mi_num_people'];
    $form['mi_addtional_notes'] = $_POST['mi_additional_notes'];

    $form['mi_checkin'] = $_POST['mi_checkin'];
    $form['mi_checkout'] = $_POST['mi_checkout'];

    // Build the message
    $message  = "Name : " . $form['mi_name'] ."\n";
    //$message .= "Subject :" . $form['mi_subject']  ."\n";
    $message .= "Email : " . $form['mi_email']     ."\n";
    
    $message .= "Nationality : " . $form['mi_nationality']     ."\n";
    $message .= "Number of persons : " . $form['mi_num_people']     ."\n"; 
    $message .= "Checkin : " . $form['mi_checkin']     ."\n";
    $message .= "Checkout : " . $form['mi_checkout']     ."\n\n";

    $message .= "Message : " . "\n" . $form['mi_addtional_notes'];

    //set the form headers
    $headers = 'From: Podere San Cristoforo - Booking Rooms Request';

    // The email subject
    $subject = 'Mail prenotazione camere';

    // Who are we going to send this form too
    $send_to = ['ivanbernabucci@gmail.com'];

    if (wp_mail( $send_to, $subject, $message) ) {
         $_POST = array();
         //wp_redirect('http://www.homelakegarda.com'); exit;
     }

	die();



}

function send_my_collect_mail_form(){

        //if (!isset($_POST['submit'])) { return; }

    // get the info from the from the form
    $form = array();
    $form['mi_email'] = $_POST['mi_email'];
    
    //$message .= "Subject :" . $form['mi_subject']  ."\n";
    $message .= "Email : " . $form['mi_email']     ."\n";

    //set the form headers
    $headers = 'From: Podere San Cristoforo - Booking Rooms Request';

    // The email subject
    $subject = 'Mail per contatti futuri';

    // Who are we going to send this form too
    $send_to = ['ivanbernabucci@gmail.com'];

    if (wp_mail( $send_to, $subject, $message) ) {
         $_POST = array();
         //wp_redirect('http://www.homelakegarda.com'); exit;
     }

	die();



}

add_action( 'wp_ajax_siteWideMessage', 'send_my_awesome_form' );
add_action( 'wp_ajax_nopriv_siteWideMessage', 'send_my_awesome_form' );

add_action( 'wp_ajax_collectMailMessage', 'send_my_collect_mail_form' );
add_action( 'wp_ajax_nopriv_collectMailMessage', 'send_my_collect_mail_form' );