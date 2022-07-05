<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $post;

    public  function __construct(Post $postObj)
    {
        $this->post = $postObj;

    }

     /**
	 * It will store the post.
     *
	 * @param Request $request
     *
     * @return \Illuminate\Http\Response
	 */
    public function store(PostRequest $request){

        $result =  $this->post->store($request->all());

        if(!$result){
             return response()->json(['message'=>$this->post->errors['message'],'status_code'=>$this->post->errors['status_code']]);
        }

        return response()->json(['message'=>'Post has been added']);

    }
}
