<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1506325548InvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('invitations')) {
            Schema::create('invitations', function (Blueprint $table) {
                $table->increments('id');
                $table->string('email');
                $table->datetime('sent_at')->nullable();
                $table->datetime('accepted_at')->nullable();
                $table->datetime('rejected_at')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitations');
    }
}
