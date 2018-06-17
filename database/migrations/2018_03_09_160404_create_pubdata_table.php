<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePubdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pubdata', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('PMID');
            $table->string('Author');
            $table->string('Affiliation');
            $table->string('Title');
            $table->date('DateRevised');
            $table->string('ArticleTitle');
            $table->string('Abstract');
            $table->date('PubDate');
            $table->integer('ArticleId');

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
        Schema::dropIfExists('pubdata');
    }
}
