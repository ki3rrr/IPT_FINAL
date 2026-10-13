<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Order extends Model {
 use HasFactory;
 protected $fillable=['customer_id','order_date','status','notes'];
 protected $casts=['order_date'=>'date'];
 public function customer(){return $this->belongsTo(Customer::class);}
 public function flowers(){return $this->belongsToMany(Flower::class,'order_items')->withPivot(['quantity','unit_price'])->withTimestamps();}
 public function getTotalAmountAttribute(){return $this->flowers->sum(fn($flower)=>$flower->pivot->quantity*$flower->pivot->unit_price);}
}