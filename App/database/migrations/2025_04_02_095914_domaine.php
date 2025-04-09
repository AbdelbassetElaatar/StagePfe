<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('linked_file_id')->nullable()->constrained('fichiers');
            $table->string('status')->default('active');
            $table->boolean('ssl_enabled')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('domains');
    }
};
