<?php
namespace App\Http\Controllers;
use App\Models\Supplier; use Illuminate\Http\Request;
class SupplierController extends Controller {
 public function index(){ $suppliers=Supplier::withCount('flowers')->latest()->paginate(10); return view('suppliers.index',compact('suppliers')); }
 public function create(){ return view('suppliers.create',['supplier'=>new Supplier]); }
 public function store(Request $request){ $data=$request->validate(['name'=>'required|string|max:120','contact_person'=>'nullable|string|max:120','phone'=>'nullable|string|max:40','email'=>'nullable|email|max:150','address'=>'nullable|string|max:1000']); Supplier::create($data); return redirect()->route('admin.suppliers.index')->with('success','Supplier created.'); }
 public function show(Supplier $supplier){ return redirect()->route('admin.suppliers.edit',$supplier); }
 public function edit(Supplier $supplier){ return view('suppliers.edit',compact('supplier')); }
 public function update(Request $request,Supplier $supplier){ $data=$request->validate(['name'=>'required|string|max:120','contact_person'=>'nullable|string|max:120','phone'=>'nullable|string|max:40','email'=>'nullable|email|max:150','address'=>'nullable|string|max:1000']); $supplier->update($data); return redirect()->route('admin.suppliers.index')->with('success','Supplier updated.'); }
 public function destroy(Supplier $supplier){ if($supplier->flowers()->exists())return back()->with('error','This supplier has flowers linked to it. Reassign them first.'); $supplier->delete(); return redirect()->route('admin.suppliers.index')->with('success','Supplier deleted.'); }
}