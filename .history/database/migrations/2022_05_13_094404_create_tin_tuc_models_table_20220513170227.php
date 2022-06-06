<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_tuc_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('idLoaiTin')->nullable(false);
            $table->string('TieuDe',255);
            $table->string('TieuDeKhongDau',255);
            $table->string('Hinh',255);
            $table->mediumText('NoiDung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tin_tuc_models');
    }
};
