<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCthdnhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cthdnhap', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idhdnhap');
            $table->string('iddoanuong', 25);
            $table->integer('soluong');
            $table->float('dongia');
            $table->foreign('iddoanuong')
                    ->references('iddoanuong')
                    ->on('doanuong')
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
        Schema::dropIfExists('cthdnhap');
    }
}
