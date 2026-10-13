<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class OrderFactory extends Factory { public function definition():array {return ['customer_id'=>\App\Models\Customer::factory(),'order_date'=>fake()->date(),'status'=>fake()->randomElement(['Pending','Processing','Completed','Cancelled']),'notes'=>fake()->optional()->sentence()];} }
