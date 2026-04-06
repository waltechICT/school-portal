<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class SessionController extends Controller
{
    public function index()
    {
        $agent = new Agent();

        $sessions = DB::table('sessions')
            ->orderBy('last_activity', 'desc')
            ->get()
            ->map(function ($session) use ($agent) {
                $agent->setUserAgent($session->user_agent);
                
                // Attach parsed data to the object
                $session->browser = $agent->browser();
                $session->platform = $agent->platform();
                $session->is_desktop = $agent->isDesktop();
                
                return $session;
            });

        return view('admin.activity', compact('sessions'));
    }
}