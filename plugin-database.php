<?php
    /* Plugin Name: Sales Order Database Plugin 
    Description: plugin creates a table for sage sales orders*/

    //Declare function that creates a table for sage sales orders; public to be accessed/available
    function create_sage_sales_orders_table(){
        
        //instantiate global object/class that talks to WP database
        global $wpdb ;

        //create charset collate
        $charset_collate = $wpdb->get_charset_collate();
        //create table name
        $table = $wpdb->prefix . 'sage_sales_orders';
        
        //if no tables like this exist yet

        //create sql table
        $sql = "CREATE TABLE $table(
            
            'sales_order_no' VARCHAR(20) UNIQUE NOT NULL,
            'order_date' datetime,
            'order_status' text ,
            'master_repeating_order_no' VARCHAR(20),
            'ar_division_no' VARCHAR(20),
            'customer_no' VARCHAR(50),
            'bill_to_division_no' text,
            'bill_to_customer_no' text,
            'bill_to_name' text NOT NULL,
            'bill_to_address1' text NOT NULL,
            'bill_to_address2' text,
            'bill_to_address3' text,
            'bill_to_city' text NOT NULL,
            'bill_to_state text NOT NULL,
            'bill_to_zip_code text NOT NULL,
            'bill_to_country_code text NOT NULL,
            'ship_to_code text,
            'ship_to_name text,
            'ship_to_address1 text,
            'ship_to_address2 text,
            'ship_to_address3 text,
            'ship_to_city text NOT NULL,
            'ship_to_state text,
            'ship_via VARCHAR(10),
            'ship_zone text, 
            'ship_zone_actual text,
            'ship_weight FLOAT(13,4),
            'customer_po_no INT(50),
            'email_address VARCHAR()),
            'residential_address VARCHAR(),
            'cancel_reason_code VARCHAR(),
            'freight_calculation_method TEXT(),
            'fob TEXT(), 
            'warehouse_code' VARCHAR(),
            'confirm_to' VARCHAR(),
            'comment text,
            'tax_schedule VARCHAR(),
            'terms_code INT(),
            'tax_exempt_no TEXT, 
            'rman_o text, 
            'job_no INT(50),
            'last_invoice_date DATETIME,
            'last_invoice_no INT(50),
            'check_no_for_deposit (),
            'lot_serial_lines_exist VARCHAR(),
            'salesperson_division_no VARCHAR(),
            'salesperson_no VARCHAR(),
            'split_commissions VARCHAR(),
            'salesperson_division_no2 INT(),
            'salesperson_no2 VARCHAR(),
            'salesperson_division_no3'  VARCHAR(),
            'salesperson_no3 VARCHAR(),
            'salesperson_division_no4' VARCHAR(),
            'salesperson_no4' VARCHAR(),
            'salesperson_divison_no5' VARCHAR(),
            'salesperson_no5' VARCHAR(),
            'ebm_user_type' VARCHAR(),
            'ebm_submission_type' VARCHAR(),
            'ebm_user_id_submitting_this_order' INT(200),
            'payment_type' text,
            'other_payment_type_ref_no' text,
            'payment_type_category' text,
            'fax_no' VARCHAR(20),
            'crm_user_id' INT(50),
            'crm_company_id' INT(50),
            'crm_person_id' INT(50),
            'crm_opportunity_id' INT(200),
            'taxable_subject_to_discount' DECIMAL(13,4),
            'non_taxaxble_subject_to_discount' DECIMAL(13,4),
            'tax_subj_to_disc_prcnt_tot_subj_to' DECIMAL(13,4),
            'discount_rate' DECIMAL(13,4),
            'discount_amt' DECIMAL(13,4),
            'taxable_amt' DECIMAL(13,4),
            'non_taxable_amt' DECIMAL(13,4),
            'sales_tax_amt' DECIMAL(13,4),
            'commission_rate' DECIMAL(13,4),
            'split_comm_rate2' DECIMAL(13,4),
            'split_comm_rate3' DECIMAL(13,4),
            'split_comm_rate4' DECIMAL(13,4),
            'split_comm_rate5' DECIMAL(13,4),
            'weight' FLOAT(13,3),
            'freight_amt' DECIMAL(13,4),
            'deposit_amt' DECIMAL(13,4),
            'date_created' DATETIME(30),
            'time_created' datetime,
            'user_created_key' text,
            'date_updated' DATETIME(30),
            'time_updated' FLOAT(20),
            'user_updated_key' FLOAT(20),
            'promoted_date' DATETIME(30),
            'udf_buyer_group' VARCHAR(20),
            'udf_so_status' VARCHAR(30),
            'udf_need_by_date' VARCHAR(30),
            'udf_ship_to_email' VARCHAR(60),
            'udf_corporate_name' VARCHAR(20),
            'Udf_project_name' text,
            'udf_ship_to_name' text,
            'udf_programmed' text,
            'udf_shippingnotes' text,
            'udf_shipby' text,
            'udf_picked' text,
            'udf_shipping_status' text,
            'udf_ship_to_email2' text,
            'udf_ship_to_email3' text,
            'udf_customername' text,
            'udf_tracking_number' VARCHAR(100),
            'udf_order_handling' text,
            'udf_comments' text,
            'udf_bin_location' text,
            'udf_ext_diff' text,
            'udf_free_shipping' text,
            'udf_tracking_number_2' VARCHAR(100),
            'udf_type' text,
            'udf_site_code' VARCHAR(200),
            'udf_promo_code' text,
            'udf_phone_number' VARCHAR(15),
            'udf_woid' text,
            'udf_contract_charges' DECIMAL(13,4),
            'udf_published_charges' DECIMAL(13,4),
            'udf_project_type' text,
            PRIMARY KEY  ('sales_order_no')
            ) $charset_collate;";


            require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
            
            dbDelta($sql);

            //Maybe create table creates the table in database if it doesn't already exist
            maybe_create_table('sage_sales_orders', $sql);
    }
    //in order to activate plugin, add activation hook
     register_activation_hook(__FILE__, 'create_sage_sales_orders_table')  ; 
     add_action('admin_init', 'create_sage_sales_orders_table');

;?>