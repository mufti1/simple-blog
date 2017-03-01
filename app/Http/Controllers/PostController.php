<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function publicHomePage(Request $request)
    {
        if ($request->input('type') == 'recentPosts') {
             $posts = Post::orderBy('created_at','asc')->paginate(3);
             $description = 'Recent Posts';
        }
        elseif ($request->input('type') == 'mostCommented') {
            $posts = Post::orderBy('comment_count','desc')->paginate(3);
            $description = 'Top Commented Posts';
        }
        elseif ($request->input('type') == 'mostVisited') {
            $posts = Post::orderBy('visit_count','desc')->paginate(3);
            $description = 'Top Visited Posts';
        }
        else{
            $posts = Post::orderBy('created_at','asc')->paginate(3);
            $description = 'Recent Posts';
        }

        $data = array(
                'posts'=>$posts,
                'description'=>$description
            );

        return view('blog/home', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedInUserId = Auth::id();
        $posts = Post::all()->where('user_id',$loggedInUserId);
        return view('admin/admin', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new post;

        $postTitle = $request->title;
        $postBody = $request->body;
        $postUserId = Auth::id();

        $post->user_id = $postUserId;
        $post->title = $postTitle;
        $post->body = $postBody;
        $post->comment_count = 0;
        $post->visit_count = 0;

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $data = array(
                'id' => $id,
                'post' => $post
            );
        return view('blog.view_post', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post= Post::find($id);

        if (isset($request->commentCount)) {
            $commentCount = $request->commentCount;
            $post->comment_count = $commentCount;
        }

        if (isset($request->visitCount)) {
            $visitCount = $request->visitCount;
            $post->visit_count = $visitCount;
        }

        if (isset($request->title)) {
            $postTitle = $request->title;
            $post->title = $postTitle;
        }

        if (isset($request->body)) {
            $postBody = $request->body;
            $post->body = $postBody;
        }

        $post->save();

        if (isset($request->editForm)) {
            return redirect()->route('posts.index');
        }else{
            return redirect()->route('posts.show', ['id'=>$id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('posts.index');
    }

}
