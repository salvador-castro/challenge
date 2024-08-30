<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsController extends Controller
{
    public function index()
    {
        $notificaciones = Auth::user()->notifications;
        return view('notificaciones.index', compact(
            'notificaciones'
        ));
    }

    public function read($m)
    {
        $noti = DatabaseNotification::find($m);
        $noti->markAsRead();
        if ($noti->data['link'] == '#' || !$noti->data['link']) {
            return back();
        } else {
            $redirect = $noti->data['link'];
            return redirect($redirect);
        }
    }
    public function markAsRead()
    {
        $app = Auth::user()->unreadNotifications;
        foreach ($app as $key) {
            $noti = DatabaseNotification::find($key['id']);
            $noti->markAsRead();
        }
        return back();
    }

    public function delete($id)
    {
        try {
            $noti = DatabaseNotification::find($id);
            $noti->delete();
            return back();
        } catch (\Exception $ex) {
            flash($ex->getMessage())->important()->error();
            return back();
        }
    }
}
