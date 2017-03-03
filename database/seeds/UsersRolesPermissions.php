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
        $role = Role::where('name', '=', 'admin')->first()->id;
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
            'noti_type' => 'test', 'noti_alert_content' => 'test content', 'noti_status' => 'test status', 'noti_email_title' => 'test email title',
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
            'res_pccid' => '1111', 'res_fname' => 'John', 'res_mname' => 'Mc', 'res_lname' => 'Mann', 'res_gender' => 'M', 'res_Homephone' => '1234567899', 'res_cellphone' => '4029876789',
            'res_email' => 'jmmann@gmail.com', 'res_comment' => 'test user', 'res_status' => 'Active', 'res_apt_id' => 1 , 'res_cntr_id' => ($center = Center::where('cntr_name', '=', 'Aksarben')->first()->id) ,
        ]);
        DB::table('residents')->insert([
            'res_pccid' => '2222', 'res_fname' => 'David', 'res_mname' => '', 'res_lname' => 'Schoof', 'res_gender' => 'M', 'res_Homephone' => '1234567890', 'res_cellphone' => '4567876543',
            'res_email' => 'schoof@gmail.com', 'res_comment' => 'test user', 'res_status' => 'Active', 'res_apt_id' => 2 , 'res_cntr_id' => ($center = Center::where('cntr_name', '=', 'Aksarben')->first()->id) ,
        ]);
        DB::table('residents')->insert([
            'res_pccid' => '3333', 'res_fname' => 'Skyler', 'res_mname' => 'White', 'res_lname' => 'Walter', 'res_gender' => 'F', 'res_Homephone' => '5654343234', 'res_cellphone' => '5654343234',
            'res_email' => 'skyler@hotmail.com', 'res_comment' => 'test user', 'res_status' => 'InActive', 'res_apt_id' => 3 , 'res_cntr_id' => ($center = Center::where('cntr_name', '=', 'Aksarben')->first()->id) ,
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
            'con_fname' => 'Walter', 'con_mname' => ' ', 'con_lname' => 'Jr', 'con_relationship' => 'Son', 'con_cellphone' => '7898765435', 'con_email' => 'walter@gmail.com',
            'con_comment' => 'Primary Contact', 'con_gender' => 'M', 'con_res_id' => ($resident = Resident::where('res_fname', '=', 'David')->first()->id)
        ]);
        DB::table('rescontacts')->insert([
            'con_fname' => 'Flynn', 'con_mname' => 'Mc', 'con_lname' => 'Mann', 'con_relationship' => 'Son', 'con_cellphone' => '9876545678', 'con_email' => 'flynn@gmail.com',
            'con_comment' => 'Primary Contact', 'con_gender' => 'M', 'con_res_id' => ($resident = Resident::where('res_fname', '=', 'John')->first()->id)
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
            'cntr_name' => 'Aksarben', 'cntr_add1' => '3001 Dodge', 'cntr_add2' => '31st ST', 'cntr_city' => 'Omaha', 'cntr_state' => 'NE', 'cntr_zip' => 68105, 'cntr_phone' =>98787,
            'cntr_fax' => 234567, 'cntr_comments' => 'test',
        ]);
        DB::table('centers')->insert([
            'cntr_name' => 'Omaha', 'cntr_add1' => '3001 Dodge', 'cntr_add2' => '31st ST', 'cntr_city' => 'Omaha', 'cntr_state' => 'NE', 'cntr_zip' => 68105, 'cntr_phone' =>98787,
            'cntr_fax' => 234567, 'cntr_comments' => 'test',
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
            'apt_floornumber' => 1 , 'apt_number' => '1', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', 'Aksarben')->first()->id) ,
        ]);
        DB::table('apartments')->insert([
            'apt_floornumber' => 2 , 'apt_number' => '2', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', 'Aksarben')->first()->id) ,
        ]);
        DB::table('apartments')->insert([
            'apt_floornumber' => 3 , 'apt_number' => '3', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', 'Aksarben')->first()->id) ,
        ]);
        DB::table('apartments')->insert([
            'apt_floornumber' => 4 , 'apt_number' => '4', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', 'Aksarben')->first()->id) ,
        ]);
        DB::table('apartments')->insert([
            'apt_floornumber' => 5 , 'apt_number' => '5', 'apt_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', 'Aksarben')->first()->id) ,
        ]);

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
            'ca_name' => 'Gym', 'ca_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', 'Aksarben')->first()->id) ,
        ]);
        DB::table('comareas')->insert([
            'ca_name' => 'Swimming pool', 'ca_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', 'Aksarben')->first()->id) ,
        ]);
        DB::table('comareas')->insert([
            'ca_name' => 'N/A', 'ca_comments' => 'test', 'cntr_id' => ($center = Center::where('cntr_name', '=', 'Aksarben')->first()->id) ,
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
