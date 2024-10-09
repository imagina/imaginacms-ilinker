<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIlinkerExternalObjectMappingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ilinker__externalobjectmapping_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('externalobjectmapping_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['externalobjectmapping_id', 'locale']);
            $table->foreign('externalobjectmapping_id')->references('id')->on('ilinker__externalobjectmappings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ilinker__externalobjectmapping_translations', function (Blueprint $table) {
            $table->dropForeign(['externalobjectmapping_id']);
        });
        Schema::dropIfExists('ilinker__externalobjectmapping_translations');
    }
}
