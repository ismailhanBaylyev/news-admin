<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class Newss extends Controller
{
    public function listView(string $name = null){
        Paginator::useBootstrap();
        $news = News::orderBy($name != null ? $name : 'sort', 'ASC')->paginate(10);
        return view('news/news', ['news'=>$news]);
    }
    public function addView(){
        $category = Category::where('status', 1)->get();
        return view('news/news_add', ['category'=>$category]);
    }
    public function addNews(Request $req){

        $req->validate( 
        [
            'name' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => 'required | max:10240 | mimes:jpg,jpeg,webp,png',
        ],
        [
            'name.required' => 'Заполните это поля',
            'slug.required' => 'Заполните это поля',
            'content.required' => 'Заполните это поля',
            'category.required' => 'Выберите категорию',
            'image.required' => 'Выберите изображение',
            'image.mimes' => 'Неправильный формат. Допустимый формат (jpg, jpeg, png, webp)',
            'image.max' => 'Максимальный размер файла 10мб',
        ]
        );

        $news = new News;
        $news->name = $req->name;
        $news->slug = $req->slug;
        $news->content = $req->content;
        $news->category_id = $req->category;
        $news->image = $req->file('image')->store('public/images');;
        $news->status = $req->status;
        $news->save();

        return redirect('/news');
    }

    public function editView($id){
        $news = News::where('id', $id)->get();
        $category = Category::where('status', 1)->get();
        return view('news/news_edit', ['category'=>$category, 'news'=>$news]);
    }
    public function editNews(Request $req, $id){

        $req->validate( 
            [
                'name' => 'required',
                'slug' => 'required',
                'category' => 'required',
                'image' => 'max:10240 | mimes:jpg,jpeg,webp,png',
            ],
            [
                'name.required' => 'Заполните это поля',
                'slug.required' => 'Заполните это поля',
                'category.required' => 'Выберите категорию',
                'image.mimes' => 'Неправильный формат. Допустимый формат (jpg, jpeg, png, webp)',
                'image.max' => 'Максимальный размер файла 10мб',
            ]
            );
    
            $news = News::find($id);
            $news->name = $req->name;
            $news->slug = $req->slug;
            $news->content = $req->content;
            $news->category_id = $req->category;
            if(isset($req->image)){
                $news->image = $req->file('image')->store('public/images');;
            }
            $news->status = $req->status;
            $news->save();
    
            return redirect('/news');
    }

    public function sortList(Request $req){
        $news = News::find($req->id);
        $news->sort = $req->sort+1;
        $news->save();
    }
}
