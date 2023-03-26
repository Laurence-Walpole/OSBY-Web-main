<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PlayerController extends Controller
{
    public $API_KEY = '05Tfn7uUnHCnMCKh5nBg';

    public function increment(){
        return $this->processRequest(
            $this->incrementPC(),
            $this->successResponse('Player count incremented by 1')
        );
    }

    public function decrement(){
        return $this->processRequest(
            Redis::decr('player_count'),
            $this->successResponse('Player count decremented by 1')
        );
    }

    public function reset(){
        return $this->processRequest(
            Redis::set('player_count', 0),
            $this->successResponse('Player count reset')
        );
    }

    public function get(){
        return $this->successResponse(Redis::get('player_count'));
    }

    function successResponse($message){
        return response(json_encode(['result' => true, 'message' => $message]), 200);
    }

    function failureResponse(){
        return response(json_encode(['result' => false, 'message' => 'Auth key incorrect']), 400);
    }

    function processRequest($action, $response){
        $key = \request('api_key');

        if ($key == $this->API_KEY){
            return $response;
        }
        return $this->failureResponse();
    }

    function incrementPC(){
        Redis::incr('player_count');
        if (Redis::get('daily_player_count')){
            Redis::incr('daily_player_count');
        }else{
//            Redis::set('daily_player_count', 1, ['xx', 'px' => 86400]);
            Redis::setEx('daily_player_count', 86400, 1);
        }
        return true;
    }
}
