<?php

namespace App\Http\Controllers;

use App\Models\Red;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    


    public function contacto(Request $request, $url)
    {
       $red = Red::where('url', $url)->first();

       if (!$red || $red->status == 0) {
           abort(404);
       }

       if ($request->json) {
        return response()->json($red->users, 200);
       }

        $path = 'https://wa.me/';

        $sufix = '?text='.$red->message;
        $list = $red->users->pluck('phone')->toArray();


        return redirect($path . $list[array_rand($list, 1)] . $sufix);

    }
}
