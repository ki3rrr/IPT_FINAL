<?php
namespace App\Http\Controllers;
use App\Models\{Category,Supplier,Flower,Customer,Order};
class DashboardController extends Controller {
 public function index(){return view('dashboard',['counts'=>['Flowers'=>Flower::count(),'Categories'=>Category::count(),'Suppliers'=>Supplier::count(),'Customers'=>Customer::count(),'Orders'=>Order::count()],'flowers'=>Flower::with(['category','supplier'])->latest()->take(5)->get(),'orders'=>Order::with('customer')->latest()->take(5)->get()]);}
}