<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up():void {Schema::create('orders',function(Blueprint $table){$table->id();$table->foreignId('customer_id')->constrained()->restrictOnDelete();$table->date('order_date');$table->string('status',20)->default('Pending');$table->text('notes')->nullable();$table->timestamps();});} public function down():void {Schema::dropIfExists('orders');} };
