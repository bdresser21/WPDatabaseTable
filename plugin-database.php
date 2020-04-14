<?php
    /* Plugin Name: Sales Order Database Plugin */

    //Declare function that creates a table for sage sales orders; public to be accessed/available
    public function create_sage_sales_orders_table(){
        
        //instantiate global object/class that talks to WP database
        global $wpdb ;

        
        $sql = "CREATE TABLE SageSalesOrders(
            
            sales_order_no VARCHAR(20) NOT NULL,
            order_date TIMESTAMP(25),
            order_status VARCHAR(), 
            master_repeating_order_no (),
            ar_division_no VARCHAR(),
            customer_no VARCHAR(),
            bill_to_division_no(),**
            bill_to_customer_no VARCHAR(),
            bill_to_name VARCHAR() NOT NULL,
            bill_to_address1 VARCHAR() NOT NULL,
            bill_to_address2 VARCHAR(),
            bill_to_address3 VARCHAR(),
            bill_to_city VARCHAR() NOT NULL,
            bill_to_state VARCHAR() NOT NULL,
            bill_to_zip_code VARCHAR() NOT NULL,
            bill_to_country_code VARCHAR() NOT NULL,
            ship_to_code VARCHAR(),
            ship_to_name VARCHAR(),
            ship_to_address1 VARCHAR(),
            ship_to_address2 VARCHAR(),
            ship_to_address3 VARCHAR(),
            ship_to_city VARCHAR() NOT NULL,
            ship_to_state VARCHAR(2),
            ship_via VARCHAR(10),
            ship_zone VARCHAR(), **
            ship_zone_actual (),
            ship_weight INT(),
            customer_po_no INT(),
            email_address VARCHAR()),
            residential_address VARCHAR(),
            cancel_reason_code VARCHAR(),
            freight_calculation_method VARCHAR(),
            fob (), **
            warehouse_code VARCHAR(),
            confirm_to VARCHAR(),
            comment VARCHAR(),
            tax_schedule VARCHAR(),
            terms_code INT(),
            tax_exempt_no(), **
            rman_o(), **
            job_no INT(),
            last_invoice_date DATETIME(),
            last_invoice_no INT(),
            check_no_for_deposit (),
            lot_serial_lines_exist VARCHAR(),
            salesperson_division_no VARCHAR(),
            salesperson_no VARCHAR(),
            split_commissions VARCHAR(),
            salesperson_division_no2 INT(),
            salesperson_no2 VARCHAR(),
            salesperson_division_no3  VARCHAR(),
            salesperson_no3 VARCHAR(),
            salesperson_division_no4 VARCHAR(),
            salesperson_no4 VARCHAR(),
            salesperson_divison_no5 VARCHAR(),
            salesperson_no5 VARCHAR(),
            ebm_user_type VARCHAR(),
            ebm_submission_type VARCHAR(),
            ebm_user_id_submitting_this_order VARCHAR(),
            payment_type VARCHAR(),
            other_payment_type_ref_no VARCHAR(),
            payment_type_category VARCHAR(),
            fax_no VARCHAR(20),
            crm_user_id INT(),
            crm_company_id INT(),
            crm_person_id INT(),
            crm_opportunity_id INT(),
            taxable_subject_to_discount FLOAT(),
            non_taxaxble_subject_to_discount FLOAT(),
            tax_subj_to_disc_prcnt_tot_subj_to FLOAT(),
            discount_rate FLOAT(),
            discount_amt FLOAT(),
            taxable_amt FLOAT(),
            non_taxable_amt FLOAT(),
            sales_tax_amt FLOAT(),
            commission_rate FLOAT(),
            split_comm_rate2 FLOAT(),
            split_comm_rate3 FLOAT(),
            split_comm_rate4 FLOAT(),
            split_comm_rate5 FLOAT(),
            weight FLOAT(),
            freight_amt FLOAT(),
            deposit_amt FLOAT(),
            date_created DATETIME(30),
            time_created FLOAT(),
            user_created_key VARCHAR(),
            date_updated DATETIME(30),
            time_updated FLOAT(20),
            user_updated_key FLOAT(20),
            promoted_date DATETIME(30),
            udf_buyer_group VARCHAR(20),
            udf_so_status VARCHAR(30),
            udf_need_by_date VARCHAR(30),
            udf_ship_to_email VARCHAR(60),
            udf_corporate_name VARCHAR(20),
            Udf_project_name VARCHAR(),
            udf_ship_to_name VARCHAR(),
            udf_programmed VARCHAR(),
            udf_shippingnotes VARCHAR(),
            udf_shipby VARCHAR(7),
            udf_picked (),
            udf_shipping_status VARCHAR(20),
            udf_ship_to_email2 VARCHAR(),
            udf_ship_to_email3 VARCHAR(),
            udf_customername VARCHAR(),
            udf_tracking_number VARCHAR(),
            udf_order_handling (),
            udf_comments TEXT(),
            udf_bin_location (),
            udf_ext_diff FLOAT(),
            udf_free_shipping (),
            udf_tracking_number_2 (),
            udf_type (),
            udf_site_code (),
            udf_promo_code (),
            udf_phone_number (),
            udf_woid (),
            udf_contract_charges FLOAT(),
            udf_published_charges FLOAT(),
            udf_project_type VARCHAR(),

            )";

            do_action( 'admin_init' );
    }


;?>