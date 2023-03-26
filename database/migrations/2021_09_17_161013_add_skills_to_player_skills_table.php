<?php

use App\Models\Player;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkillsToPlayerSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('player_skills', function (Blueprint $table) {
            $table->foreignIdFor(Player::class, 'player_id');
            $table->integer('skill_id')->nullable();
            $table->integer('skill_level')->default(1);
            $table->bigInteger('player_exp')->default(0);
            $table->bigInteger('boosted_for')->default(-1);
            $table->bigInteger('depleted_for')->default(-1);
            $table->bigInteger('skill_points')->default(0);
            $table->bigInteger('skill_task_streak')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('player_skills', function (Blueprint $table) {
            $table->dropColumn('player_id');
            $table->dropColumn('skill_id');
            $table->dropColumn('skill_level');
            $table->dropColumn('player_exp');
            $table->dropColumn('boosted_for');
            $table->dropColumn('depleted_for');
            $table->dropColumn('skill_points');
            $table->dropColumn('skill_task_streak');
        });
    }
}
