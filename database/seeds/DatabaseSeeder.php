<?php

use Illuminate\Database\Seeder;
use App\Tag;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed the System Users/Roles/Permissions tables
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(UsersRolesPermissions::class);
        //$this->call(NotificationsTableSeeder::class);
        $this->call(CentersTableSeeder::class);
        $this->call(ApartmentsTableSeeder::class);
        //$this->call(ResidentsTableSeeder::class);
        //$this->call(RescontactsTableSeeder::class);
        //$this->call(EquipmentsTableSeeder::class);
//        $this->call(ConresisTableSeeder::class);
//        $this->call(AptresisTableSeeder::class);
        $this->call(ComareasTableSeeder::class);
        $this->call(ToolsTableSeeder::class);
        $this->call(SuppliesTableSeeder::class);
        $this->call(IssuetypesTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
//        $this->call(OrdersTableSeeder::class);
       //$this->call(AssignordersTableSeeder::class);
        //$this->call(EquipordersTableSeeder::class);
        $this->command->info('All important tables seeded!');

        // Seed the Tags table
        // $this->call(TagsTableSeeder::class);
        //$this->command->info('Tags tables seeded!');
    }
}

/*class TagsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tags')->delete();
        Tag::create([ 'name' => 'Athlete']);
        Tag::create([ 'name' => 'First Generation']);
        Tag::create([ 'name' => 'Graduate']);
        Tag::create([ 'name' => 'International']);
        Tag::create([ 'name' => 'Military & Veteran']);
        Tag::create([ 'name' => 'Retention Risk']);
        Tag::create([ 'name' => 'Scotts Scholar']);
        Tag::create([ 'name' => 'Undergraduate']);
    }
}*/

