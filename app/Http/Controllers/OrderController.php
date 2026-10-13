<?php
namespace App\Http\Controllers;
use App\Models\{Order,Customer,Flower}; use Illuminate\Http\Request; use Illuminate\Support\Facades\DB;
class OrderController extends Controller {
 public function index(){ $orders=Order::with(['customer','flowers'])->latest()->paginate(10); return view('orders.index',compact('orders')); }
 public function create(){ return view('orders.create',['order'=>new Order,'customers'=>Customer::orderBy('last_name')->get(),'flowers'=>Flower::orderBy('name')->get()]); }
 public function store(Request $request){ $data=$this->validated($request); DB::transaction(function()use($data){$order=Order::create(['customer_id'=>$data['customer_id'],'order_date'=>$data['order_date'],'status'=>$data['status'],'notes'=>$data['notes']??null]);$this->syncFlowers($order,$data['flowers']);}); return redirect()->route('admin.orders.index')->with('success','Order created.'); }
 public function show(Order $order){ return redirect()->route('admin.orders.edit',$order); }
 public function edit(Order $order){ $order->load('flowers'); return view('orders.edit',['order'=>$order,'customers'=>Customer::orderBy('last_name')->get(),'flowers'=>Flower::orderBy('name')->get()]); }
 public function update(Request $request,Order $order){ $data=$this->validated($request); DB::transaction(function()use($data,$order){$order->update(['customer_id'=>$data['customer_id'],'order_date'=>$data['order_date'],'status'=>$data['status'],'notes'=>$data['notes']??null]);$this->syncFlowers($order,$data['flowers']);}); return redirect()->route('admin.orders.index')->with('success','Order updated.'); }
 public function destroy(Order $order){$order->flowers()->detach();$order->delete();return redirect()->route('admin.orders.index')->with('success','Order deleted.');}
 private function validated(Request $request){return $request->validate(['customer_id'=>'required|exists:customers,id','order_date'=>'required|date','status'=>'required|in:Pending,Processing,Completed,Cancelled','notes'=>'nullable|string|max:1000','flowers'=>'required|array|min:1','flowers.*.id'=>'required|distinct|exists:flowers,id','flowers.*.quantity'=>'required|integer|min:0']);}
 private function syncFlowers(Order $order,array $items){$sync=[];foreach($items as $item){$quantity=(int)$item['quantity'];if($quantity>0){$flower=Flower::findOrFail($item['id']);$sync[$flower->id]=['quantity'=>$quantity,'unit_price'=>$flower->price];}}if(!$sync)throw \Illuminate\Validation\ValidationException::withMessages(['flowers'=>'Choose at least one flower and set quantity above zero.']);$order->flowers()->sync($sync);}
}