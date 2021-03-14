<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
  public function up() {
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->text('title');
      $table->text('slug');
      $table->text('short_description')->nullable();
      $table->text('description')->nullable();
      $table->text('specifications')->nullable();
      $table->integer('price')->nullable();
      $table->text('term')->nullable();
      $table->integer('warranty')->default(18);
      $table->text('po')->nullable();
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('products');
  }
}
