<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHdnhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hdnhap', function (Blueprint $table) {
            $table->increments('idhdnhap');
            $table->string('idnv', 25);
            $table->date('ngaylaphd')->default(date('Y-m-d'));
            $table->time('giolaphd')->default(date('H:i:s'));
            $table->string('chuthich')->nullable();
            $table->foreign('idnv')
                    ->references('idnv')
                    ->on('nhanvien')
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
        Schema::dropIfExists('hdnhap');
    }
}
