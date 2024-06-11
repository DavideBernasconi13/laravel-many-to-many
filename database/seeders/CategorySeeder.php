<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['frontend', 'backend', 'design', 'ux', 'devops']; 
        for($i = 0; $i < count($categories); $i++){
            $newCategory = new Category();
            $newCategory->name = $categories[$i]; 
            $newCategory->slug = Category::generateSlug($newCategory->name); 
            $newCategory->save();  

        }
    }
}
