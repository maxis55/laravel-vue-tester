<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return PostResource::collection(Post::latest()->paginate(5));
    }

    public function store(Request $request){
        $post = $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'content' => 'required|min:3'
        ]);


        $created_post = Post::create($post);

        return new PostResource($created_post);
    }

    public function show(Post $post){
        return new PostResource($post);
    }
}
