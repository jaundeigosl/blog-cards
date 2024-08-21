<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;
use Illuminate\Http\Request;



class BlogController extends Controller
{
    public function index(Request $request){

        
        $cards = [];
        $cardsList = [];
        $data = $request->all();

        
        if(!empty($data)){

            $info = new BlogRepository($request);

            $cards = $info->getInfoBlog($data['id'],$data['name'],$data['description'],$data['btn']);


            if(session('cardsList')!=null){
                $cardsList = session('cardsList');
    
                $existe = false;
                
                foreach($cardsList as $card){
                    if($card['id']==$cards['id']){
 
                        $existe = true;
                    }
                    
                }

                if(!$existe){
                    array_push($cardsList,$cards);
                }

            }else{

                array_push($cardsList,$cards);
            }

            session(['cardsList' => $cardsList]);
        }    

            return view('blog.blog-list', ['newCollection'=>$cardsList]);
    }

    public function specificPost(Request $request){



        $id = $request->input('id');

        $name = $request->input('name');
     
        $description = $request->input('description');

        return view('blog.specific-post',['name'=> $name,
    'description' => $description,]);
    }

    public function createPost(Request $request){

        $idActual = 1;
    
        if(session('idActual')!=null){
            $idActual = session('idActual');
            $idActual++;
        }
        
        session(['idActual' => $idActual]);

        return view('blog.create-post', ['idActual' => $idActual]);
    }

    public function deletePost(Request $request){

        $cardsList = session('cardsList');

        $idToDelete = $request->input('idToDelete');


        foreach($cardsList as $card => $value){
            if($value['id']==$idToDelete){
                $key = $card;
            }
        }

        unset($cardsList[$key]);

        session(['cardsList'=>$cardsList]);
 
        return view('blog.blog-list',['newCollection' => $cardsList]);
        
    }

}
