<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('bloodbank/categories/index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bloodbank/categories/create');
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
        'name' => 'required|unique:categories|max:255'
        
        ]);

        if($validate){

        $category=Category::create($request->all());
        return redirect('bloodbank/categories');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   


    public function edit($id)
    {
        $category = Category::find($id);
        return view('bloodbank/categories/edit',compact('category'));
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
        'name' => 'required|max:255'
        
        ]);

        if($validate){
        $Category = Category::find($id)->update($request->all());
 
        return redirect('bloodbank/categories');
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
              $category=Category::find($id);

            $category->delete();
            


        return redirect('bloodbank/categories');
    }
}
