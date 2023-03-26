<?php

namespace App\Models;

use App\View\Components\HighscoresTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'username',
        'vote_points',
        'times_voted',
        'amount_donated',
        'credit',
        'opened_boxes',
        'crystal_chests',
        'barrows_chests',
        'discord_uid',
        'discord_tag',
        'discord_name',
        'sync_date',
        'received_starter',
        'play_time',
        'quick_prayers',
        'last_make_x_amount',
        'location_x',
        'location_y',
        'location_z',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    function getAccess(){
        return PlayerAccess::where('player_id', $this->id)->get();
    }

    function getKingdom() {
        return PlayerKingdom::where('player_id', $this->id)->first();
    }

    function getQuests() {
        return PlayerQuests::where('player_id', $this->id)->get();
    }

    function getMiscStats() {
        return PlayerMiscStats::where('player_id', $this->id)->get();
    }

    function getNPCKills() {
        return PlayerNPCKills::where('player_id', $this->id)->get();
    }

    function getYellInfo() {
        return PlayerYellInfo::where('player_id', $this->id)->get();
    }

    function getFarmingInfo() {
        return PlayerFarmingInfo::where('player_id', $this->id)->get();
    }

    function getGroups() {
        return PlayerGroups::where('player_id', $this->id)->get();
    }

    function getTradePostOffers() {
        return TradePostOffers::where('player_id', $this->id)->get();
    }

    function getSavedConfigs() {
        return PlayerSavedConfig::where('player_id', $this->id)->get();
    }

    function getWornEquipment(){
        return PlayerWornEquipment::where('player_id', $this->id)->first();
    }

    function getBackpack() {
        return PlayerBackpack::where('player_id', $this->id)->get();
    }

    function getBankItems() {
        return PlayerBank::where('player_id', $this->id)->get();
    }

    function getBankPin() {
        return PlayerBankPin::where('player_id', $this->id)->first();
    }

    function getSlayerTasks() {
        return PlayerSlayerTask::where('player_id', $this->id)->get();
    }

    function getAppearance() {
        return PlayerAppearance::where('player_id', $this->id)->first();
    }

    function getVotes() {
        return PlayerVotes::where('player_id', $this->id)->get();
    }

    function getSkills() {
        return PlayerSkill::where('player_id', $this->id)->get();
    }

    public function getTotalLevel(): int {
        $skills = $this->getSkills();
        $totalLevel = 0;
        foreach ($skills as $skill){
            $totalLevel += $skill->skill_level;
        }
        return $totalLevel;
    }

    public function getTotalXP() {
        $skills = $this->getSkills();
        $totalXP = 0;
        foreach ($skills as $skill){
            $totalXP += $skill->player_exp;
        }
        return $totalXP;
    }

    public function calculateRankInSkill($skill_id): int {
        $skills = PlayerSkill::where(['skill_id' => $skill_id])->get()->sortBy([
            ['player_exp', 'desc']
        ]);
        $rank = 1;
        foreach ($skills as $skill) {
            if ($skill->player_id == $this->id) {
                return $rank;
            }
            $rank++;
        }
        return $rank;
    }

    public function calculateTotalRank(): int {
        $highscores = HighscoresTable::getHighscores();
        $rank = 1;
        foreach ($highscores as $highscore){
            if ($highscore['id'] == $this->id){
                return $rank;
            }
            $rank++;
        }
        return $rank;
    }

}
