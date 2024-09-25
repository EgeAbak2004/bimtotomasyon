
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
        Schema::create('product', function (Blueprint $table) {
            $table->engine("InnoDB");
            $table->id();
            $table->string("title", 255)->nullable();
            $table->unsignedBigInteger("stock")->nullable();
            $table->unsignedBigInteger("price")->nullable();
            $table->boolean("Is");
            $table->string("file", 255);
            $table->foreign("id")->references("id")->on("warehouse")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
