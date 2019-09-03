<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Category;
use Illuminate\Support\Facades\Validator;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(12);
        //dd($citis);
        return view('bloodbank.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('bloodbank.posts.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

        $validate=$request->validate([

        'title' => 'required|max:255',
        'body' => 'required',
        'image'=>'required',
        'category_id'=>'required'
        ]);
        if($validate){
        $post=Post::create($request->all());
        return redirect('bloodbank/posts');
    }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('bloodbank.posts.show',compact('post'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $categories = Category::all();
         return view('bloodbank.posts.edit',compact(['post','categories']));
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
                $validate=$request->validate([

        'title' => 'required|max:255',
        'body' => 'required',
        'image'=>'required',
        'category_id'=>'required'
        ]);
        if($validate){
            $government = Post::find($id)->update($request->all());
 
        return redirect('bloodbank/posts');
            }
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $Post=Post::find($id);

        $Post->delete();


        return redirect('bloodbank/posts');
    }
}
