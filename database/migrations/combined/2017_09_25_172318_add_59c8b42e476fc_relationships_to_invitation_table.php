<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add59c8b42e476fcRelationshipsToInvitationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invitations', function(Blueprint $table) {
            if (!Schema::hasColumn('invitations', 'event_id')) {
                $table->integer('event_id')->unsigned()->nullable();
                $table->foreign('event_id', '76495_59c8b42d4eefa')->references('id')->on('events')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invitations', function(Blueprint $table) {
            if(Schema::hasColumn('invitations', 'event_id')) {
                $table->dropForeign('76495_59c8b42d4eefa');
                $table->dropIndex('76495_59c8b42d4eefa');
                $table->dropColumn('event_id');
            }
            
        });
    }
}
