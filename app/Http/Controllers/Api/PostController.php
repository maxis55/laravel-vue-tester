<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\JWTAuth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PostResource::collection(
            Auth::guard('api')->user()->posts()->latest()->paginate(20)
        );
    }

    public function store(Request $request){

        $post = $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'content' => 'required|min:3'
        ]);

        $created_post = Post::create($post);

        return new PostResource($created_post);
    }


    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'content' => 'required|min:3'
        ]);

        $post->update($request->only(['name','content']));
        $post->save();

        return new PostResource($post);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        try {
            $post->delete();
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

        return response()->json('Success');
    }

    public function show(Post $post){
        return new PostResource($post);
    }
}
