<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateengineerwospTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE PROCEDURE`GetEngineerWoDetails`(eng_user_id int)  
                        BEGIN 
                         select `newcassel`.`orders`.`id` 
                         AS `wo_id`,concat(`newcassel`.`users`.`f_name`,\' \',`newcassel`.`users`.`l_name`) 
                         AS `created_by`,`newcassel`.`orders`.`order_date_created` 
                         AS `created_date_time`,`newcassel`.`orders`.`requestor_name` AS `requestor_name`,`newcassel`.`centers`.`cntr_name` 
                         AS `center_name`,`newcassel`.`apartments`.`apt_number` AS `apartment_number`,`newcassel`.`comareas`.`ca_name` 
                         AS `common_area_name`,concat(`newcassel`.`residents`.`res_fname`,\' \',`newcassel`.`residents`.`res_lname`) 
                         AS `resident_name`,`newcassel`.`issuetypes`.`issue_typename` AS `issue_type`,`newcassel`.`orders`.`order_status` 
                         AS `status`,(select concat(`newcassel`.`users`.`f_name`,\' \',`newcassel`.`users`.`l_name`) 
                                       from `newcassel`.`users` where (`newcassel`.`orders`.`updated_by` = `newcassel`.`users`.`id`)) 
                         AS `changed_by`,`newcassel`.`orders`.`updated_at` AS `changed_time`,`newcassel`.`orders`.`order_priority` 
                         AS `priority`,`newcassel`.`orders`.`order_total_cost` 
                         AS `total_cost`,(select concat(`newcassel`.`users`.`f_name`,\' \',`newcassel`.`users`.`l_name`) 
                                           from `newcassel`.`users` where (`newcassel`.`assignorders`.`user_id` = `newcassel`.`users`.`id`)) 
                         AS `assign_to` from (((((((`newcassel`.`orders` 
                         left join `newcassel`.`apartments` on((`newcassel`.`orders`.`apt_id` = `newcassel`.`apartments`.`id`))) 
                         left join `newcassel`.`centers` on((`newcassel`.`orders`.`cntr_id` = `newcassel`.`centers`.`id`))) 
                         left join `newcassel`.`assignorders` on((`newcassel`.`orders`.`id` = `newcassel`.`assignorders`.`order_id`))) 
                         left join `newcassel`.`users` on((`newcassel`.`orders`.`user_id` = `newcassel`.`users`.`id`))) 
                         left join `newcassel`.`issuetypes` on((`newcassel`.`orders`.`issue_type` = `newcassel`.`issuetypes`.`id`))) 
                         left join `newcassel`.`residents` on((`newcassel`.`orders`.`resident_id` = `newcassel`.`residents`.`id`))) 
                         left join `newcassel`.`comareas` on((`newcassel`.`orders`.`ca_id` = `newcassel`.`comareas`.`id`))) 
                         where `newcassel`.`orders`.`order_status`= \'CLOSE\' AND `newcassel`.`assignorders`.`user_id`=eng_user_id;
                         END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS GetEngineerWoDetails');
    }
}