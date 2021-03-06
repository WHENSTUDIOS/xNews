<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\Notice;
use App\Input;
use App\Categories;
use App\Comment;
use Config;

class DashboardSettingsController extends Controller
{
    public function edit_database(Request $request){
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

    public function edit_wcms_data(Request $request){
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

    public function edit_theme(Request $request){
        $this->validate($request, [
            'theme' => 'required',
            'itheme' => 'required',
        ]);

        Config::write('site.data.dashtheme', $request->input('theme'));
        return redirect('dashboard/content/wcms')->with('success', 'Successfully updated themes.');
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
        $template->name = $request->input('title');
        $template->body = $request->input('body');
        $template->status = '0';
        if($template->save()){
            return redirect('dashboard/content/templates')->with('success', 'Successfully created article template.');
        }
    }

    public function template_active($id){
        if($current = Template::where('status', '1')->update(['status' => '0'])){
            unset($current);
            $new = Template::find($id);
            $new->status = '1';
            if($new->save()){
                unset($new);
                return redirect('dashboard/content/templates')->with('success', 'Successfully set active template.'); 
            } else {
                return redirect('dashboard/content/templates')->with('error', 'Unable to set active template.'); 
            }
        } else {
            $new = Template::find($id);
            $new->status = '1';
            if($new->save()){
                unset($new);
                return redirect('dashboard/content/templates')->with('success', 'Successfully set active template.'); 
            } else {
                return redirect('dashboard/content/templates')->with('error', 'Unable to set active template.'); 
            }
        }
    }

    public function template_inactive($id){
            $new = Template::find($id);
            $new->status = '0';
            if($new->save()){
                unset($new);
                return redirect('dashboard/content/templates')->with('success', 'Successfully set inactive template.'); 
            } else {
                return redirect('dashboard/content/templates')->with('error', 'Unable to set inactive template.'); 
            }
    }

    public function delete_template($id){
        $template = Template::find($id);
        if($template->delete()){
            return redirect('/dashboard/content/templates')->with('success', 'Succesfully deleted template.');
        } else {
            return redirect('/dashboard/content/templates')->with('error', 'Unable to delete template.'); 
        }
    }

    public function create_notice(Request $request){
        $this->validate($request, [
            'title' => 'required|max:50',
            'content' => 'required|max:300',
            'color' => 'required',
        ],
    [
        'title.required' => 'Please provide a notice title.',
        'title.max' => 'Maximum 50 characters for the title.',
        'body.required' => 'Please provide a notice body.',
        'body.max' => 'Maximum 300 characters for the notice body.',
    ]);
        
        $notice = new Notice;
        $notice->name = $request->input('title');
        $notice->content = Input::sanitize($request->input('content'));
        $notice->color = $request->input('color');
        $notice->status = '0';
        if($notice->save()){
            return redirect('dashboard/content/notices')->with('success', 'Successfully created notice.');
        }
    }

    public function notice_active($id){
        if($current = Notice::where('status', '1')->update(['status' => '0'])){
            unset($current);
            $new = Notice::find($id);
            $new->status = '1';
            if($new->save()){
                unset($new);
                return redirect('dashboard/content/notices')->with('success', 'Successfully set active notice.'); 
            } else {
                return redirect('dashboard/content/notices')->with('error', 'Unable to set active notice.'); 
            }
        } else {
            $new = Notice::find($id);
            $new->status = '1';
            if($new->save()){
                unset($new);
                return redirect('dashboard/content/notices')->with('success', 'Successfully set active notice.'); 
            } else {
                return redirect('dashboard/content/notices')->with('error', 'Unable to set active notice.'); 
            }
        }
    }

    public function notice_inactive($id){
            $new = Notice::find($id);
            $new->status = '0';
            if($new->save()){
                unset($new);
                return redirect('dashboard/content/notices')->with('success', 'Successfully set inactive notice.'); 
            } else {
                return redirect('dashboard/content/notices')->with('error', 'Unable to set inactive notice.'); 
            }
    }

    public function delete_notice($id){
        $notice = Notice::find($id);
        if($notice->delete()){
            return redirect('/dashboard/content/notices')->with('success', 'Succesfully deleted notice.');
        } else {
            return redirect('/dashboard/content/notices')->with('error', 'Unable to delete notice.'); 
        }
    }

    public function create_category(Request $request){
        $this->validate($request, [
            'name' => 'required|max:15',
        ],
    [
        'name.required' => 'Please enter a category name.',
        'name.max' => 'Category names must be 15 characters or less.',
    ]);

        $category = new Categories;
        $category->name = $request->input('name');
        if($category->save()){
            return redirect('dashboard/articles/categories')->with('success', 'Successfully created category.');
        } else {
            return redirect('dashboard/articles/categories')->with('error', 'Could not create category.');
        }

    }

    public function delete_category($id){
        $category = Categories::find($id);
        if($category->delete()){
            return redirect('/dashboard/articles/categories')->with('success', 'Succesfully deleted category.');
        } else {
            return redirect('/dashboard/articles/categories')->with('error', 'Unable to delete category.'); 
        }
    }

    public function edit_category(Request $request, $id){
        $category = Categories::find($id);
        $this->validate($request, [
            'name' => 'required|max:30',
        ],
    [
        'name.required' => 'Please enter a category name.',
        'name.max' => 'Category names must be 30 characters or less.',
    ]);
        
        $category->name = $request->input('name');
        if($category->save()){
            return redirect('dashboard/articles/categories')->with('success', 'Successfully edited category.');
        } else {
            return redirect('dashboard/articles/categories')->with('error', 'Could not edit category.');
        }
    }

    public function clear_comments($id){
        $comments = Comment::where('post_id', $id)->get();
        foreach($comments as $comment){
            $comment->delete();
        }
        return redirect('dashboard/articles/list')->with('success', 'Successfully cleared comments.');
    }

}
