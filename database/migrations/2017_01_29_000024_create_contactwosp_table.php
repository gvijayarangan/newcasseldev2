<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatecontactwospTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE PROCEDURE `GetContactWoDetails`(contact_resident_id int) 
                        BEGIN 
                         select `orders`.`id` AS `wo_id`,concat(`users`.`f_name`,\' \',`users`.`l_name`) 
                         AS `created_by`,`orders`.`order_date_created` AS `created_date_time`,`orders`.`requestor_name` 
                         AS `requestor_name`,`centers`.`cntr_name` AS `center_name`,`apartments`.`apt_number` AS `apartment_number`,`comareas`.`ca_name` 
                         AS `common_area_name`,concat(`residents`.`res_fname`,\' \',`residents`.`res_lname`) AS `resident_name`,`issuetypes`.`issue_typename` 
                         AS `issue_type`,`orders`.`order_status` AS `status`,
                        (select concat(`users`.`f_name`,\' \',`users`.`l_name`) from `users` where (`orders`.`updated_by`= `users`.`id`)) as changed_by,
                        `orders`.`updated_at` AS `changed_time`,`orders`.`order_priority` AS `priority`,`orders`.`order_total_cost` 
                         AS `total_cost`,(select concat(`users`.`f_name`,\' \',`users`.`l_name`) from `users` where (`assignorders`.`user_id` = `users`.`id`)) 
                         AS `assign_to` from (((((((`orders` left join `apartments` on((`orders`.`apt_id` = `apartments`.`id`))) 
                         left join `centers` on((`orders`.`cntr_id` = `centers`.`id`))) left join `assignorders` on((`orders`.`id` = `assignorders`.`order_id`))) 
                         left join `users` on((`orders`.`user_id` = `users`.`id`))) left join `issuetypes` on((`orders`.`issue_type` = `issuetypes`.`id`))) 
                         left join `residents` on((`orders`.`resident_id` = `residents`.`id`))) left join `comareas` on((`orders`.`ca_id` = `comareas`.`id`)))
                         WHERE `orders`.`order_status` != \'Close\' AND `orders`.`user_id`=contact_resident_id ORDER BY `created_date_time` DESC;
                         END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS GetContactWoDetails');
    }
}