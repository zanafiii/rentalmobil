<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('products_id');
            $table->bigInteger('users_id');
            $table->date('tanggal_sewa');
            $table->integer('lama_sewa');
            $table->enum('status',['PENDING','CANCELLED','COMPLETED'])->default('COMPLETED');

            // simpan waktu
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
