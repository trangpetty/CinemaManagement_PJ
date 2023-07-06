<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoivienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoivien', function (Blueprint $table) {
            $table->string('sothe', 25)->primary();
            $table->string('tenhv');
            $table->date('ngaysinh');
            $table->string('diachi');
            $table->string('dienthoai', 10);
            $table->string('socccd', 15);
            $table->string('loaihv', 10)->default('VIP1');
            $table->integer('diemtl')->default(0);
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
        Schema::dropIfExists('hoivien');
    }
}
