<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request){
        $cards = [];

        $data = $request->all();

        if(!empty($data)){

            $info = new BlogRepository($request);

            $cards = $info->getInfoBlog($data['id'],$data['name'],$data['description'],$data['btn']);

        }

        return view('blog.blog-list', ['news'=>$cards,]);
    }

    public function specificPost(Request $request){

        $id = $request->input('id');

        $name = $request->input('name')[$id-1];
     
        $description = $request->input('description')[$id-1];

        return view('blog.specific-post',['name'=> $name,
    'description' => $description,]);
    }

    public function createPost(Request $request){
        return view('blog.create-post');
    }

}
