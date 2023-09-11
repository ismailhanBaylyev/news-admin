<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Category;

class Categories extends Controller
{
    public function listView(string $name = null){
        Paginator::useBootstrap();
        $category = Category::orderBy($name != null ? $name : 'sort', 'ASC')->paginate(10);
        return view('category/category', ['category'=>$category]);
    }
    public function addView(){
        return view('category/category_add');
    }
    public function addCategory(Request $req){

        $req->validate(
        [
            'name' => 'required',
        ],
        [
            'name.required' => 'Заполните это поля',
        ]
        );

        $category = new Category;
        $category->name = $req->name;
        $category->status = $req->status;
        $category->save();

        return redirect('/category');
    }

    public function editView($id){
        $category = Category::where('id', $id)->get();
        return view('category/category_edit', ['category'=>$category]);
    }
    public function editCategory(Request $req, $id){

        $req->validate(
        [
            'name' => 'required',
        ],
        [
            'name.required' => 'Заполните это поля',
        ]
        );

        $category = Category::find($id);
        $category->name = $req->name;
        $category->status = $req->status;
        $category->save();

        return redirect('/category');
    }

    public function sortList(Request $req){
        $category = Category::find($req->id);
        $category->sort = $req->sort+1;
        $category->save();
    }
}
