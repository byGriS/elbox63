<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration {
  public function up() {
    Schema::create('photos', function (Blueprint $table) {
      $table->id();
      $table->text('src');
      $table->foreignId('product_id')->constrained()->onDelete('cascade');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('photos');
  }
}
