<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {
    public function index()
    {
        return view('backend.dashboard');
    }

    public function AddPost()
    {
        return view('backend.add-post');
    }

    public function ListPost()
    {
        return view('backend.list-post');
    }

    //View Log
    public function ViewLog()
    {
        $logs = DB::table('log_activity')
                    ->join('users', 'users.id', 'log_activity.author')
                    ->select('users.name AS uname', 'log_activity.*')
                    ->orderByDesc('log_activity.id')
                    ->get();

        return view('backend.list-log',[
            'logs' => $logs
        ]);
    }

    //Website Logo
    public function AddLogo()
    {
        return view('backend.add-logo');
    }

    public function AddLogoSubmit(Request $request) {
        if(!empty($request->file('thumbnail'))) {

            $file     = $request->file('thumbnail');
            $fileName = $this->uploadFile($file);
            $date     = date('Y-m-d H:i:s');

            //prepare insert to db
            $logo = DB::table('logo')->insert([
                'thumbnail'  => $fileName,
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            if($logo) {
                $this->logActivity('Logo', 'Logo', 'Insert', $date);
                return redirect('/admin/add-logo')->with('message', 'Post Inserted');
            }
        }
        else {
            return redirect('/admin/add-logo');
        }
    }

    public function ListLogo()
    {
        $logos = DB::table('logo')
                    ->orderByDesc('id')
                    ->get();
        return view('backend.list-logo',[
            'logos' => $logos 
        ]);
    }

    public function UpdateLogo($id) {
        $logo = DB::table('logo')->find($id);
        return view('backend.update-logo',[
            'logo' => $logo
        ]);
    }

    public function UpdateLogoSubmit(Request $request) {

        if(!empty($request->file('thumbnail'))) {
            $file = $request->file('thumbnail');
            $thumbnail = $this->uploadFile($file);
        }
        else{
            $thumbnail = $request->old_thumbnail;
        }

        $date     = date('Y-m-d H:i:s');

        $logo = DB::table('logo')
                    ->where('id', $request->id)
                    ->update([
                        'thumbnail' => $thumbnail
                    ]);
        if($logo) {
            $this->logActivity('Logo', 'Logo', 'Update', $date);
            return redirect('/admin/list-logo')->with('message', 'Post Updated');
        }

    }

    public function RemoveLogoSubmit(Request $request) {

        $id   = $request->remove_id;
        $date = date('Y-m-d H:i:s');

        $logo = DB::table('logo')
                    ->where('id', $id)
                    ->delete();
        if($logo) {
            $this->logActivity('Logo', 'Logo', 'Remove', $date);
            return redirect('/admin/list-logo')->with('message', 'Post Deleted');
        }
    }
}
