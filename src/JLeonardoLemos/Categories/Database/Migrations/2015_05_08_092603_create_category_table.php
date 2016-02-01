<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('category_id')->unsigned()->nullable();
			$table->enum('status', ['active', 'inactive'])->default('active');
			$table->string('name');
			$table->string('slug');
			$table->string('group_slug');
			$table->text('description')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});            
            
		Schema::create('category_set', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('category_id')->unsigned()->nullable();
			$table->integer('categoryable_id')->unsigned();
			$table->string('categoryable_type');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migration.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
		Schema::drop('category_set');
	}
}