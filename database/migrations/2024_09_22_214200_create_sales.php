<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string("title", 255)->nullable();
            $table->unsignedBigInteger("price")->nullable();
            $table->timestamps();
            $table->string("file", 255);
            $table->bigInteger("stock");
            $table->foreign("id")->references("id")->on("sales_user")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
