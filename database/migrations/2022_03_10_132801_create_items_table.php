<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_id')->index()->unique();
            $table->string('name',100)->index();
            $table->date('release_date');
            $table->smallInteger('category')->nullable();
            $table->smallInteger('sub_category')->nullable();
            $table->smallInteger('type')->nullable();
            $table->boolean('status')->default(true);
            $table->bigInteger('jan_code')->unsigned();
            $table->mediumInteger('stock');
            $table->string('detail', 190)->nullable();
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
}
