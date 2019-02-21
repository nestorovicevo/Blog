<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();   ///poput nullable
            $table->timestamps();
        });
/////////////////////////////OVDE SU UBACENE OBE FUNKCIJE umesto u posebne migracije zato sto je TAG uvek vezan za ovu pricu,ali moze i u posebne migracije
        Schema::create('post_tag', function (Blueprint $table) {      ////////ovo je za post_tag tabelu PIVOT VALJDA
            $table->integer('post_id');
            $table->integer('tag_id');
            $table->primary(['post_id', 'tag_id']);        ////primary kao primarni kljuc
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('post_tag');
    }
}
