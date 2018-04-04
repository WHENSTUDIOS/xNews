<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Template;
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
        Config::write('app.locale', $request->input('edit-lang'));

        return redirect('dashboard/content/wcms')->with('success', 'Successfully updated site data.');
    }

    public function edit_access(Request $request){
        $this->validate($request, [
            'debug' => 'required',
            'switcher' => 'required',
        ]);

        if($request->input('debug') === 'debug-enabled'){
            Config::write('app.debug', true);
            if($request->input('switcher') === 'switcher-enabled'){
                Config::write('site.data.allow-switcher', 'true');
                return redirect('dashboard/content/wcms')->with('success', 'Successfully edited access settings.');
            } elseif($request->input('switcher') === 'switcher-disabled'){
                Config::write('site.data.allow-switcher', 'false');
                return redirect('dashboard/content/wcms')->with('success', 'Successfully edited access settings.');
            }
        } elseif($request->input('debug') === 'debug-disabled'){
            Config::write('app.debug', false);
            if($request->input('switcher') === 'switcher-enabled'){
                Config::write('site.data.allow-switcher', 'true');
                return redirect('dashboard/content/wcms')->with('success', 'Successfully edited access settings.');
            } elseif($request->input('switcher') === 'switcher-disabled'){
                Config::write('site.data.allow-switcher', 'false');
                return redirect('dashboard/content/wcms')->with('success', 'Successfully edited access settings.');
            }
        }
    }

    public function create_template(Request $request){
        $this->validate($request, [
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ],
    [
        'title.required' => 'Please provide a template title.',
        'title.max' => 'Maximum 50 characters for the title.',
        'body.required' => 'Please provide a template body.',
        'body.max' => 'Maximum 2000 characters for the template body.',
    ]);
        
        $template = new Template;
        $template->name = $request->input('name');
        $template->body = $request->input('body');
        $template->status = '0';
        if($template->save()){
            return redirect('dashboard/content/templates')->with('success', 'Successfully created article template.');
        }
    }
}
