<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('currency')->default('USD');
            $table->text('footer_injection')->nullable();
            $table->text('header_injection')->nullable();
            $table->string('file_path');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('templates');
    }
};
