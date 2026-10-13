<?php
namespace App\Http\Controllers;
use App\Models\Customer; use Illuminate\Http\Request;
class CustomerController extends Controller {
 public function index(){ $customers=Customer::withCount('orders')->latest()->paginate(10); return view('customers.index',compact('customers')); }
 public function create(){ return view('customers.create',['customer'=>new Customer]); }
 public function store(Request $request){ $data=$request->validate(['first_name'=>'required|string|max:100','last_name'=>'required|string|max:100','phone'=>'nullable|string|max:40','email'=>'nullable|email|max:150','address'=>'nullable|string|max:1000']); Customer::create($data); return redirect()->route('admin.customers.index')->with('success','Customer created.'); }
 public function show(Customer $customer){ return redirect()->route('admin.customers.edit',$customer); }
 public function edit(Customer $customer){ return view('customers.edit',compact('customer')); }
 public function update(Request $request,Customer $customer){ $data=$request->validate(['first_name'=>'required|string|max:100','last_name'=>'required|string|max:100','phone'=>'nullable|string|max:40','email'=>'nullable|email|max:150','address'=>'nullable|string|max:1000']); $customer->update($data); return redirect()->route('admin.customers.index')->with('success','Customer updated.'); }
 public function destroy(Customer $customer){ if($customer->orders()->exists())return back()->with('error','This customer has orders. Remove their orders before deleting the customer.'); $customer->delete(); return redirect()->route('admin.customers.index')->with('success','Customer deleted.'); }
}