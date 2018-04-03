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

    Config::write('database.connections.mysql.host', $request->input('db-host'));
    Config::write('database.connections.mysql.username', $request->input('db-user'));
    Config::write('database.connections.mysql.password', $request->input('db-pwd'));
    Config::write('database.connections.mysql.database', $request->input('db-name'));

    return redirect('dashboard/settings/database')->with('success', 'Successfully updated database settings.');

    }

    public function wcms_data(Request $request){
        $this->validate($request, [
            'edit-name' => 'required',
            'edit-url' => 'required',
            'edit-lang' => 'required',
        ]);

        Config::write('site.data.name', $request->input('edit-name'));
        Config::write('site.data.url', $request->input('edit-url'));
        Config::write('site.data.lang', $request->input('edit-lang'));

        return redirect('dashboard/settings/wcms')->with('success', 'Successfully updated site data.');
    }
}
