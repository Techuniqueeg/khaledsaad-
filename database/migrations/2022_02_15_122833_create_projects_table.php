<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict');
            $table->string('image');
            $table->string('name_ar');
            $table->string('name_en');
            $table->longText('description_ar');
            $table->longText('description_en');
            $table->double('price');
            $table->longText('feature_ar');
            $table->longText('feature_en');
            $table->enum('active',['1','0'])->default('1');
            $table->enum('tryable',['1','0'])->default('1');
            $table->enum('special',['1','0'])->default('1');

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
        Schema::dropIfExists('projects');
    }
}
