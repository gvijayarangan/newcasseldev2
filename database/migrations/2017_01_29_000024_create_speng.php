<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class speng extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE FUNCTION GetEngineerWoDetails (eng_user_id INTEGER)
RETURNS INTEGER AS $$

BEGIN
SELECT orders.id 
   AS wo_id,concat(users.f_name,' ',users.l_name) 
   AS created_by,orders.order_date_created
   AS created_date_time,orders.requestor_name 
   AS requestor_name,centers.cntr_name 
   AS center_name,apartments.apt_number 
   AS apartment_number,comareas.ca_name 
   AS common_area_name,concat(residents.res_fname,' ',residents.res_lname) 
   AS resident_name,issuetypes.issue_typename
   AS issue_type,orders.order_status 
   AS status,orders.last_status_modified
   AS changed_by,orders.last_status_modified_time 
   AS changed_time,orders.order_priority
   AS priority,orders.order_total_cost 
   AS total_cost,(select concat(users.f_name,' ',users.l_name) 
FROM users 
WHERE (assignorders.user_id = users.id)) 
   AS assign_to from (((((((orders
   LEFT JOIN apartments 
   ON((orders.apt_id = apartments.id))) 
   LEFT JOIN centers
   ON((orders.cntr_id = centers.id))) 
   LEFT JOIN assignorders
   ON((orders.id = assignorders.order_id))) 
   LEFT JOIN users
   ON((orders.user_id = users.id))) 
   LEFT JOIN issuetypes on((orders.issue_type = issuetypes.id))) 
   LEFT JOIN residents on((orders.resident_id = residents.id))) 
   LEFT JOIN comareas on((orders.ca_id = comareas.id))) 
WHERE orders.order_status != 'Close' 
  AND assignorders.user_id = eng_user_id 
   OR orders.id NOT IN (SELECT assignorders.order_id FROM assignorders);
 RETURN orders.id ;
   END; $$
   LANGUAGE PLPGSQL;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP FUNCTION IF EXISTS GetEngineerWoDetails');
    }
}