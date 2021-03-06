<?php
	/**
	 * Sales Order Database Plugin.
	 *
	 * This file should be performing crud ops on data table
	 *
	 * @category CategoryName
	 * @package accessnetworks2019
	 * @author Bri Dre
	 * Plugin Name: Sales Order Database Plugin
	 * Description: plugin creates a table for sage sales orders
	 */

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	/**
	 *
	 * Declare function that creates a table for sage sales orders; public to be accessed/available.
	 */
function create_sage_sales_orders_table() {
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	// Instantiate global object/class that talks to WP database.
	global $wpdb;
	// $wpdb->show_errors();
	// Create charset collate.
	$charset_collate = $wpdb->get_charset_collate();
	// Create table name (best practice).
	$table = $wpdb->prefix . 'sage_sales_orders';

	// Create sql table.
	$sql = "CREATE TABLE $table(
            `sales_order_no` VARCHAR(20) UNIQUE,
            `order_date` datetime,
            `order_status` text,
            `master_repeating_order_no` VARCHAR(20),
            `ar_division_no` VARCHAR(20),
            `customer_no` VARCHAR(50),
            `bill_to_division_no` text DEFAULT  NULL,
            `bill_to_customer_no` text DEFAULT  NULL,
            `bill_to_name` text DEFAULT NULL,
            `bill_to_address1` text DEFAULT NULL,
            `bill_to_address2` text DEFAULT  NULL,
            `bill_to_address3` text DEFAULT  NULL,
            `bill_to_city` text DEFAULT  NULL,
            `bill_to_state` text DEFAULT  NULL,
            `bill_to_zip_code` text DEFAULT NULL,
            `bill_to_country_code` text DEFAULT NULL,
            `ship_to_code` text DEFAULT  NULL,
            `ship_to_name` text DEFAULT  NULL,
            `ship_to_address1` text DEFAULT  NULL,
            `ship_to_address2` text DEFAULT  NULL,
            `ship_to_address3` text DEFAULT  NULL,
            `ship_to_city` text DEFAULT  NULL,
            `ship_to_state` text DEFAULT  NULL,
            `ship_via` VARCHAR(10),
            `ship_zone` text DEFAULT  NULL, 
            `ship_zone_actual` text DEFAULT  NULL,
            `ship_weight` FLOAT(13,4),
            `customer_po_no` INT(50),
            `email_address` VARCHAR(100),
            `residential_address` text DEFAULT  NULL,
            `cancel_reason_code` text DEFAULT  NULL,
            `freight_calculation_method` text DEFAULT  NULL,
            `fob` text DEFAULT  NULL, 
            `warehouse_code` text DEFAULT  NULL,
            `confirm_to` text DEFAULT  NULL,
            `comment` text DEFAULT  NULL,
            `tax_schedule` text DEFAULT  NULL,
            `terms_code` text DEFAULT  NULL,
            `tax_exempt_no` text DEFAULT  NULL, 
            `rman_o` text DEFAULT  NULL, 
            `job_no` INT(50),
            `last_invoice_date` DATETIME,
            `last_invoice_no` INT(50),
            `check_no_for_deposit` INT(100),
            `lot_serial_lines_exist` VARCHAR(50),
            `salesperson_division_no` VARCHAR(50),
            `salesperson_no` VARCHAR(50),
            `split_commissions` text DEFAULT  NULL,
            `salesperson_division_no2` INT(50),
            `salesperson_no2` VARCHAR(50),
            `salesperson_division_no3`  VARCHAR(50),
            `salesperson_no3` VARCHAR(50),
            `salesperson_division_no4` VARCHAR(50),
            `salesperson_no4` VARCHAR(50),
            `salesperson_divison_no5` VARCHAR(50),
            `salesperson_no5` VARCHAR(50),
            `ebm_user_type` text DEFAULT  NULL,
            `ebm_submission_type` text DEFAULT  NULL,
            `ebm_user_id_submitting_this_order` INT(200),
            `payment_type` text DEFAULT  NULL,
            `other_payment_type_ref_no` text DEFAULT  NULL,
            `payment_type_category` text DEFAULT  NULL,
            `fax_no` VARCHAR(20),
            `crm_user_id` INT(50),
            `crm_company_id` INT(50),
            `crm_person_id` INT(50),
            `crm_opportunity_id` INT(200),
            `taxable_subject_to_discount` DECIMAL(13,4),
            `non_taxable_subject_to_discount` DECIMAL(13,4),
            `tax_subj_to_disc_prcnt_tot_subj_to` DECIMAL(13,4),
            `discount_rate` DECIMAL(13,4),
            `discount_amt` DECIMAL(13,4),
            `taxable_amt` DECIMAL(13,4),
            `non_taxable_amt` DECIMAL(13,4),
            `sales_tax_amt` DECIMAL(13,4),
            `commission_rate` DECIMAL(13,4),
            `split_comm_rate2` DECIMAL(13,4),
            `split_comm_rate3` DECIMAL(13,4),
            `split_comm_rate4` DECIMAL(13,4),
            `split_comm_rate5` DECIMAL(13,4),
            `weight` FLOAT(13,4),
            `freight_amt` DECIMAL(13,4),
            `deposit_amt` DECIMAL(13,4),
            `date_created` datetime,
            `time_created` datetime,
            `user_created_key` INT(10),
            `date_updated` datetime,
            `time_updated` FLOAT(20),
            `user_updated_key` INT(10),  
            `promoted_date` datetime,
            `udf_buyer_group` VARCHAR(20),
            `udf_so_status` VARCHAR(30),
            `udf_need_by_date` VARCHAR(30),
            `udf_ship_to_email` VARCHAR(60),
            `udf_corporate_name` VARCHAR(20),
            `Udf_project_name` text DEFAULT  NULL,
            `udf_ship_to_name` text DEFAULT  NULL,
            `udf_programmed` text DEFAULT  NULL,
            `udf_shippingnotes` text DEFAULT  NULL,
            `udf_shipby` text DEFAULT  NULL,
            `udf_picked` text DEFAULT  NULL,
            `udf_shipping_status` text DEFAULT  NULL,
            `udf_ship_to_email2` text DEFAULT  NULL,
            `udf_ship_to_email3` text DEFAULT  NULL,
            `udf_customername` text DEFAULT  NULL,
            `udf_tracking_number` VARCHAR(100),
            `udf_order_handling` text DEFAULT  NULL,
            `udf_comments` text DEFAULT  NULL,
            `udf_bin_location` text DEFAULT  NULL,
            `udf_ext_diff` text DEFAULT  NULL,
            `udf_free_shipping` text DEFAULT  NULL,
            `udf_tracking_number_2` VARCHAR(100),
            `udf_type` text DEFAULT  NULL,
            `udf_site_code` VARCHAR(200),
            `udf_promo_code` text DEFAULT  NULL,
            `udf_phone_number` VARCHAR(15),
            `udf_woid` text DEFAULT  NULL,
            `udf_contract_charges` DECIMAL(13,4),
            `udf_published_charges` DECIMAL(13,4),
            `udf_project_type` text DEFAULT  NULL,
            PRIMARY KEY  (`sales_order_no`)
            ) $charset_collate;";

		// Maybe create table creates the table in database ONLY if it doesn't already exist.
		maybe_create_table( 'sage_sales_orders', $sql );

}

	//add_action( 'admin_init', 'create_sage_sales_orders_table' );
	/**
	 * Create_sage_sales_order function.
	 */
function create_sage_sales_order( $args = array() ) {
	// Do I need to instantiate the wpdb class again?
	global $wpdb;
	// Need to get wpdb->prepare in here somehow.
	// show errors.
	$wpdb->show_errors();
	// here's the name of the table we're referencing again.
	$table = $wpdb->prefix . 'sage_sales_orders';
	// Step 1: insert data using wpdb->insert; array is data from table. 
	//Store array in variable called results.
	$wpdb->insert(
		$table,
		array(
			'sales_order_no'                     => $args['sales_order_no'],
			'order_date'                         => $args['order_date'],
			'order_status'                       => $args['order_status'],
			'master_repeating_order_no'          => $args['master_repeating_order_no'],
			'ar_division_no'                     => $args['ar_division_no'],
			'customer_no'                        => $args['customer_no'],
			'bill_to_division_no'                => $args['bill_to_division_no'],
			'bill_to_customer_no'                => $args['bill_to_customer_no'],
			'bill_to_name'                       => $args['bill_to_name'],
			'bill_to_address1'                   => $args['bill_to_address1'],
			'bill_to_address2'                   => $args['bill_to_address2'],
			'bill_to_address3'                   => $args['bill_to_address3'],
			'bill_to_city'                       => $args['bill_to_city'],
			'bill_to_state'                      => $args['bill_to_state'],
			'bill_to_zip_code'                   => $args['bill_to_zip_code'],
			'bill_to_country_code'               => $args['bill_to_country_code'],
			'ship_to_code'                       => $args['ship_to_code'],
			'ship_to_name'                       => $args['ship_to_name'],
			'ship_to_address1'                   => $args['ship_to_address1'],
			'ship_to_address2'                   => $args['ship_to_address2'],
			'ship_to_address3'                   => $args['ship_to_address3'],
			'ship_to_city'                       => $args['ship_to_city'],
			'ship_to_state'                      => $args['ship_to_state'],
			'ship_via'                           => $args['ship_via'],
			'ship_zone'                          => $args['ship_zone'],
			'ship_zone_actual'                   => $args['ship_zone_actual'],
			'ship_weight'                        => $args['ship_weight'],
			'customer_po_no'                     => $args['customer_po_no'],
			'email_address'                      => $args['email_address'],
			'residential_address'                => $args['esidential_address'],
			'cancel_reason_code'                 => $args['cancel_reason_code'],
			'freight_calculation_method'         => $args['freight_calculation_method'],
			'fob'                                => $args['fob'],
			'warehouse_code'                     => $args['warehouse_code'],
			'confirm_to'                         => $args['confirm_to'],
			'comment'                            => $args['comment'],
			'tax_schedule'                       => $args['tax_schedule'],
			'terms_code'                         => $args['terms_code'],
			'tax_exempt_no'                      => $args['tax_exempt_no'],
			'rman_o'                             => $args['rman_o'],
			'job_no'                             => $args['job_no'],
			'last_invoice_date'                  => $args['last_invoice_date'],
			'last_invoice_no'                    => $args['last_invoice_no'],
			'check_no_for_deposit'               => $args['check_no_for_deposit'],
			'lot_serial_lines_exist'             => $args['lot_serial_lines_exist'],
			'salesperson_division_no'            => $args['salesperson_division_no'],
			'salesperson_no'                     => $args['salesperson_no'],
			'split_commissions'                  => $args['split_commissions'],
			'salesperson_division_no2'           => $args['salesperson_division_no2'],
			'salesperson_no2'                    => $args['salesperson_no2'],
			'salesperson_division_no3'           => $args['salesperson_division_no3'],
			'salesperson_no3'                    => $args['salesperson_no3'],
			'salesperson_division_no4'           => $args['salesperson_division_no4'],
			'salesperson_no4'                    => $args['salesperson_no4'],
			'salesperson_divison_no5'            => $args['salesperson_divison_no5'],
			'salesperson_no5'                    => $args['salesperson_no5'],
			'ebm_user_type'                      => $args['ebm_user_type'],
			'ebm_submission_type'                => $args['ebm_submission_type'],
			'ebm_user_id_submitting_this_order'  => $args['ebm_user_id_submitting_this_order'],
			'payment_type'                       => $args['payment_type'],
			'other_payment_type_ref_no'          => $args['other_payment_type_ref_no'],
			'payment_type_category'              => $args['payment_type_category'],
			'fax_no'                             => $args['fax_no'],
			'crm_user_id'                        => $args['crm_user_id'],
			'crm_company_id'                     => $args['crm_company_id'],
			'crm_person_id'                      => $args['crm_person_id'],
			'crm_opportunity_id'                 => $args['crm_opportunity_id'],
			'taxable_subject_to_discount'        => $args['taxable_subject_to_discount'],
			'non_taxable_subject_to_discount'   => $args['non_taxable_subject_to_discount'],
			'tax_subj_to_disc_prcnt_tot_subj_to' => $args['tax_subj_to_disc_prcnt_tot_subj_to'],
			'discount_rate'                      => $args['discount_rate'],
			'discount_amt'                       => $args['discount_amt'],
			'taxable_amt'                        => $args['taxable_amt'],
			'non_taxable_amt'                    => $args['non_taxable_amt'],
			'sales_tax_amt'                      => $args['sales_tax_amt'],
			'commission_rate'                    => $args['commission_rate'],
			'split_comm_rate2'                   => $args['split_comm_rate2'],
			'split_comm_rate3'                   => $args['split_comm_rate3'],
			'split_comm_rate4'                   => $args['split_comm_rate4'],
			'split_comm_rate5'                   => $args['plit_comm_rate5'],
			'weight'                             => $args['weight'],
			'freight_amt'                        => $args['freight_amt'],
			'deposit_amt'                        => $args['deposit_amt'],
			'date_created'                       => $args['date_created'],
			'time_created'                       => $args['time_created'],
			'user_created_key'                   => $args['user_created_key'],
			'date_updated'                       => $args['date_updated'],
			'time_updated'                       => $args['time_updated'],
			'user_updated_key'                   => $args['user_updated_key'],
			'promoted_date'                      => $args['promoted_date'],
			'udf_buyer_group'                    => $args['udf_buyer_group'],
			'udf_so_status'                      => $args['udf_so_status'],
			'udf_need_by_date'                   => $args['udf_need_by_date'],
			'udf_ship_to_email'                  => $args['udf_ship_to_email'],
			'udf_corporate_name'                 => $args['udf_corporate_name'],
			'udf_project_name'                   => $args['udf_project_name'],
			'udf_ship_to_name'                   => $args['udf_ship_to_name'],
			'udf_programmed'                     => $args['udf_programmed'],
			'udf_shippingnotes'                  => $args['udf_shippingnotes'],
			'udf_shipby'                         => $args['udf_shipby'],
			'udf_picked'                         => $args['udf_picked'],
			'udf_shipping_status'                => $args['udf_shipping_status'],
			'udf_ship_to_email2'                 => $args['udf_ship_to_email2'],
			'udf_ship_to_email3'                 => $args['udf_ship_to_email3'],
			'udf_customername'                   => $args['udf_customername'],
			'udf_tracking_number'                => $args['udf_tracking_number'],
			'udf_order_handling'                 => $args['udf_order_handling'],
			'udf_comments'                       => $args['udf_comments'],
			'udf_bin_location'                   => $args['udf_bin_location'],
			'udf_ext_diff'                       => $args['udf_ext_diff'],
			'udf_free_shipping'                  => $args['udf_free_shipping'],
			'udf_tracking_number_2'              => $args['udf_tracking_number_2'],
			'udf_type'                           => $args['udf_type'],
			'udf_site_code'                      => $args['udf_site_code'],
			'udf_promo_code'                     => $args['udf_promo_code'],
			'udf_phone_number'                   => $args['udf_phone_number'],
			'udf_woid'                           => $args['udf_woid'],
			'udf_contract_charges'               => $args['udf_contract_charges'],
			'udf_published_charges'              => $args['udf_published_charges'],
			'udf_project_type'                   => $args['udf_project_type'],

		),
		// array( '%d', '%f', '%s' )
		array(
			'%s', //sales order no
			'%s', //order date
			'%s', //order status
			'%s', //master repeating order no
			'%s', //ar division no
			'%s', //customer no
			'%s', //bill to division no
			'%s', //bill to customer no
			'%s', //bill to name
			'%s', //bill to address1
			'%s', //bill to address2
			'%s', //bill to address3
			'%s', //bill to city
			'%s', //bill to state
			'%s', //bill to zip code
			'%s', //bill to country code
			'%s', //ship to code
			'%s', //ship to name
			'%s', //ship to address1
			'%s', //ship to address2
			'%s', //ship to address3
			'%s', //ship to city
			'%s', //ship to state
			'%s', //ship_via
			'%s', //ship zone
			'%s', //ship zone actual
			'%f', //ship weight *************
			'%d', //customer po no ********
			'%s', //email address
			'%s', //residential address
			'%s', //cancel reason code
			'%s', //freight calculation method
			'%s', //fob
			'%s', //warehouse code
			'%s', //confirm to
			'%s', //comment
			'%s', //tax schedule
			'%s', //terms code
			'%s', //tax exempt no ****
			'%s', //rman o
			'%d', //job no ******
			'%s', //last invoice date
			'%s', //last invoice no
			'%d', //check no for deposit
			'%s', //lot serial lines exist
			'%s', //salesperson div no
			'%s', //salesperson no
			'%s', //split comissions
			'%s', //salesperson div no2
			'%s', //salesperson no2
			'%s', //salesperson div no3
			'%s', //salesperson no3
			'%s', //salesperson div no4
			'%s', //salesperson no4
			'%s', //salesperson div no5
			'%s', //salesperson no5
			'%s', //ebm user type
			'%s', //ebm submission type
			'%d', //ebm user id submitting order **********
			'%s', //payment type
			'%s', //other payment type ref no
			'%s', //payment type category
			'%s', //fax no
			'%d', //crm user id **** int or varchar/string?*******
			'%d', //crm company id **varchar or int**???????
			'%d', //crm person id **
			'%d', //crm opportunity id **
			'%f', //taxable subj to disc **** dec as float???
			'%f', //non taxable subj to disc *** dec as float???
			'%f', //tax subj to disc prcnt tot subj to
			'%f', //discount rate ****
			'%f', //discount amnt *****
			'%f', //taxable amount
			'%f', //nontaxable amt
			'%f', //sales tax amt
			'%f', //comission rate
			'%f', //split comm rate2
			'%f', //split comm rate3
			'%f', //split comm rate4
			'%f', //split comm rate5
			'%f', //weight****
			'%f', //freight amt ****
			'%f', //deposit amt ***
			'%s', //date created
			'%s', //time created *******??????
			'%d', //user created key
			'%s', //date updated
			'%s', //time updated
			'%d',  //user updated key ****
			'%s', //promoted date
			'%s', //udf buyer group
			'%s', //udf so status
			'%s', //udf need by date
			'%s', //udf ship to email
			'%s', //udf corporate name
			'%s', //udf project name
			'%s', //udf ship to name
			'%s', //udf programmed
			'%s', //udf shipping notes
			'%s', //udf ship by
			'%s', //udf picked
			'%s', //udf shipping status
			'%s', //udf ship to email2
			'%s', //udf ship to email3
			'%s', //udf customer name
			'%s', //udf tracking number
			'%s', //udf order handling
			'%s', //udf comments
			'%s', //udf bin location
			'%s', //udf ext diff
			'%s', //udf free shipping
			'%s', //udf tracking number2
			'%s', //udf type
			'%s', //udf site code
			'%s', //udf promo code
			'%s', //udf phone number
			'%s', //udf woid
			'%f', //udf contract charges ***
			'%f', //udf published charges ****
			'%s', //udf projec type

		)
	);
	return $wpdb->insert_id ;
}




function test_insert() {

	$args = array(
		'sales_order_no'                     => 'Nero',
		'order_date'                         => '9999-12-31 23:59:59',
		'order_status'                       => 'not ready',
		'master_repeating_order_no'          => 'hello',
		'ar_division_no'                     => 'hello',
		'customer_no'                        => 'hello',
		'bill_to_division_no'                => 'hello',
		'bill_to_customer_no'                => 'hello',
		'bill_to_name'                       => 'John Doe',
		'bill_to_address1'                   => '55 Main St',
		'bill_to_address2'                   => '',
		'bill_to_address3'                   => '',
		'bill_to_city'                       => 'Yreka',
		'bill_to_state'                      => 'CA',
		'bill_to_zip_code'                   => '95618',
		'bill_to_country_code'               => '',
		'ship_to_code'                       => '',
		'ship_to_name'                       => '',
		'ship_to_address1'                   => '',
		'ship_to_address2'                   => '',
		'ship_to_address3'                   => '',
		'ship_to_city'                       => '',
		'ship_to_state'                      => '',
		'ship_via'                           => '',
		'ship_zone'                          => '',
		'ship_zone_actual'                   => '',
		'ship_weight'                        => '',
		'customer_po_no'                     => '',
		'email_address'                      => '',
		'residential_address'                => '',
		'cancel_reason_code'                 => '',
		'freight_calculation_method'         => '',
		'fob'                                => '',
		'warehouse_code'                     => '',
		'confirm_to'                         => '',
		'comment'                            => '',
		'tax_schedule'                       => '',
		'terms_code'                         => '',
		'tax_exempt_no'                      => '',
		'rman_o'                             => '',
		'job_no'                             => '',
		'last_invoice_date'                  => '',
		'last_invoice_no'                    => '',
		'check_no_for_deposit'               => '',
		'lot_serial_lines_exist'             => '',
		'salesperson_division_no'            => '',
		'salesperson_no'                     => '',
		'split_commissions'                  => '',
		'salesperson_division_no2'           => '',
		'salesperson_no2'                    => '',
		'salesperson_division_no3'           => '',
		'salesperson_no3'                    => '',
		'salesperson_division_no4'           => '',
		'salesperson_no4'                    => '',
		'salesperson_divison_no5'            => '',
		'salesperson_no5'                    => '',
		'ebm_user_type'                      => '',
		'ebm_submission_type'                => '',
		'ebm_user_id_submitting_this_order'  => '',
		'payment_type'                       => '',
		'other_payment_type_ref_no'          => '',
		'payment_type_category'              => '',
		'fax_no'                             => '',
		'crm_user_id'                        => '',
		'crm_company_id'                     => '',
		'crm_person_id'                      => '',
		'crm_opportunity_id'                 => '',
		'taxable_subject_to_discount'        => '',
		'non_taxable_subject_to_discount'   => '',
		'tax_subj_to_disc_prcnt_tot_subj_to' => '',
		'discount_rate'                      => '',
		'discount_amt'                       => '',
		'taxable_amt'                        => '',
		'non_taxable_amt'                    => '',
		'sales_tax_amt'                      => '',
		'commission_rate'                    => '',
		'split_comm_rate2'                   => '',
		'split_comm_rate3'                   => '',
		'split_comm_rate4'                   => '',
		'split_comm_rate5'                   => '',
		'weight'                             => '',
		'freight_amt'                        => '',
		'deposit_amt'                        => '',
		'date_created'                       => '',
		'time_created'                       => '',
		'user_created_key'                   => '',
		'date_updated'                       => '',
		'time_updated'                       => '',
		'user_updated_key'                   => '',
		'promoted_date'                      => '',
		'udf_buyer_group'                    => '',
		'udf_so_status'                      => '',
		'udf_need_by_date'                   => '',
		'udf_ship_to_email'                  => '',
		'udf_corporate_name'                 => '',
		'Udf_project_name'                   => '',
		'udf_ship_to_name'                   => '',
		'udf_programmed'                     => '',
		'udf_shippingnotes'                  => '',
		'udf_shipby'                         => '',
		'udf_picked'                         => '',
		'udf_shipping_status'                => '',
		'udf_ship_to_email2'                 => '',
		'udf_ship_to_email3'                 => '',
		'udf_customername'                   => '',
		'udf_tracking_number'                => '',
		'udf_order_handling'                 => '',
		'udf_comments'                       => '',
		'udf_bin_location'                   => '',
		'udf_ext_diff'                       => '',
		'udf_free_shipping'                  => '',
		'udf_tracking_number_2'              => '',
		'udf_type'                           => '',
		'udf_site_code'                      => '',
		'udf_promo_code'                     => '',
		'udf_phone_number'                   => '',
		'udf_woid'                           => '',
		'udf_contract_charges'               => '',
		'udf_published_charges'              => '',
		'udf_project_type'                   => '',
	
	);
	//hold all data (see above) we're inserting into the table in var called results ; call function to insert row
	$results = create_sage_sales_order( $args );
	echo 'insert results';
    var_dump( $results );
    
}

test_insert();

function get_multiple_sage_sales_orders( $args = array() ) {
    //instantiate global database class that talks to wp database
    global $wpdb ;

    //$wpdb->show_errors();

	$table = $wpdb->prefix . 'sage_sales_orders';
	//get all the results from test function
	// SELECT as total FROM {$wpdb->prefix}your_table_without_prefix WHERE some_field_in_your_table=%d", $some_parameter) 

	//grab all data from table
	$all_orders = $wpdb->get_results( "SELECT * FROM $table" );

	//return $all_orders;
	return $all_orders;

}

function test_read_multiple_sage_sales_orders(){

	$results = get_multiple_sage_sales_orders();
	var_dump($results);
}
//test_read_multiple_sage_sales_orders();

function get_single_sage_sales_order(string $sage_sale_order_id){
	global $wpdb ;

	$table = $wpdb->prefix . 'sage_sales_orders';

	$wpdb->show_errors();

	//$sage_sale_order_id = '59A34263U';

	$results = $wpdb->get_results("SELECT * FROM $table WHERE sales_order_no = '$sage_sale_order_id'");

	//return results
	return $results;

	//wpdb->show_errors();
}

function test_read_single_sales_order(){
	$sage_sales_order_id = 'Nero';
	//$args = array(
		//'sales_order_no'                     => $args[$sage_sales_order_id],
	//);
	$results = get_single_sage_sales_order($sage_sales_order_id);
	var_dump($results);
}
//test_read_single_sales_order();
//get_single_sage_sales_order();
//function update_sage_sales_order(){}
function update_sage_sales_order(string $sage_sales_order_id, $args = array()){
	global $wpdb;

	$table = $wpdb->prefix . 'sage_sales_orders';

	$wpdb->show_errors();

	$results = $wpdb->update(
		$table, 
		array(
			'sales_order_no'                     => $args['sales_order_no'],
			'order_date'                         => $args['order_date'],
			'order_status'                       => $args['order_status'],
			'master_repeating_order_no'          => $args['master_repeating_order_no'],
			'ar_division_no'                     => $args['ar_division_no'],
			'customer_no'                        => $args['customer_no'],
			'bill_to_division_no'                => $args['bill_to_division_no'],
			'bill_to_customer_no'                => $args['bill_to_customer_no'],
			'bill_to_name'                       => $args['bill_to_name'],
			'bill_to_address1'                   => $args['bill_to_address1'],
			'bill_to_address2'                   => $args['bill_to_address2'],
			'bill_to_address3'                   => $args['bill_to_address3'],
			'bill_to_city'                       => $args['bill_to_city'],
			'bill_to_state'                      => $args['bill_to_state'],
			'bill_to_zip_code'                   => $args['bill_to_zip_code'],
			'bill_to_country_code'               => $args['bill_to_country_code'],
			'ship_to_code'                       => $args['ship_to_code'],
			'ship_to_name'                       => $args['ship_to_name'],
			'ship_to_address1'                   => $args['ship_to_address1'],
			'ship_to_address2'                   => $args['ship_to_address2'],
			'ship_to_address3'                   => $args['ship_to_address3'],
			'ship_to_city'                       => $args['ship_to_city'],
			'ship_to_state'                      => $args['ship_to_state'],
			'ship_via'                           => $args['ship_via'],
			'ship_zone'                          => $args['ship_zone'],
			'ship_zone_actual'                   => $args['ship_zone_actual'],
			'ship_weight'                        => $args['ship_weight'],
			'customer_po_no'                     => $args['customer_po_no'],
			'email_address'                      => $args['email_address'],
			'residential_address'                => $args['esidential_address'],
			'cancel_reason_code'                 => $args['cancel_reason_code'],
			'freight_calculation_method'         => $args['freight_calculation_method'],
			'fob'                                => $args['fob'],
			'warehouse_code'                     => $args['warehouse_code'],
			'confirm_to'                         => $args['confirm_to'],
			'comment'                            => $args['comment'],
			'tax_schedule'                       => $args['tax_schedule'],
			'terms_code'                         => $args['terms_code'],
			'tax_exempt_no'                      => $args['tax_exempt_no'],
			'rman_o'                             => $args['rman_o'],
			'job_no'                             => $args['job_no'],
			'last_invoice_date'                  => $args['last_invoice_date'],
			'last_invoice_no'                    => $args['last_invoice_no'],
			'check_no_for_deposit'               => $args['check_no_for_deposit'],
			'lot_serial_lines_exist'             => $args['lot_serial_lines_exist'],
			'salesperson_division_no'            => $args['salesperson_division_no'],
			'salesperson_no'                     => $args['salesperson_no'],
			'split_commissions'                  => $args['split_commissions'],
			'salesperson_division_no2'           => $args['salesperson_division_no2'],
			'salesperson_no2'                    => $args['salesperson_no2'],
			'salesperson_division_no3'           => $args['salesperson_division_no3'],
			'salesperson_no3'                    => $args['salesperson_no3'],
			'salesperson_division_no4'           => $args['salesperson_division_no4'],
			'salesperson_no4'                    => $args['salesperson_no4'],
			'salesperson_divison_no5'            => $args['salesperson_divison_no5'],
			'salesperson_no5'                    => $args['salesperson_no5'],
			'ebm_user_type'                      => $args['ebm_user_type'],
			'ebm_submission_type'                => $args['ebm_submission_type'],
			'ebm_user_id_submitting_this_order'  => $args['ebm_user_id_submitting_this_order'],
			'payment_type'                       => $args['payment_type'],
			'other_payment_type_ref_no'          => $args['other_payment_type_ref_no'],
			'payment_type_category'              => $args['payment_type_category'],
			'fax_no'                             => $args['fax_no'],
			'crm_user_id'                        => $args['crm_user_id'],
			'crm_company_id'                     => $args['crm_company_id'],
			'crm_person_id'                      => $args['crm_person_id'],
			'crm_opportunity_id'                 => $args['crm_opportunity_id'],
			'taxable_subject_to_discount'        => $args['taxable_subject_to_discount'],
			'non_taxable_subject_to_discount'   => $args['non_taxable_subject_to_discount'],
			'tax_subj_to_disc_prcnt_tot_subj_to' => $args['tax_subj_to_disc_prcnt_tot_subj_to'],
			'discount_rate'                      => $args['discount_rate'],
			'discount_amt'                       => $args['discount_amt'],
			'taxable_amt'                        => $args['taxable_amt'],
			'non_taxable_amt'                    => $args['non_taxable_amt'],
			'sales_tax_amt'                      => $args['sales_tax_amt'],
			'commission_rate'                    => $args['commission_rate'],
			'split_comm_rate2'                   => $args['split_comm_rate2'],
			'split_comm_rate3'                   => $args['split_comm_rate3'],
			'split_comm_rate4'                   => $args['split_comm_rate4'],
			'split_comm_rate5'                   => $args['plit_comm_rate5'],
			'weight'                             => $args['weight'],
			'freight_amt'                        => $args['freight_amt'],
			'deposit_amt'                        => $args['deposit_amt'],
			'date_created'                       => $args['date_created'],
			'time_created'                       => $args['time_created'],
			'user_created_key'                   => $args['user_created_key'],
			'date_updated'                       => $args['date_updated'],
			'time_updated'                       => $args['time_updated'],
			'user_updated_key'                   => $args['user_updated_key'],
			'promoted_date'                      => $args['promoted_date'],
			'udf_buyer_group'                    => $args['udf_buyer_group'],
			'udf_so_status'                      => $args['udf_so_status'],
			'udf_need_by_date'                   => $args['udf_need_by_date'],
			'udf_ship_to_email'                  => $args['udf_ship_to_email'],
			'udf_corporate_name'                 => $args['udf_corporate_name'],
			'udf_project_name'                   => $args['udf_project_name'],
			'udf_ship_to_name'                   => $args['udf_ship_to_name'],
			'udf_programmed'                     => $args['udf_programmed'],
			'udf_shippingnotes'                  => $args['udf_shippingnotes'],
			'udf_shipby'                         => $args['udf_shipby'],
			'udf_picked'                         => $args['udf_picked'],
			'udf_shipping_status'                => $args['udf_shipping_status'],
			'udf_ship_to_email2'                 => $args['udf_ship_to_email2'],
			'udf_ship_to_email3'                 => $args['udf_ship_to_email3'],
			'udf_customername'                   => $args['udf_customername'],
			'udf_tracking_number'                => $args['udf_tracking_number'],
			'udf_order_handling'                 => $args['udf_order_handling'],
			'udf_comments'                       => $args['udf_comments'],
			'udf_bin_location'                   => $args['udf_bin_location'],
			'udf_ext_diff'                       => $args['udf_ext_diff'],
			'udf_free_shipping'                  => $args['udf_free_shipping'],
			'udf_tracking_number_2'              => $args['udf_tracking_number_2'],
			'udf_type'                           => $args['udf_type'],
			'udf_site_code'                      => $args['udf_site_code'],
			'udf_promo_code'                     => $args['udf_promo_code'],
			'udf_phone_number'                   => $args['udf_phone_number'],
			'udf_woid'                           => $args['udf_woid'],
			'udf_contract_charges'               => $args['udf_contract_charges'],
			'udf_published_charges'              => $args['udf_published_charges'],
			'udf_project_type'                   => $args['udf_project_type'],

		),

		array(
			'sales_order_no' => $sage_sales_order_id,
		),
		// array( '%d', '%f', '%s' )
		array(
			'%s', //sales order no
			'%s', //order date
			'%s', //order status
			'%s', //master repeating order no
			'%s', //ar division no
			'%s', //customer no
			'%s', //bill to division no
			'%s', //bill to customer no
			'%s', //bill to name
			'%s', //bill to address1
			'%s', //bill to address2
			'%s', //bill to address3
			'%s', //bill to city
			'%s', //bill to state
			'%s', //bill to zip code
			'%s', //bill to country code
			'%s', //ship to code
			'%s', //ship to name
			'%s', //ship to address1
			'%s', //ship to address2
			'%s', //ship to address3
			'%s', //ship to city
			'%s', //ship to state
			'%s', //ship_via
			'%s', //ship zone
			'%s', //ship zone actual
			'%f', //ship weight *************
			'%d', //customer po no ********
			'%s', //email address
			'%s', //residential address
			'%s', //cancel reason code
			'%s', //freight calculation method
			'%s', //fob
			'%s', //warehouse code
			'%s', //confirm to
			'%s', //comment
			'%s', //tax schedule
			'%s', //terms code
			'%s', //tax exempt no ****
			'%s', //rman o
			'%d', //job no ******
			'%s', //last invoice date
			'%s', //last invoice no
			'%d', //check no for deposit
			'%s', //lot serial lines exist
			'%s', //salesperson div no
			'%s', //salesperson no
			'%s', //split comissions
			'%s', //salesperson div no2
			'%s', //salesperson no2
			'%s', //salesperson div no3
			'%s', //salesperson no3
			'%s', //salesperson div no4
			'%s', //salesperson no4
			'%s', //salesperson div no5
			'%s', //salesperson no5
			'%s', //ebm user type
			'%s', //ebm submission type
			'%d', //ebm user id submitting order **********
			'%s', //payment type
			'%s', //other payment type ref no
			'%s', //payment type category
			'%s', //fax no
			'%d', //crm user id **** int or varchar/string?*******
			'%d', //crm company id **varchar or int**???????
			'%d', //crm person id **
			'%d', //crm opportunity id **
			'%f', //taxable subj to disc **** dec as float???
			'%f', //non taxable subj to disc *** dec as float???
			'%f', //tax subj to disc prcnt tot subj to
			'%f', //discount rate ****
			'%f', //discount amnt *****
			'%f', //taxable amount
			'%f', //nontaxable amt
			'%f', //sales tax amt
			'%f', //comission rate
			'%f', //split comm rate2
			'%f', //split comm rate3
			'%f', //split comm rate4
			'%f', //split comm rate5
			'%f', //weight****
			'%f', //freight amt ****
			'%f', //deposit amt ***
			'%s', //date created
			'%s', //time created *******??????
			'%d', //user created key
			'%s', //date updated
			'%s', //time updated
			'%d',  //user updated key ****
			'%s', //promoted date
			'%s', //udf buyer group
			'%s', //udf so status
			'%s', //udf need by date
			'%s', //udf ship to email
			'%s', //udf corporate name
			'%s', //udf project name
			'%s', //udf ship to name
			'%s', //udf programmed
			'%s', //udf shipping notes
			'%s', //udf ship by
			'%s', //udf picked
			'%s', //udf shipping status
			'%s', //udf ship to email2
			'%s', //udf ship to email3
			'%s', //udf customer name
			'%s', //udf tracking number
			'%s', //udf order handling
			'%s', //udf comments
			'%s', //udf bin location
			'%s', //udf ext diff
			'%s', //udf free shipping
			'%s', //udf tracking number2
			'%s', //udf type
			'%s', //udf site code
			'%s', //udf promo code
			'%s', //udf phone number
			'%s', //udf woid
			'%f', //udf contract charges ***
			'%f', //udf published charges ****
			'%s', //udf projec type

		
		));
		return $results;

}

function test_update(){

	$sage_order_id = 'Nero';
	

	$args = array(
		'sales_order_no'                     => 'Nero',
		'order_date'                         => '9999-12-31 23:59:59',
		'order_status'                       => 'born ready',
		'master_repeating_order_no'          => 'hello',
		'ar_division_no'                     => 'hello',
		'customer_no'                        => 'hello',
		'bill_to_division_no'                => 'hello',
		'bill_to_customer_no'                => 'hello',
		'bill_to_name'                       => 'John Doe',
		'bill_to_address1'                   => '55 Main St',
		'bill_to_address2'                   => '',
		'bill_to_address3'                   => '',
		'bill_to_city'                       => 'Eureka',
		'bill_to_state'                      => 'CA',
		'bill_to_zip_code'                   => '95618',
		'bill_to_country_code'               => '',
		'ship_to_code'                       => '',
		'ship_to_name'                       => '',
		'ship_to_address1'                   => '',
		'ship_to_address2'                   => '',
		'ship_to_address3'                   => '',
		'ship_to_city'                       => '',
		'ship_to_state'                      => '',
		'ship_via'                           => '',
		'ship_zone'                          => '',
		'ship_zone_actual'                   => '',
		'ship_weight'                        => '',
		'customer_po_no'                     => '',
		'email_address'                      => '',
		'residential_address'                => '',
		'cancel_reason_code'                 => '',
		'freight_calculation_method'         => '',
		'fob'                                => '',
		'warehouse_code'                     => '',
		'confirm_to'                         => '',
		'comment'                            => '',
		'tax_schedule'                       => '',
		'terms_code'                         => '',
		'tax_exempt_no'                      => '',
		'rman_o'                             => '',
		'job_no'                             => '',
		'last_invoice_date'                  => '',
		'last_invoice_no'                    => '',
		'check_no_for_deposit'               => '',
		'lot_serial_lines_exist'             => '',
		'salesperson_division_no'            => '',
		'salesperson_no'                     => '',
		'split_commissions'                  => '',
		'salesperson_division_no2'           => '',
		'salesperson_no2'                    => '',
		'salesperson_division_no3'           => '',
		'salesperson_no3'                    => '',
		'salesperson_division_no4'           => '',
		'salesperson_no4'                    => '',
		'salesperson_divison_no5'            => '',
		'salesperson_no5'                    => '',
		'ebm_user_type'                      => '',
		'ebm_submission_type'                => '',
		'ebm_user_id_submitting_this_order'  => '',
		'payment_type'                       => '',
		'other_payment_type_ref_no'          => '',
		'payment_type_category'              => '',
		'fax_no'                             => '',
		'crm_user_id'                        => '',
		'crm_company_id'                     => '',
		'crm_person_id'                      => '',
		'crm_opportunity_id'                 => '',
		'taxable_subject_to_discount'        => '',
		'non_taxable_subject_to_discount'   => '',
		'tax_subj_to_disc_prcnt_tot_subj_to' => '',
		'discount_rate'                      => '',
		'discount_amt'                       => '',
		'taxable_amt'                        => '',
		'non_taxable_amt'                    => '',
		'sales_tax_amt'                      => '',
		'commission_rate'                    => '',
		'split_comm_rate2'                   => '',
		'split_comm_rate3'                   => '',
		'split_comm_rate4'                   => '',
		'split_comm_rate5'                   => '',
		'weight'                             => '',
		'freight_amt'                        => '',
		'deposit_amt'                        => '',
		'date_created'                       => '',
		'time_created'                       => '',
		'user_created_key'                   => '',
		'date_updated'                       => '',
		'time_updated'                       => '',
		'user_updated_key'                   => '',
		'promoted_date'                      => '',
		'udf_buyer_group'                    => '',
		'udf_so_status'                      => '',
		'udf_need_by_date'                   => '',
		'udf_ship_to_email'                  => '',
		'udf_corporate_name'                 => '',
		'Udf_project_name'                   => '',
		'udf_ship_to_name'                   => '',
		'udf_programmed'                     => '',
		'udf_shippingnotes'                  => '',
		'udf_shipby'                         => '',
		'udf_picked'                         => '',
		'udf_shipping_status'                => '',
		'udf_ship_to_email2'                 => '',
		'udf_ship_to_email3'                 => '',
		'udf_customername'                   => '',
		'udf_tracking_number'                => '',
		'udf_order_handling'                 => '',
		'udf_comments'                       => '',
		'udf_bin_location'                   => '',
		'udf_ext_diff'                       => '',
		'udf_free_shipping'                  => '',
		'udf_tracking_number_2'              => '',
		'udf_type'                           => '',
		'udf_site_code'                      => '',
		'udf_promo_code'                     => '',
		'udf_phone_number'                   => '',
		'udf_woid'                           => '',
		'udf_contract_charges'               => '',
		'udf_published_charges'              => '',
		'udf_project_type'                   => '',
	
		
		
		
	);

	$results = update_sage_sales_order($sage_order_id, $args);

	var_dump($results);
}
//test_update();

function delete_single_order( string $sage_order_id){

	global $wpdb ;

	$table = $wpdb->prefix . 'sage_sales_orders';

	$wpdb->show_errors();

	$results = $wpdb->delete(
		$table,
		array(
			'sales_order_no'                     => $sage_order_id,
		)
	);

	return $results; 

}

function test_delete(){
	$order_id = 'Charlemagne';

	$results = delete_single_order($order_id);
	var_dump($results);
}

test_delete();





