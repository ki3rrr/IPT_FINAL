<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class FlowerFactory extends Factory { public function definition():array {return ['name'=>fake()->randomElement(['Rose Bouquet','Tulip Bundle','Sunflower Stem','Orchid Arrangement','Lily Bouquet']),'description'=>fake()->sentence(),'price'=>fake()->randomFloat(2,50,1500),'stock_quantity'=>fake()->numberBetween(0,100),'category_id'=>\App\Models\Category::factory(),'supplier_id'=>\App\Models\Supplier::factory()];} }
