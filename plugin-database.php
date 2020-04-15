<?php
    /* Plugin Name: Sales Order Database Plugin 
    Description: plugin creates a table for sage sales orders*/
    
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
    //Declare function that creates a table for sage sales orders; public to be accessed/available
    function create_sage_sales_orders_table(){
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
        //instantiate global object/class that talks to WP database
        global $wpdb;
        $wpdb->show_errors();
        //create charset collate
        $charset_collate = $wpdb->get_charset_collate();
        //create table name (best practice)
        $table = $wpdb->prefix . 'sage_sales_orders';
        
        
        
        //create sql table
        $sql = "CREATE TABLE $table(
            `sales_order_no` VARCHAR(20) UNIQUE NOT NULL,
            PRIMARY KEY  (`sales_order_no`)
            ) $charset_collate;";
        

            
            

            //Maybe create table creates the table in database if it doesn't already exist
            maybe_create_table('sage_sales_orders', $sql);

    }
    //in order to activate plugin, add activation hook
     
     add_action('admin_init', 'create_sage_sales_orders_table');

