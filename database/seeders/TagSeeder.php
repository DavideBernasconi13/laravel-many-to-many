<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['html', 'css', 'javascript', 'Vue JS', 'Angular', 'Bootstrap']; 
        for($i = 0; $i < count($tags); $i++){
            $newtag = new tag();
            $newtag->name = $tags[$i]; 
            $newtag->slug = tag::generateSlug($newtag->name); 
            $newtag->save();  
    }
}
}
