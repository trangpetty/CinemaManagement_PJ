<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ve', function (Blueprint $table) {
            $table->string('idve', 25)->primary();
            $table->string('sothe', 10)->nullable();
            $table->string('idghe', 25);
            $table->string('idsuatchieu', 25);
            $table->foreign('idghe')
                    ->references('idghe')
                    ->on('ghe')
                    ->onDelete('cascade');
            $table->foreign('idsuatchieu')
                    ->references('idsuatchieu')
                    ->on('suatchieu')
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
        Schema::dropIfExists('ve');
    }
}
