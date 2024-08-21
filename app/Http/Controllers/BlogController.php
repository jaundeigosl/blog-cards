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

        $name = $request->input('name')[$id-1];
     
        $description = $request->input('description')[$id-1];

        return view('blog.specific-post',['name'=> $name,
    'description' => $description,]);
    }

    public function createPost(){
        
        return view('blog.create-post');
    }

    public function deletePost(Request $request){

        $cardsList = session('cardsList');

        $idToDelete = $request->input('idToDelete');

        for($i = 0; $i < sizeof($cardsList); $i++){
            $card = $cardsList[$i];
            if($card['id']==$idToDelete){
                $index = $i;
            }
        }

        unset($cardsList[$index]);

        session(['cardsList'=>$cardsList]);
 
        return view('blog.blog-list',['newCollection' => $cardsList]);
        
    }

}
