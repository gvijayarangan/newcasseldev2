<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW get_order_details AS
            select orders.id AS wo_id,concat(users.f_name,' ',users.l_name) 
            AS created_by, orders.order_date_created 
            AS created_date_time,centers.cntr_name 
            AS center_name, apartments.apt_number 
            AS apartment_number,comareas.ca_name 
            AS common_area_name,concat(residents.res_fname,' ',residents.res_lname) 
            AS resident_name,issuetypes.issue_typename
            AS issue_type, orders.order_status
            AS status, orders.last_status_modified
            AS changed_by,orders.last_status_modified_time
            AS changed_time, orders.order_priority 
            AS priority, orders.order_total_cost 
            AS total_cost,
            (select concat(users.f_name,' ',users.l_name) 
            from users
            where (assignorders.user_id = users.id)) 
            AS assign_to from (((((((orders 
            left join apartments 
            on((orders.apt_id = apartments.id))) 
            join centers on((apartments.cntr_id = centers.id))) 
            join assignorders on((orders.id = assignorders.order_id))) 
            join users on((orders.user_id = users.id))) 
            join issuetypes on((orders.issue_type = issuetypes.id))) 
            join residents on((orders.resident_id = residents.id))) 
            left join comareas on((orders.ca_id = comareas.id)));
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS get_order_details');
    }

}