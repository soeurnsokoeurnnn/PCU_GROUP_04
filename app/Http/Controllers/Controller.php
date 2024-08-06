<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Move File Upload
    public function uploadFile($File) {
        $fileName  = rand(1,999).'-'.$File->getClientOriginalName();
        $path      = 'uploads';
        $File->move($path, $fileName);
        return $fileName;
    }

    //Log Activities
    public function logActivity($title, $type, $action, $date) {
        DB::table('log_activity')->insert([
            'title'      => $title,
            'post_type'  => $type,
            'action'     => $action,
            'author'     => Auth::user()->id,
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }

    //Generate Slug 
    public function GenerateSlug($text) {
        return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $text));
    }
}
