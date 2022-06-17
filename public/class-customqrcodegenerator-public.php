<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Customqrcodegenerator
 * @subpackage Customqrcodegenerator/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Customqrcodegenerator
 * @subpackage Customqrcodegenerator/public
 * @author     Bhavin Gediya <bhavingediya123@gmail.com>
 */
class Customqrcodegenerator_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Customqrcodegenerator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Customqrcodegenerator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/customqrcodegenerator-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Customqrcodegenerator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Customqrcodegenerator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( 'main-jquery-js', plugin_dir_url( __FILE__ ) . 'js/jquery-min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'jquery-custom-qr', plugin_dir_url( __FILE__ ) . 'js/jqueryqrcode-public.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'ajax-script', plugin_dir_url( __FILE__ ) . 'js/customqrcodegenerator-public.js', array('jquery') );
      	wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/customqrcodegenerator-public.js', array( 'jquery' ), $this->version, true );
	}

	public function get_data() {
		$orderid = $_POST['orderid'];
		$qrcodedata = $_POST['qrcodedata'];
		update_post_meta( $orderid, '_order_qr_data', $qrcodedata );
		die;
	}

	public function rutland_order_success_checkout ( $order_id ) {
		include('partials/customqrcodegenerator-public-display.php');
		update_post_meta( $order_id, '_order_qr_data', $_POST['name'] );  
		
	}

	

}
