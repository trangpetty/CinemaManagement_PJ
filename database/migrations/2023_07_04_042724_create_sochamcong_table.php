<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSochamcongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sochamcong', function (Blueprint $table) {
            $table->string('idnv', 25);
            $table->date('ngaydilam');
            $table->string('calam', 1);
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
        Schema::dropIfExists('sochamcong');
    }
}
