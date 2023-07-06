<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuatchieuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suatchieu', function (Blueprint $table) {
            $table->string('idsuatchieu', 25)->primary();
            $table->time('thoigianbd');
            $table->string('idphim', 5);
            $table->string('idphong', 25);
            $table->string('loaichieu', 25);
            $table->foreign('idphim')
                    ->references('idphim')
                    ->on('phim')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('suatchieu');
    }
}
