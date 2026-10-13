<?php
namespace App\Http\Controllers;
use App\Models\{Flower,Category,Supplier}; use Illuminate\Http\Request;
class FlowerController extends Controller {
 public function index(){ $flowers=Flower::with(['category','supplier'])->latest()->paginate(10); return view('flowers.index',compact('flowers')); }
 public function create(){ return view('flowers.create',['flower'=>new Flower,'categories'=>Category::orderBy('name')->get(),'suppliers'=>Supplier::orderBy('name')->get()]); }
 public function store(Request $request){ $data=$request->validate(['name'=>'required|string|max:150','description'=>'nullable|string|max:1000','price'=>'required|numeric|min:0','stock_quantity'=>'required|integer|min:0','category_id'=>'required|exists:categories,id','supplier_id'=>'required|exists:suppliers,id']); Flower::create($data); return redirect()->route('admin.flowers.index')->with('success','Flower created.'); }
 public function show(Flower $flower){ return redirect()->route('admin.flowers.edit',$flower); }
 public function edit(Flower $flower){ return view('flowers.edit',['flower'=>$flower,'categories'=>Category::orderBy('name')->get(),'suppliers'=>Supplier::orderBy('name')->get()]); }
 public function update(Request $request,Flower $flower){ $data=$request->validate(['name'=>'required|string|max:150','description'=>'nullable|string|max:1000','price'=>'required|numeric|min:0','stock_quantity'=>'required|integer|min:0','category_id'=>'required|exists:categories,id','supplier_id'=>'required|exists:suppliers,id']); $flower->update($data); return redirect()->route('admin.flowers.index')->with('success','Flower updated.'); }
 public function destroy(Flower $flower){ if($flower->orders()->exists())return back()->with('error','This flower is used in an order. It cannot be deleted until the order is removed.'); $flower->delete(); return redirect()->route('admin.flowers.index')->with('success','Flower deleted.'); }
}