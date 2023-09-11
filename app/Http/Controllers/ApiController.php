<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class ApiController extends Controller
{
    public function newsList($page = 1){
        $limit = 3;
        $array = News::where('status', '1')->orderBy('updated_at', 'DESC')->skip($limit * ($page - 1))->take(3)->get();
        $json = json_encode($array);
        return $json;
    }
    public function categoryList(){
        $array = Category::where('status', '1')->orderBy('updated_at', 'DESC')->get();
        $json = json_encode($array);
        return $json;
    }
    public function categoryNews($id){
        $array = News::where('category_id', $id)->where('status', '1')->orderBy('updated_at', 'DESC')->get();
        $json = json_encode($array);
        return $json;
    }
    public function newsSlug($slug){
        $array = News::where('slug', $slug)->where('status', '1')->orderBy('updated_at', 'DESC')->get();
        $json = json_encode($array);
        return $json;
    }
}
