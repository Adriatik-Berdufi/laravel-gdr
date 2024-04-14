<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->text('description');
            $table->string('slug', 30)->nullable();
            $table->string('type', 20);
            $table->string('category', 30);
            $table->string('weight', 10);
            $table->unsignedTinyInteger('cost');
            $table->string('cost_unit');
            $table->unsignedTinyInteger('dice_num')->nullable();
            $table->unsignedTinyInteger('dice_faces')->nullable();
            $table->string('damege',10);

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
        Schema::dropIfExists('items');
    }
};
