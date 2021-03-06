<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Customqrcodegenerator
 * @subpackage Customqrcodegenerator/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Customqrcodegenerator
 * @subpackage Customqrcodegenerator/admin
 * @author     Bhavin Gediya <bhavingediya123@gmail.com>
 */
class Customqrcodegenerator_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/customqrcodegenerator-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/customqrcodegenerator-admin.js', array( 'jquery' ), $this->version, true );
	}

	public function misha_editable_order_meta_shipping($order) {
		$qrcodedata = get_post_meta( $order->id, '_order_qr_data', true );
		if ($qrcodedata != null){
			echo "<img src='$qrcodedata'>";
		}
		else{
			echo "<h3>QR code not found</h3>";
		}
		
	}

	
	public function admin_order_preview_add_custom_meta_data( $data, $order ) {
		if( $custom_value = $order->get_meta('_order_qr_data') )
        $data['_order_qr_data'] = $custom_value; // <= Store the value in the data array.
    	return $data;
	}


	public function wp_kama_woocommerce_admin_order_preview_end_action () {
		$qrcodedata = ('{{data._order_qr_data}}');
		if(!empty($qrcodedata)){
			echo '<div><img src={{data._order_qr_data}}></div><br>';
		}
		else{
			echo 'dsdsadsadsad';
		}
		
		
	}

}
