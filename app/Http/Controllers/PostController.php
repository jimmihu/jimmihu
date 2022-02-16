<?php

namespace App\Http\Controllers;

use Mail;
use App\Http\Controllers\Controller;
use App\Models\Auth\User\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Validator;
use Input;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publish = Post::where('status', 'publish')->paginate(10);
        $draft = Post::where('status', 'draft')->paginate(10);
        $thrash = Post::where('status', 'thrash')->paginate(10);
        return view('backend.auth.post.index',["publishs"=>$publish,"drafts"=>$draft,"thrashs"=>$thrash]);
    }

    public function preview()
    {
        $publish = Post::where('status', 'publish')->paginate(10);
        return view('backend.auth.post.preview',["publishs"=>$publish]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.auth.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|min:20',
            'content' => 'required|max:1000|min:200',
            'category' => 'required|max:255|min:3',
            'status' => 'required|max:255'
            
        ]);
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'status' => $request->status
        ]);
        return redirect()->intended(route('admin.post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::where('id', $id)->first();
        return view('backend.auth.post.edit',["post"=>$post]);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|min:20',
            'content' => 'required|max:1000|min:200',
            'category' => 'required|max:255|min:3',
            'status' => 'required|max:255'
            
        ]);
        Post::where('id', $id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'status' => $request->status
        ]);
        return redirect()->intended(route('admin.post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->update([
            'status' => "thrash"
        ]);
        return redirect()->intended(route('admin.post.index'));
    }
}
