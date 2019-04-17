<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
use Auth;
use File;
use App\Post;
use Illuminate\Http\Request;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $posts = Post::where('title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('body', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $posts = Post::latest()->paginate($perPage);
        }

        return view('posts.index', compact('posts'));
    }
    
    public function index_with_type($type)
    {
        $posts = Post::latest()->where('type', $type)->paginate(20);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    public function create_with_type($type)
    {
        return view('posts.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title'                     => 'required|max:255',
            'slug'                      => 'required|alpha_dash|unique:posts|max:255',
            'type'                      => 'required|max:255',
            'body'                      => 'required',
            'image'                     => 'required|mimes:jpeg,jpg,gif,png'
            // 'preview' => 'required',
        ]);

        $smallImage = $request->file('image');

        if($smallImage)
        {
            $SmallImgName=str_random(20);
            $smallext=strtolower($smallImage->getClientOriginalExtension());
            $smallimgFullName=$SmallImgName.'.'.$smallext;
            $smalluploadPath='BlogImage/';
            $smallimgUrl=$smalluploadPath.$smallimgFullName;
            $success1=$smallImage->move($smalluploadPath,$smallimgFullName);



            if($success1){
                $post = new Post;
                $post->title                     = $request->title;
                $post->slug                      = $request->slug;
                $post->type                      = $request->type;
                $post->body                      = $request->body;
                $post->user_id                   = Auth::user()->id;
                $post->image                     = $smallimgUrl;
                $post->save();
                return redirect('/admin/posts/'.$request->input('type'))->with('flash_message', 'Post added!');
            }else{
                return redirect('/admin/posts/'.$request->input('type'))->with('flash_message', 'Post added not successfull!');
            }

        }else{
            return redirect('/admin/posts/'.$request->input('type'))->with('flash_message', 'Please Insert Valid Image!!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $image_path = public_path().'/uploads/'.$post->image;
        if (file_exists($image_path)) {
            $size = File::size($image_path);
        }else{
            $size = 0;
        }


        return view('posts.edit', compact('post', 'size', 'image_path'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $old_post = Post::find($id);
        if($request->hasFile('image'))
        {
            $smallImage = $request->file('image');
            $SmallImgName=str_random(20);
            $smallext=strtolower($smallImage->getClientOriginalExtension());
            $smallimgFullName=$SmallImgName.'.'.$smallext;
            $smalluploadPath='BlogImage/';
            $small_img_Url=$smalluploadPath.$smallimgFullName;
            $smallImage->move($smalluploadPath,$smallimgFullName);
            if ($old_post->image !="") {
                unlink($old_post->image);
            }

        }else{
            $small_img_Url = $old_post->image;
        }

        $old_post->title                     = $request->title;
        $old_post->slug                      = $request->slug;
        $old_post->type                      = $request->type;
        $old_post->body                      = $request->body;
        $old_post->user_id                   = Auth::user()->id;
        $old_post->image                     = $small_img_Url;
        $old_post->save();

        return redirect('/admin/posts/'.$request->input('type'))->with('flash_message', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
         // Delete old image
        $post = Post::find($id);
        if ($post->image !="") {
            $filename =  $post->image;
            $path=public_path().'/'.$filename;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        // Delete post
        Post::destroy($id);
        return redirect('/admin/posts/'.$post->type)->with('flash_message', 'Post deleted!');
    }
}
