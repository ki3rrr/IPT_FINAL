<?php
namespace App\Http\Controllers;
use App\Models\Category; use Illuminate\Http\Request;
class CategoryController extends Controller {
 public function index(){ $categories=Category::withCount('flowers')->latest()->paginate(10); return view('categories.index',compact('categories')); }
 public function create(){ return view('categories.create',['category'=>new Category]); }
 public function store(Request $request){ $data=$request->validate(['name'=>'required|string|max:100|unique:categories,name','description'=>'nullable|string|max:1000']); Category::create($data); return redirect()->route('admin.categories.index')->with('success','Category created.'); }
 public function show(Category $category){ return redirect()->route('admin.categories.edit',$category); }
 public function edit(Category $category){ return view('categories.edit',compact('category')); }
 public function update(Request $request,Category $category){ $data=$request->validate(['name'=>'required|string|max:100|unique:categories,name,'.$category->id,'description'=>'nullable|string|max:1000']); $category->update($data); return redirect()->route('admin.categories.index')->with('success','Category updated.'); }
 public function destroy(Category $category){ if($category->flowers()->exists())return back()->with('error','This category has flowers. Reassign or delete those flowers first.'); $category->delete(); return redirect()->route('admin.categories.index')->with('success','Category deleted.'); }
}