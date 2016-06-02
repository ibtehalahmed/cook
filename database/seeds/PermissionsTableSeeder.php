<?php
use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addMeal = new Permission();
        $addMeal->name         = 'add_meal';
        $addMeal->display_name = 'Add meal'; // optional
        // Allow a user to...
        $addMeal->description  = "add a new meal"; // optional
        $addMeal->save();
        
        $deleteMeal = new Permission();
        $deleteMeal->name         = 'delete_meal';
        $deleteMeal->display_name = 'delete meal'; // optional
        // Allow a user to...
        $deleteMeal->description  = "delete a  meal"; // optional
        $deleteMeal->save();
        
        

    }
}
