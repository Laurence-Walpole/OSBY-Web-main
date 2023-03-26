<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributesToPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->string('username')->nullable();
            $table->integer('vote_points')->default(0);
            $table->decimal('amount_donated')->default(0);
            $table->decimal('credit')->default(0);
            $table->integer('opened_boxes')->default(0);
            $table->integer('crystal_chests')->default(0);
            $table->integer('barrows_chests')->default(0);
            $table->string('discord_uid')->nullable();
            $table->string('discord_tag')->nullable();
            $table->string('discord_name')->nullable();
            $table->dateTime('sync_date')->default(Carbon::now());
            $table->boolean('received_starter')->default(false);
            $table->bigInteger('play_time')->default(0);
            $table->json('quick_prayers')->nullable();
            $table->integer('last_make_x_amount')->default(1);
            $table->integer('location_x')->default(3741);
            $table->integer('location_y')->default(3805);
            $table->integer('location_z')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('vote_points');
            $table->dropColumn('amount_donated');
            $table->dropColumn('credit');
            $table->dropColumn('opened_boxes');
            $table->dropColumn('crystal_chests');
            $table->dropColumn('barrows_chests');
            $table->dropColumn('discord_uid');
            $table->dropColumn('discord_tag');
            $table->dropColumn('discord_name');
            $table->dropColumn('sync_date');
            $table->dropColumn('received_starter');
            $table->dropColumn('play_time');
            $table->dropColumn('quick_prayers');
            $table->dropColumn('last_make_x_amount');
            $table->dropColumn('location_x');
            $table->dropColumn('location_y');
            $table->dropColumn('location_z');
        });
    }
}
