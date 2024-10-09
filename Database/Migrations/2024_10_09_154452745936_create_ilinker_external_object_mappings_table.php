<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ilinker__external_object_mappings', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      // Your fields...
      $table->string('entity_type')->nullable();
      $table->integer('entity_id')->unsigned()->nullable();
      $table->integer('external_object_id')->unsigned();

      $table->foreign('external_object_id')->references('id')->on('ilinker__external_objects')->onDelete('cascade');
      // Audit fields
      $table->timestamps();
      $table->auditStamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('ilinker__external_object_mappings', function (Blueprint $table) {
      $table->dropForeign(['external_object_id']);
    });
    Schema::dropIfExists('ilinker__external_object_mappings');
  }
};
