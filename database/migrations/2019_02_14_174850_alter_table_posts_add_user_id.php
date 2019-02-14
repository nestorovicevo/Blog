<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePostsAddUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable(); //unsigned je da ne bi bili negativni brojevi, a nullable zato sto ne mora imati korisnika PITATI
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign');  ////posts je naziv tabele, user_id naziv kolone
            $table->dropColumn('user_id');              ///ne moze se dropovati dok se foreign id ne dropuje
        });
    }
}
