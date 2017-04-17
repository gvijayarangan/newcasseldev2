<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;
use App\Apartment;
use App\Aptresi;
use App\Assignorder;
use App\Center;
use App\Comment;
use App\Comarea;
use App\Conresi;
use App\Equipment;
use App\Equiporder;
use App\Notification;
use App\Order;
use App\Rescontact;
use App\Resident;


class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create([ 'f_name' => 'Administrator','m_name' => 'test', 'l_name' => 'Administrator', 'password' => bcrypt('secret'), 'email' => 'admin@unomaha.edu', 'active' => true,
           'comment' => 'test', 'cell' => '9876789879', 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);

        User::create([ 'f_name' => 'Gopinath','m_name' => 'test', 'l_name' => 'Vijayarangan', 'password' => bcrypt('secret'), 'email' => 'gvijayarangan@unomaha.edu', 'active' => true,
            'comment' => 'test', 'cell' => '9876789879', 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);

        User::create([ 'f_name' => 'Walter','m_name' => 'test', 'l_name' => 'White', 'password' => bcrypt('secret'), 'email' => 'walter@unomaha.edu', 'active' => true,
            'comment' => 'test', 'cell' => '9876789879', 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);

        User::create([ 'f_name' => 'Flynn','m_name' => 'test', 'l_name' => 'Jr', 'password' => bcrypt('secret'), 'email' => 'flynn@unomaha.edu', 'active' => true,
            'comment' => 'test', 'cell' => '9876789879', 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);

        User::create([ 'f_name' => 'Korvah','m_name' => 'test', 'l_name' => ' ', 'password' => bcrypt('secret'), 'email' => 'tkorvah@unomaha.edu', 'active' => true,
            'comment' => 'test', 'cell' => '9876789879', 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);

        User::create([ 'f_name' => 'Anjani','m_name' => 'test', 'l_name' => 'Danthuluri', 'password' => bcrypt('secret'), 'email' => 'anjani@unomaha.edu', 'active' => true,
            'comment' => 'test', 'cell' => '9876789879', 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);

        User::create([ 'f_name' => 'Prakruthi','m_name' => 'test', 'l_name' => 'V', 'password' => bcrypt('secret'), 'email' => 'Prakruthi.vishwanath@gmail.com', 'active' => true,
            'comment' => 'test', 'cell' => '9876789879', 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);

    }
}


class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();
        Role::create([ 'name' => 'admin', 'display_name' => 'Administrator', 'description' => 'User is allowed to manage and edit other users or work order',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Role::create([ 'name' => 'engineer', 'display_name' => 'Engineer', 'description' => 'Engineer is allowed to read a work order and update it',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Role::create([ 'name' => 'employee', 'display_name' => 'Employee', 'description' => 'Employee is allowed to raise a work order for a user and see all tasks',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Role::create([ 'name' => 'contact', 'display_name' => 'Contact', 'description' => 'Contact is allowed to raise a work order',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permissions')->delete();
        Permission::create([ 'name' => 'manage-users', 'display_name' => 'Manage Users', 'description' => 'User is allowed to add, edit and delete other users',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Permission::create([ 'name' => 'manage-roles', 'display_name' => 'Manage Roles', 'description' => 'User is allowed to add, edit and delete roles',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Permission::create([ 'name' => 'manage-work-order', 'display_name' => 'Manage Work Order', 'description' => 'User is allowed to add, edit and delete work order',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Permission::create([ 'name' => 'edit-work-order', 'display_name' => 'Edit Work Order', 'description' => 'User is allowed to add and edit work order',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Permission::create([ 'name' => 'readonly-all', 'display_name' => 'Readonly', 'description' => 'User is allowed to create a work order and check the status',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}

class RoleUserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('role_user')->delete();

        $user = User::where('f_name', '=', 'Administrator')->first()->id;
        $role = Role::where('name', '=', 'admin')->first()->id;
        $role_user = [ ['role_id' => $role, 'user_id' => $user, 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create() ] ];
        DB::table('role_user')->insert($role_user);

         $user = User::where('f_name', '=', 'Gopinath')->first()->id;
         $role = Role::where('name', '=', 'admin')->first()->id;
         $role_user = [ ['role_id' => $role, 'user_id' => $user, 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create() ] ];
         DB::table('role_user')->insert($role_user);

        $user = User::where('f_name', '=', 'Prakruthi')->first()->id;
        $role = Role::where('name', '=', 'engineer')->first()->id;
        $role_user = [ ['role_id' => $role, 'user_id' => $user, 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create() ] ];
        DB::table('role_user')->insert($role_user);


        $user = User::where('f_name', '=', 'Korvah')->first()->id;
        $role = Role::where('name', '=', 'admin')->first()->id;
        $role_user = [ ['role_id' => $role, 'user_id' => $user, 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create() ] ];
        DB::table('role_user')->insert($role_user);

        $user = User::where('f_name', '=', 'Anjani')->first()->id;
        $role = Role::where('name', '=', 'admin')->first()->id;
        $role_user = [ ['role_id' => $role, 'user_id' => $user, 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create() ] ];
        DB::table('role_user')->insert($role_user);

        $user = User::where('f_name', '=', 'Walter')->first()->id;
        $role = Role::where('name', '=', 'contact')->first()->id;
        $role_user = [ ['role_id' => $role, 'user_id' => $user, 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create() ] ];
        DB::table('role_user')->insert($role_user);

        $user = User::where('f_name', '=', 'Flynn')->first()->id;
        $role = Role::where('name', '=', 'contact')->first()->id;
        $role_user = [ ['role_id' => $role, 'user_id' => $user, 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create() ] ];
        DB::table('role_user')->insert($role_user);

    }
}


class UsersRolesPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manageUsers = Permission::where('name', '=', 'manage-users')->first();
        $manageRoles = Permission::where('name', '=', 'manage-roles')->first();
        $manageWorkOrder = Permission::where('name', '=', 'manage-work-order')->first();
        $editWorkOrder = Permission::where('name', '=', 'edit-work-order')->first();
        $readonlyAll = Permission::where('name', '=', 'readonly-all')->first();

        $adminRole = Role::where('name', '=', 'admin')->first();
        $adminRole->attachPermissions(array($manageUsers, $manageRoles));

        $engineerRole = Role::where('name', '=', 'admin')->first();
        $engineerRole->attachPermissions(array($manageWorkOrder));

        $basicEmpRole = Role::where('name', '=', 'admin')->first();
        $basicEmpRole->attachPermissions(array($editWorkOrder));

        $contactRole = Role::where('name', '=', 'contact')->first();
        $contactRole->attachPermissions(array($readonlyAll));
    }
}

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
          
                'noti_type' => 'New Account Setup', 'noti_alert_content' => 'Hello, Your account has been created. Welcome to New Cassel Work Order System! Use the below link to create a new password and to login into our system.',
                'noti_status' => 'Active', 'noti_email_title' => 'Welcome to New Cassel Center',
            ]);
        DB::table('notifications')->insert([
            'noti_type' => 'Work Order Create', 'noti_alert_content' => 'Hello, You have created a new work order. Login to our work order system to track the status.',
            'noti_status' => 'Active', 'noti_email_title' => 'New Cassel Work Order Created',
        ]);
        DB::table('notifications')->insert([
            'noti_type' => 'Work Order Update', 'noti_alert_content' => 'Hello, Your work order has been completed. Thanks.',
            'noti_status' => 'Active', 'noti_email_title' => 'New Cassel Work Order Update - Completed',
        ]);
        DB::table('notifications')->insert([
            'noti_type' => 'Work Order Close', 'noti_alert_content' => 'Hello, Your work order has been closed. Thanks.',
            'noti_status' => 'Active', 'noti_email_title' => 'New Cassel Work Order Closed',
        ]);
        DB::table('notifications')->insert([
            'noti_type' => 'Password Reset', 'noti_alert_content' => 'Hello, Welcome to New Cassel Work Order System! Click below link to reset your password. ',
            'noti_status' => 'Active', 'noti_email_title' => 'New Cassel Work Order System password reset',
        ]);
    }
}

class ResidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('residents')->insert([
            'res_pccid' => '1234', 'res_fname' => 'Ken', 'res_mname' => '', 'res_lname' => 'Adams', 'res_gender' => 'Male', 'res_homephone' => '4021231234', 'res_cellphone' => '4021111111',
            'res_email' => 'kenn@gmail.com', 'res_comment' => 'No entry without permission', 'res_status' => 'Active', 'res_apt_id' => 101 , 'res_cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);
        DB::table('residents')->insert([
            'res_pccid' => '1235', 'res_fname' => 'Nancy', 'res_mname' => 'Yong', 'res_lname' => 'Adams', 'res_gender' => 'Female', 'res_homephone' => '4021231235', 'res_cellphone' => '4021111112',
            'res_email' => 'Nancy@gmail.com', 'res_comment' => 'Knock the door three times', 'res_status' => 'Active', 'res_apt_id' => 101 , 'res_cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);
        DB::table('residents')->insert([
            'res_pccid' => '1236', 'res_fname' => 'Billy', 'res_mname' => '', 'res_lname' => 'King', 'res_gender' => 'Male', 'res_homephone' => '4021231236', 'res_cellphone' => '4021111113',
            'res_email' => 'Billy@gmail.com', 'res_comment' => 'Call before entry', 'res_status' => 'Active', 'res_apt_id' => 102 , 'res_cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);
        DB::table('residents')->insert([
            'res_pccid' => '1237', 'res_fname' => 'Emily', 'res_mname' => "O'Hara", 'res_lname' => 'King', 'res_gender' => 'Female', 'res_homephone' => '4021231237', 'res_cellphone' => '4021111114',
            'res_email' => 'Emily@gmail.com', 'res_comment' => 'Entry after 4:00 PM', 'res_status' => 'Active', 'res_apt_id' => 102 , 'res_cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);
        DB::table('residents')->insert([
            'res_pccid' => '1238', 'res_fname' => 'Joe', 'res_mname' => '', 'res_lname' => 'Edward', 'res_gender' => 'Male', 'res_homephone' => '4021231238', 'res_cellphone' => '4021111115',
            'res_email' => 'Joe@gmail.com', 'res_comment' => 'Entry before noon', 'res_status' => 'Active', 'res_apt_id' => 103 , 'res_cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);

    }
}

class RescontactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rescontacts')->delete();


        DB::table('rescontacts')->insert([
            'con_fname' => 'Josh', 'con_mname' => ' ', 'con_lname' => 'Adams', 'con_relationship' => 'Son', 'con_cellphone' => '4021221111', 'con_email' => 'Jadams@abc.com',
            'con_comment' => 'Visit Ken every week', 'con_gender' => 'Male', 'con_res_id' => ($resident = Resident::where('res_fname', '=', 'Ken')->first()->id)
        ]);
        DB::table('rescontacts')->insert([
            'con_fname' => 'Angel', 'con_mname' => 'King', 'con_lname' => 'Frank', 'con_relationship' => 'Daughter', 'con_cellphone' => '4020012232', 'con_email' => 'Jadams@abc.com',
            'con_comment' => 'Angel is in charge all things of Billy', 'con_gender' => 'Female', 'con_res_id' => ($resident = Resident::where('res_fname', '=', 'Billy')->first()->id)
        ]);
        DB::table('rescontacts')->insert([
            'con_fname' => 'Branden', 'con_mname' => ' ', 'con_lname' => 'Bass', 'con_relationship' => 'Son', 'con_cellphone' => '4021112546', 'con_email' => '',
            'con_comment' => '', 'con_gender' => 'Male', 'con_res_id' => ($resident = Resident::where('res_fname', '=', 'Emily')->first()->id)
        ]);
        DB::table('rescontacts')->insert([
            'con_fname' => 'Jamie', 'con_mname' => ' ', 'con_lname' => 'Knight', 'con_relationship' => 'Daughter', 'con_cellphone' => '4025554567', 'con_email' => '',
            'con_comment' => '', 'con_gender' => 'Female', 'con_res_id' => ($resident = Resident::where('res_fname', '=', 'Nancy')->first()->id)
        ]);

    }
}

class CentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('centers')->insert([
            'cntr_name' => 'Aksarben', 'cntr_add1' => '3001 Dodge', 'cntr_add2' => '31st ST', 'cntr_city' => 'Omaha', 'cntr_state' => 'NE', 'cntr_zip' => '68105', 'cntr_phone' =>'98787',
            'cntr_fax' => '234567', 'cntr_comments' => 'test',
        ]);
        DB::table('centers')->insert([
            'cntr_name' => '90th', 'cntr_add1' => '900 North 90th Street', 'cntr_add2' => ' ', 'cntr_city' => 'Omaha', 'cntr_state' => 'NE', 'cntr_zip' => '08114', 'cntr_phone' =>'4023932277',
            'cntr_fax' => ' ', 'cntr_comments' => 'This is the New Cassel\'s First Center',
        ]);
    }
}

class EquipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipments')->insert([
            'equ_type' => 'Fan', 'equ_name' => 'Crompton greaves fan', 'equ_comment' => 'test',
        ]);
        DB::table('equipments')->insert([
            'equ_type' => 'Bulb', 'equ_name' => 'Philips power saver', 'equ_comment' => 'test',
        ]);
    }
}

class ConresisTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('conresis')->delete();


        DB::table('conresis')->insert([
            'res_id' => ($Resident = Resident::where('res_fname', '=', 'John')->first()->id) ,
            'con_id' => ($Rescontact = Rescontact::where('con_fname', '=', 'Walter')->first()->id) ,
        ]);

        DB::table('conresis')->insert([
            'res_id' => ($Resident = Resident::where('res_fname', '=', 'David')->first()->id) ,
            'con_id' => ($Rescontact = Rescontact::where('con_fname', '=', 'Flynn')->first()->id) ,
        ]);
    }
}

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('apartments')->delete();


        DB::table('apartments')->insert([
            'apt_floornumber' => 1 , 'apt_number' => '101', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);
        DB::table('apartments')->insert([
            'apt_floornumber' => 1 , 'apt_number' => '102', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);
        DB::table('apartments')->insert([
            'apt_floornumber' => 1 , 'apt_number' => '103', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);
        DB::table('apartments')->insert([
            'apt_floornumber' => 1 , 'apt_number' => '104', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);
        DB::table('apartments')->insert([
            'apt_floornumber' => 1 , 'apt_number' => '105', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);
//        DB::table('apartments')->insert([
//            'apt_floornumber' => 1 , 'apt_number' => '106', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
//        ]);
//        DB::table('apartments')->insert([
//            'apt_floornumber' => 1 , 'apt_number' => '107', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
//        ]);
//        DB::table('apartments')->insert([
//            'apt_floornumber' => 1 , 'apt_number' => '108', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
//        ]);
//        DB::table('apartments')->insert([
//            'apt_floornumber' => 1 , 'apt_number' => '109', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
//        ]);
//        DB::table('apartments')->insert([
//            'apt_floornumber' => 1 , 'apt_number' => '110', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
//        ]);

    }
}

class AptresisTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('aptresis')->delete();


        DB::table('aptresis')->insert([
            'apt_id' => ($apartment = Apartment::where('apt_number', '=', '1')->first()->id) , 'res_id' => ($resident = Resident::where('res_fname', '=', 'John')->first()->id), 'start_date' => date_create(),  'end_date' => date_create(),
        ]);

        DB::table('aptresis')->insert([
            'apt_id' => ($apartment = Apartment::where('apt_number', '=', '2')->first()->id) , 'res_id' => ($resident = Resident::where('res_fname', '=', 'David')->first()->id), 'start_date' => date_create(),  'end_date' => date_create(),
        ]);

    }
}

class ComareasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comareas')->insert([
            'ca_name' => 'Swimming Pool', 'ca_comments' => '', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);
        DB::table('comareas')->insert([
            'ca_name' => 'Library', 'ca_comments' => '', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);
        DB::table('comareas')->insert([
            'ca_name' => 'Dinning Room', 'ca_comments' => '', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);
        DB::table('comareas')->insert([
            'ca_name' => 'Elevator', 'ca_comments' => '', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);
        DB::table('comareas')->insert([
            'ca_name' => 'Game Room', 'ca_comments' => '', 'cntr_id' => ($center = Center::where('cntr_name', '=', '90th')->first()->id) ,
        ]);

    }
}

class ToolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tools')->insert([
            'tool_name' => 'Allen Wrench Set', 'tool_comment' => ' ',
        ]);
        DB::table('tools')->insert([
            'tool_name' => 'Circular Saw', 'tool_comment' => ' ',
        ]);
        DB::table('tools')->insert([
            'tool_name' => 'Crescent Wrench', 'tool_comment' => ' ',
        ]);
        DB::table('tools')->insert([
            'tool_name' => 'Drain Plunger', 'tool_comment' => ' ',
        ]);
        DB::table('tools')->insert([
            'tool_name' => 'Drain Snake', 'tool_comment' => ' ',
        ]);
        DB::table('tools')->insert([
            'tool_name' => 'Electrical Tape', 'tool_comment' => ' ',
        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Hack Saw', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Hammer', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Hedge Trimmer', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Hose', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Jig Saw', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Ladder - 10’', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Ladder - 8’', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Ladder – Extension', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Ladder – Step', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Leaf Blower', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Leaf Rake', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Monkey Wrench', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Nails', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Paint Brush', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Paint Roller', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Picture Frame Wire', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Picture Nails', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Screwdriver', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Screws', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Shovel', 'tool_comment' => ' ',
//        ]);
//        DB::table('tools')->insert([
//            'tool_name' => 'Snow Blower', 'tool_comment' => ' ',
//        ]);

    }
}

class SuppliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplies')->insert([
            'sup_name' => 'Actuator', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
        ]);
        DB::table('supplies')->insert([
            'sup_name' => 'Arial Unit', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
        ]);
        DB::table('supplies')->insert([
            'sup_name' => 'Ballast', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
        ]);
        DB::table('supplies')->insert([
            'sup_name' => 'Base Board', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
        ]);
        DB::table('supplies')->insert([
            'sup_name' => 'Bathroom Exhaust Fan', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
        ]);
        DB::table('supplies')->insert([
            'sup_name' => 'Batteries – 9 volt', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Batteries - AA', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Batteries - AAA', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Batteries – Arial Disc/Arial Pendent', 'sup_unitprice' => 6.97, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Bi-Fold Door', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Boiler', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Bolts/Nuts', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Cabinetry', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Cabinet Knobs', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Carpet', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Caulking', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Closet Door', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Countertop', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Curtain Rod', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Door', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Door Casing', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Door Closer', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Door Hinges', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Door Knob', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Door Stop', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Door Strike Plate', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Drain Cleaner', 'sup_unitprice' => 10, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => '', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Drain Extension', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Electrical Outlets', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Electrical Panel/Breaker', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Electrical Switches', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Electrical Wiring', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Fan Coil Condensation Drain', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Fan Coil Motor', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Fan Coil Motor Mount', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Fan Coil Unit', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Faucet', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Faucet Aerator', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Flooring Transition', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Garage Door Opener', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Garage Touch-pad', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Grab Bar', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Heat Pump', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Heat Lamp', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Hood Vent', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Hot Water Pumps', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'HVAC Filters', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Kitchen Cook Top', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Light Bulb – Exterior', 'sup_unitprice' => 5.99 , 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Light Fixture', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Medicine Cabinet', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Microwave', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Mirror', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Paint', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Parking Lot Lights', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'P-Trap', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Plumbing Supply', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Quarter Round Trim', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Refrigerator', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Screws', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Shelving', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Shower', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Shower Curtain', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Shower Head', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Shower Hose', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Sink Stopper', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Thermostat', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Threshold', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Toilette Flapper', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Toilette Paper Holder', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Toilette Seat', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Toilette Valve/Float', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Toilette Wax Seal', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'TV Cable', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'TV Mini Box', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Vinyl Flooring', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Window', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Window Blind', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Window Curtain/Rod', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Window Screen', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Wood Filler/Putty', 'sup_unitprice' => 3.66, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Wood Lacquer', 'sup_unitprice' => 8.99, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Wood Stain', 'sup_unitprice' => 4.55, 'sup_comment' => 'test',
//        ]);
//        DB::table('supplies')->insert([
//            'sup_name' => 'Wood', 'sup_unitprice' => 5.99, 'sup_comment' => 'test',
//        ]);

    }
}

class IssuetypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('issuetypes')->insert([
            'issue_typename' => 'Plumbing—FLOOD',  'issue_description' => 'Emergency Flooding',
        ]);
        DB::table('issuetypes')->insert([
            'issue_typename' => 'Plumbing—nonemergency',  'issue_description' => 'Not emergency plumbing problems',
        ]);
        DB::table('issuetypes')->insert([
            'issue_typename' => 'Electrical—bulbs',  'issue_description' => 'Light bulbs broken',
        ]);
        DB::table('issuetypes')->insert([
            'issue_typename' => 'Electrical—other',  'issue_description' => 'All other electrical problems than light bulbs',
        ]);
        DB::table('issuetypes')->insert([
            'issue_typename' => 'Ceiling tile',  'issue_description' => 'All Ceiling tile problems',
        ]);
        DB::table('issuetypes')->insert([
            'issue_typename' => 'Paint',  'issue_description' => 'All Painting problems',
        ]);
        DB::table('issuetypes')->insert([
            'issue_typename' => 'HVAC',  'issue_description' => 'All HAVC problems',
        ]);
    }
}
class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();


        DB::table('orders')->insert([
            'user_id' => ($user = User::where('f_name', '=', 'Walter')->first()->id) , 'apt_id' => ($apartment = Apartment::where('apt_number', '=', '1')->first()->id),
            'ca_id' => ($comarea = Comarea::where('ca_name', '=', 'N/A')->first()->id) , 'order_description' => 'Change bulb in bed room', 'order_date_created' => date_create(),
            'order_priority' => 'High', 'order_status' => 'Inprog',
        ]);

        DB::table('orders')->insert([
            'user_id' => ($user = User::where('f_name', '=', 'Flynn')->first()->id) , 'apt_id' => ($apartment = Apartment::where('apt_number', '=', '2')->first()->id),
            'ca_id' => ($comarea = Comarea::where('ca_name', '=', 'N/A')->first()->id) , 'order_description' => 'Change fan', 'order_date_created' => date_create(),
            'order_priority' => 'Medium', 'order_status' => 'Open',
        ]);

        DB::table('orders')->insert([
            'user_id' => ($user = User::where('f_name', '=', 'Korvah')->first()->id) , 'apt_id' => ($apartment = Apartment::where('apt_number', '=', '5')->first()->id),
            'ca_id' => ($comarea = Comarea::where('ca_name', '=', 'Gym')->first()->id) , 'order_description' => 'test order', 'order_date_created' => date_create(),
            'order_priority' => 'Medium', 'order_status' => 'closed',
        ]);

    }
}

class AssignordersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assignorders')->delete();


        DB::table('assignorders')->insert([
            'user_id' => ($user = User::where('f_name', '=', 'Walter')->first()->id) ,'order_id' => ($order = Order::where('order_description', '=', 'Change bulb in bed room')->first()->id),
        ]);

        DB::table('assignorders')->insert([
            'user_id' => ($user = User::where('f_name', '=', 'Flynn')->first()->id) ,'order_id' => ($order = Order::where('order_description', '=', 'Change fan')->first()->id),
        ]);

        DB::table('assignorders')->insert([
            'user_id' => ($user = User::where('f_name', '=', 'Korvah')->first()->id) ,'order_id' => ($order = Order::where('order_description', '=', 'test order')->first()->id),
        ]);


    }
}

class EquipordersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('equiporders')->delete();

        DB::table('equiporders')->insert([
            'equ_id' => ($equipment = Equipment::where('equ_type', '=', 'Bulb')->first()->id) ,'order_id' => ($order = Order::where('order_description', '=', 'Change bulb in bed room')->first()->id) ,
        ]);

        DB::table('equiporders')->insert([
            'equ_id' => ($equipment = Equipment::where('equ_type', '=', 'Fan')->first()->id) ,'order_id' => ($order = Order::where('order_description', '=', 'Change fan')->first()->id) ,
        ]);

    }
}
