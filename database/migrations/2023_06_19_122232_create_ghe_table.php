<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ghe', function (Blueprint $table) {
            $table->string('idghe', 25)->primary();
            $table->string('idphong', 25);
            $table->string('vitri', 5);
            $table->string('loaighe', 25);
            $table->string('trangthai', 25);
            $table->foreign('idphong')
                    ->references('idphong')
                    ->on('phong')
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
        Schema::dropIfExists('ghe');
    }
}
