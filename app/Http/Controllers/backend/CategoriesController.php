<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    // Category
    public function AddCategory() {
        return view('backend.add-category');
    }

    public function AddCategorySubmit(Request $request) {
        $name = $request->name;
        $slug = $this->GenerateSlug($name);
        $date = date('Y-m-d H:i:s');

        $cate = DB::table('category')->insert([
            'name'       => $name,
            'slug'       => $slug,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        if($cate) {
            $this->logActivity($name, 'Category', 'Insert', $date);
            return redirect('/admin/add-category')->with('message', 'Post Inserted');
        }

    }

    public function ListCategory() {
        $cate = DB::table('category')
                    ->orderByDesc('id')
                    ->get();
        return view('backend.list-category',[
            'cate' => $cate
        ]);
    }

    public function UpdateCategory($id){
        $category = DB::table('category')
                ->where('id','DESC')
                ->get();
        return view('backend.update-category',[
            'category' => $category
        ]);
    }
    public function UpdateCategorySubmit(Request $request){
        $name = $request->input('name');
        $cate = DB::table('category')
                    ->where('id', $request->id)
                    ->update([
                        'name' => $name
                    ]);
        if($cate){
            $this->logActivity('Category', 'Category', 'Update', $cate);
            return redirect('/admin/list-logo')->with('message', 'Post Updated');               
        }
    }

    // Attribute
    public function AddAttribute() {
        return view('backend.add-attribute');
    }

    public function AddAttributeSubmit(Request $request) {
        $type  = $request->type;
        $value = $request->value;
        $date  = date('Y:m:d H:i:s');

        $attr  = DB::table('attribute')->insert([
            'type'       => $type,
            'value'      => $value,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        $log = $type ." : ". $value;

        if($attr) {
            $this->logActivity($log, 'Attribute', 'Insert', $date);
            return redirect('/admin/add-attribute')->with('message', 'Post Inserted');
        }

    }
}
