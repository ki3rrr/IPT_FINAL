<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, Category, Supplier, Flower, Customer, Order};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@flowershop.com'],
            ['name' => 'Shop Administrator', 'password' => Hash::make('Admin@12345')]
        );

        $roses = Category::firstOrCreate(
            ['name' => 'Roses'],
            ['description' => 'Classic roses for gifts and special occasions']
        );
        $tropical = Category::firstOrCreate(
            ['name' => 'Tropical'],
            ['description' => 'Bright tropical flowers']
        );
        $seasonal = Category::firstOrCreate(
            ['name' => 'Seasonal'],
            ['description' => 'Flowers available in season']
        );

        $s1 = Supplier::firstOrCreate(
            ['email' => 'bloom@example.com'],
            ['name' => 'Bloom Wholesale', 'contact_person' => 'Maria Santos', 'phone' => '09171234567', 'address' => 'Cebu City']
        );
        $s2 = Supplier::firstOrCreate(
            ['email' => 'garden@example.com'],
            ['name' => 'Garden Fresh Supply', 'contact_person' => 'Juan Reyes', 'phone' => '09181234567', 'address' => 'Mandaue City']
        );

        $f1 = Flower::firstOrCreate(
            ['name' => 'Red Rose Bouquet'],
            ['description' => 'A bouquet of fresh red roses', 'price' => 850, 'stock_quantity' => 30, 'category_id' => $roses->id, 'supplier_id' => $s1->id]
        );
        $f2 = Flower::firstOrCreate(
            ['name' => 'Sunflower Bundle'],
            ['description' => 'Bright sunflowers tied together', 'price' => 450, 'stock_quantity' => 18, 'category_id' => $seasonal->id, 'supplier_id' => $s2->id]
        );
        Flower::firstOrCreate(
            ['name' => 'Tropical Orchid'],
            ['description' => 'Elegant purple orchid', 'price' => 620, 'stock_quantity' => 12, 'category_id' => $tropical->id, 'supplier_id' => $s2->id]
        );

        $customer = Customer::firstOrCreate(
            ['email' => 'ana@example.com'],
            ['first_name' => 'Ana', 'last_name' => 'Dela Cruz', 'phone' => '09991234567', 'address' => 'Cebu City']
        );

        $order = Order::firstOrCreate(
            ['customer_id' => $customer->id, 'order_date' => now()->toDateString(), 'notes' => 'Sample order'],
            ['status' => 'Pending']
        );
        $order->flowers()->syncWithoutDetaching([
            $f1->id => ['quantity' => 2, 'unit_price' => $f1->price],
            $f2->id => ['quantity' => 1, 'unit_price' => $f2->price],
        ]);
    }
}
