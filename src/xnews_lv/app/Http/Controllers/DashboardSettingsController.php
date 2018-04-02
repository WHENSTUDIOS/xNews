<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class DashboardSettingsController extends Controller
{
    public function database(Request $request){
        $this->validate($request, [
            'db-host' => 'required',
            'db-user' => 'required',
            'db-pwd' => '',
            'db-name' => 'required',
        ],
    [
        'db-host.required' => 'Please provide a host name.',
        'db-user.required' => 'Please provide a database username.',
        'db-name.required' => 'Please provide a database name.',
    ]);

    config(['database.connections.mysql.host' => $request->input('db-host')]);
    config(['database.connections.mysql.username' => $request->input('db-user')]);
    config(['database.connections.mysql.password' => $request->input('db-pwd')]);
    config(['database.connections.mysql.database' => $request->input('db-host')]);
    Config::set('database.connections.mysql.host', $request->input('db-host'));

    return redirect('dashboard/settings/database')->with('success', 'Successfully updated database settings.');

    }
}
