<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHdxuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hdxuat', function (Blueprint $table) {
            $table->increments('idhdxuat');
            $table->string('idnv', 25);
            $table->string('sothe', 25)->nullable();
            $table->float('giamgia')->default(0);
            $table->date('ngaylaphd')->default(date('Y-m-d', time()));
            $table->time('giolaphd')->default(date('H:i:s', time()));
            $table->string('chuthich');
            $table->foreign('idnv')
                    ->references('idnv')
                    ->on('nhanvien')
                    ->onDelete('cascade');
            $table->foreign('sothe')
                    ->references('sothe')
                    ->on('hoivien')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('hdxuat');
    }
}
