<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Auth;

use App\Exceptions\AccessDeniedException;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json(['posts' => Post::withTrashed()->orderBy('created_at', 'desc')->with('user')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkPermission('create-post');
        $post = new Post;
        $post->fill($request->input());
        $post->user_id = Auth::user()->id;
        $post->save();
         
        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->checkPermission('view-post');

        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->checkPermission('edit-post');

        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->checkPermission('edit-post');

        $post = Post::findOrFail($id);
        $post->fill($request->input());
        $post->user_id = Auth::user()->id;
        $post->save();
        
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkPermission('trash-post');

        $post = Post::findOrFail($id);
         
        $post->delete();
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->checkPermission('delete-post');

        $post = Post::onlyTrashed()->findOrFail($id);
         
        $post->forceDelete();
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $this->checkPermission('restore-post');

        $post = Post::onlyTrashed()->findOrFail($id);
         
        $post->restore();
    }

    private function checkPermission($permissionName) {
        if (!Auth::user()->can($permissionName)) {
            throw new AccessDeniedException("Access denied!");  
        }
    }
}
