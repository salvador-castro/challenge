<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Models\Game;
use App\Models\Comunity;
use Illuminate\Http\Request;
use Modules\Agenda\Entities\Appoiment;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{

    protected $uri = "https://api.telegram.org:443/bot";

    public function updatesTelegram(Request $request)
    {
        //$chatId = $request->message['chat']['id'];
        //$text = strtolower($request['message']['text'] ?? '');
        // \Log::info(json_encode($request->all()));
        if ($request->message) {
            $chat_id = $request->message['chat']['id'];
            $text = strtolower($request->message['text'] ?? '');
        } else {
            $chat_id = $request->my_chat_member['chat']['id'];
            $text = strtolower($request->my_chat_member['text'] ?? '');
        }

        switch ($text) {
            case '/futbol':
                $this->menu($chat_id);
                break;
            case '/siguientepartido':
                $this->siguientePartido($chat_id);
                break;
            case '/jugadores':
                $this->jugadores($chat_id);
                break;
            case '/insultaralenano':
                $this->enano($chat_id);
                break;
            case '/changotips':
                $this->changoTips($chat_id);
                break;
            
        }

        return response()->json('ok', 200);
    }


    private function checkUser(Request $request, $text, $chat_id)
    {
        $token = explode("/start", $text)[1];

        $user = TelegramUser::whereToken(trim($token))->first();

        if ($user) {
            $user->update([
                'object' => $request->message,
                'chat_id' => $chat_id,
            ]);
            $this->sendMessage(config('telegram-user.message.success'), $chat_id);
        } else {
            $text = "⚠️ Hola! lamentablemente no encontramos tu usuario en nuestra base.\n"
                . "Intenta ingresar este código en la aplicación de Eventos LCABA:\n"
                . "<b>Código:</b> {$chat_id}\n";
            $this->sendMessage($text, $chat_id);
        }

    }

    public function menu($chat_id = '213077083')
    {
        $keyboard= [
            ['/SiguientePartido','/Jugadores'],
            ['/InsultarAlEnano']
        ];
        
            $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
            $k=json_encode($key);
        
        $url = 'https://api.telegram.org:443/bot' . config('services.telegram-bot-api.token') . '/sendMessage';
        $msg = "Hola... ¿Que Necesitas?";
        $params = [
            'chat_id' => $chat_id,
            'text' => $msg,
            'parse_mode' => "HTML",
            'reply_markup' => $k
        ];

        $send = \Illuminate\Support\Facades\Http::post($url, $params);
    }

    public function siguientePartido($chat_id)
    {
        $comunity = 1;
        $nextGame = Game::where('comunity_id', $comunity)->where('start', '>=', Carbon::now())->orderBy('start', 'asc')->first();
        if ($nextGame) {
            $text = '⚽️ Siguiente partido: ' . $nextGame->fechaShow .PHP_EOL;
            $text.= '📍 '.$nextGame->place.PHP_EOL;
            foreach ($nextGame->players as $key => $player) {
                $orden =$key + 1;
                $text.= $orden.') '.$player->player->nickname.' - '.statusIcon($player->player->scoreBylastGames(3)).PHP_EOL;
            }            
        }else{
            $text = 'No hay partidos programados';
        }
        $this->sendMessage($text, $chat_id);
    }

    public function enano($chat_id)
    {
        $list = [
            'Enano cagon',
            'Ahora podes pedir el listado bichi, puto!',
            'Porque lo ponen siempre con los mejores? porque es malo',
        ];
        $this->sendMessage($list[array_rand($list, 1)], $chat_id);
    }

    public function changoTips($chat_id)
    {
        $list = [
            'Me sobran mujeres gracias a Díos y la virgen de itati',
            '#reSi',
            '#siSoy',
            '#kinesioTime',
            'Solo juego torneos importantes',
            'Sali campeón y vos no...',
            'No hay nada mejor que un buen mate por las mañanas',
            'Despues te transfiero',
        ];
        $this->sendMessage($list[array_rand($list, 1)], $chat_id);
    }

    public function jugadores($chat_id)
    {
        $comunity = Comunity::find(1);
        $text = '👥 Jugadores en la comunidad: '.PHP_EOL;
        foreach ($comunity->players as $key => $player) {
            $orden =$key + 1;
            $text.= $orden.') '.$player->nickname.' - Puntaje: '.$player->scoreBylastGames().' ⭐️'.PHP_EOL;
        }
        $this->sendMessage($text, $chat_id);
    }

    private function sendMessage($text, $chat_id)
    {

        $keyboard= [
            ['/SiguientePartido','/Jugadores'],
            ['/InsultarAlEnano', '/changoTips']
        ];
        
            $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
            $k=json_encode($key);
        
        $url = 'https://api.telegram.org:443/bot' . config('services.telegram-bot-api.token') . '/sendMessage';
        $msg = $text;
        $params = [
            'chat_id' => $chat_id,
            // 'chat_id' => -1001220011517,
            'text' => $msg,
            'parse_mode' => "HTML",
        ];

        $send = \Illuminate\Support\Facades\Http::post($url, $params);
        return response()->json('ok', 200);

    }

}
