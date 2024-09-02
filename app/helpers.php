<?php

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

if (!function_exists('check')) {
    /**
     * @param string $name
     * @return string
     */
    function check()
    {
        return 'check';
    }
}

if (!function_exists('sendTelegramMessage')) {
    /**
     * @param string $name
     * @return string
     */
    function sendTelegramMessage($text, $chat_id = -1001220011517)
    {
        $msg = $text;
        $url = 'https://api.telegram.org:443/bot' . config('services.telegram-bot-api.token') . '/sendMessage';
        $params = [
            'chat_id' => $chat_id,
            'text' => $msg,
            'parse_mode' => "HTML",
        ];

        $send = \Illuminate\Support\Facades\Http::post($url, $params);
    }
}

if (!function_exists('setActiveUrl')) {
    /**
     * @param string $name
     * @return string
     */
    function setActiveUrl(string $name)
    {
        return request()->url() == $name
            ? 'active'
            : '';
    }
}

if (!function_exists('guardarImg')) {
    function guardarImg($img, $nombre = null, $path = 'img', $ancho = null, $alto = null, $viejaIMG = null)
    {
        $n = ($nombre) ? Str::slug($nombre . Str::random(4), '-') : Str::random(15);
        // ruta de las imagenes guardadas
        $ruta = public_path(Str::start($path, '/'));

        // si no existe la carpeta la creo
        if (!File::exists($ruta)) {
            File::makeDirectory($ruta, $mode = 0777, true, true);
        }

        // recogida del form
        $imagenOriginal = $img;

        // crear instancia de imagen
        $imagen = Image::make($imagenOriginal);

        // generar un nombre aleatorio para la imagen
        $temp_name = $n . '.' . $imagenOriginal->getClientOriginalExtension();

        if ($ancho != null || $alto != null) {
            $imagen->resize($ancho, $alto, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        // guardar imagen
        $guardar = $imagen->save($ruta . '/' . $temp_name, 100);

        if ($guardar) {
            if ($viejaIMG) {
                File::delete(public_path('/' . $viejaIMG));
            }
            return $path . '/' . $temp_name;
        }
    }
}

if (!function_exists('borrarImg')) {
    function borrarImg($ruta)
    {
        return File::delete(public_path() . Str::start($ruta, '/'));
    }
}

if (!function_exists('no_data')) {
    /**
     * Genera un mensaje de "No hay datos disponibles"
     *
     * @param string $message El mensaje a mostrar (opcional)
     * @return string El HTML del mensaje
     */
    function no_data($message = 'No hay datos disponibles')
    {
        return "<div class='alert alert-warning'>{$message}</div>";
    }
}
