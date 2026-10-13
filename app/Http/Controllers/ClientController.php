<?php
namespace App\Http\Controllers;

use App\Models\Flower;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $flowers = Flower::with('category')->where('stock_quantity', '>', 0)->latest()->paginate(12);
        return view('client.shop', compact('flowers'));
    }

    public function show(Flower $flower)
    {
        $flower->load('category');
        return view('client.show', compact('flower'));
    }

    public function storeOrder(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'required|string|max:1000',
            'flower_id' => 'required|exists:flowers,id',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:1000',
        ]);

        DB::transaction(function () use ($data) {
            $flower = Flower::whereKey($data['flower_id'])->lockForUpdate()->firstOrFail();
            if ($flower->stock_quantity < $data['quantity']) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'quantity' => "Only {$flower->stock_quantity} item(s) are currently available.",
                ]);
            }

            $customer = Customer::updateOrCreate(
                ['email' => strtolower($data['email'])],
                ['first_name' => $data['first_name'], 'last_name' => $data['last_name'],
                 'phone' => $data['phone'] ?? null, 'address' => $data['address']]
            );

            $order = Order::create([
                'customer_id' => $customer->id,
                'order_date' => now()->toDateString(),
                'status' => 'Pending',
                'notes' => trim(($data['notes'] ?? '') . "\nClient storefront order"),
            ]);

            $order->flowers()->attach($flower->id, [
                'quantity' => $data['quantity'],
                'unit_price' => $flower->price,
            ]);
            $flower->decrement('stock_quantity', $data['quantity']);
        });

        return redirect()->route('client.shop')->with('success', 'Your order request was placed! The shop will contact you to confirm.');
    }
}
