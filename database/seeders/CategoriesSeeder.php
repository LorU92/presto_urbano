<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    
    public $categories = [
            'Elettronica',
            'Salute e Bellezza',
            'Casa e Arredamento',
            'Abbigliamento',
            'Sport',
            'Libri',
            'Animali',
            'Lavoro',
            'Videogiochi',
            'Motori'    
            ];

    public function run(): void
    {
        foreach($this->categories as $category){
            Category::create([
                'name'=> $category
            ]);

        }
        
    }
}
