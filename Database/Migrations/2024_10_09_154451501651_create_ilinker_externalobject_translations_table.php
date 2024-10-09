<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIlinkerExternalObjectTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ilinker__externalobject_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('externalobject_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['externalobject_id', 'locale']);
            $table->foreign('externalobject_id')->references('id')->on('ilinker__externalobjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ilinker__externalobject_translations', function (Blueprint $table) {
            $table->dropForeign(['externalobject_id']);
        });
        Schema::dropIfExists('ilinker__externalobject_translations');
    }
}
