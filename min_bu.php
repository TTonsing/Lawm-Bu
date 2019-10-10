<?php

/*
*Plugin Name: Lawm Bu
*Description: Friends Contact List 
*Version: 1.0.1 Version updated on 20191009
*Author: TTonsing
*Author URI: http://mungboimedia.byethost7.com
*Description: This is a Contact List manager. In Paite dialect (tongue) 'Friend' is referred to as Lawm /Pawl/ Lawi /Vual/ Zawl etc
*Licence: GPL v2.0 or Later
*Version Updates: Update/Delete functionalities incorporated in this version, confirmation before alterig records, deletion etc added. UI tweaks, change the Plugins Icons.
*/
 // function to create the DB / Options / Defaults					
function lawm_bu_table_install() {

    global $wpdb;
	global $charset_collate;

    $table_name = $wpdb->prefix ."lawm_vual";
    $charset_collate = $wpdb->get_charset_collate();
	
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id int(9) NOT NULL AUTO_INCREMENT,
            name varchar(25),
			address varchar(50),
			contact varchar (11),
            PRIMARY KEY (id)
          )$charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
	add_option('test_db_version','$test_db_version');
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'lawm_bu_table_install');



 add_action('admin_menu','lawm_bu_menu');
 
 function lawm_bu_menu(){
	 add_menu_page('lawm_bu', // page title
		'Lawmte Bu', // menu title
		'manage_options', //capabilities
		'lawm_vual', //menu slug
		'lawm_vual', // function apek dang khat pen
		'dashicons-groups', // adding icons
		null );
	
 }
add_action('admin_menu','lawm_bu_submenu');
 
 function lawm_bu_submenu(){   //this will add admin panel submenu
	 add_submenu_page(
		'lawm_vual', //parent slug *
		'lawm_vual_gelhlut', //page title
		'Lawm Vual Gelhlut', //menu title
		'manage_options', //capabilities
		'lawm_vual_gelhlut', // menu slug
		'lawm_vual_gelhlut', //function
		'dashicons-admin-page',  // add icon
		null
		);
		add_submenu_page(
		null, //parent slug *
		'lawm_vual_update', //page title
		'Lawm Vual Update', //menu title
		'manage_options', //capabilities
		'lawm_vual_update', // menu slug
		'lawm_vual_update' //function
		);
 }
 //add_filter('admin_menu','register_lawm_bu_submenu');
 //register_activation_hook(__FILE__, 'lawm_bu_submenu');
  // returns the root directory path of particular plugin
define('LAWM_BU_DIR', plugin_dir_path(__FILE__)); 
require_once(LAWM_BU_DIR . 'lawm_vual.php');
require_once(LAWM_BU_DIR . 'lawm_vual_gelhlut.php');
require_once(LAWM_BU_DIR . 'lawm_vual_update.php');
?>
