<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function listProduct() {
        $product = DB::table('product')->get();
        if($product) {
            $data = array(
                'code' => 200,
                'message' => 'success',
                'data' => $product
            );
        }else {
            $data = array(
                'code' => 500,
                'message' => 'Internal server error',
                'data' => []
            );
        }

        return $data;
    }

    public function getProduct($id) {
        $product = DB::table('product')->where('id', $id)->get();
        if($product) {
            $data = array(
                'code' => 200,
                'message' => 'success',
                'data' => $product
            );
        }else {
            $data = array(
                'code' => 500,
                'message' => 'Internal server error',
                'data' => []
            );
        }

        return $data;
    }

    public function userLogin(Request $request) {

        if(Auth::attempt([
            'name' => $request->name,
            'password' => $request->password
        ])) {
            $user  = Auth::user(); 
            $token =  $user->createToken('MyApp')->plainTextToken; 
            $data = array(
                'code' => 200,
                'message' => 'success',
                'data' => $token
            );
        }
        else {
            $data = array(
                'code' => 500,
                'message' => 'Internal server error',
                'token' => ''
            );
        }

        return $data;
    }

    public function addNews(Request $request) {

        $slug   = $this->GenerateSlug($request->title);
        $author = Auth::user()->id;
        $date   = date('Y:m:d H:i:s');
        $file   = $request->file('thumbnail');
        $thumb  = $this->uploadFile($file);

        $news = DB::table('news')->insert([
            'title' => $request->title,
            'slug'  => $slug,
            'thumbnail' => $thumb,
            'author' => $author,
            'viewer' => 0,
            'description' => $request->description,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        if($news) {
            $data = array(
                'code' => 200,
                'message' => 'success'
            );
        }else {
            $data = array(
                'code' => 500,
                'message' => 'Internal server error'
            );
        }

        return $data;
    }
}
