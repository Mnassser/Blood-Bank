<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Government;
use App\Model\City;
use App\Model\Client;
use Illuminate\Support\Facades\Validator;
class CitisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($governments_id)
    {

        $citis = City::where('government_id',$governments_id)->get();
        //dd($citis);
        return view('bloodbank.citis.index',compact(['citis','governments_id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($governments_id)
    {   
        
        if(count(Government::findOrFail($governments_id)->get())){

        return view('bloodbank.citis.create',compact('governments_id'));
        }
        else{
            return back();
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Government $government,Request $request)
    {   
                $validate=$request->validate([
            'name' => 'required|unique:cities|max:255',
             
        
        ]);

        if($validate){
        $city=$government->cities()->create($request->all());
        return redirect('bloodbank/governments/'.$government->id.'/citis');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$governments_id)
    {
        /*$clients = Client::where('city_id',$id)->get();

        return view('bloodbank.citis.show',compact(['id','clients']));*/
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$governments_id)
    {
        if(count(Government::findOrFail($governments_id)->get())){
        $city=City::findOrFail($id);
         return view('bloodbank.citis.edit',compact('governments_id','city'));
        }
        else{
            return back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Government $government,Request $request,$id)
    {   
        
                $validate=$request->validate([
                'name' => 'required|max:255'
        
        ]);

        if($validate){

            $city=$government->cities()->where('id',$id)->update($request->all('name'));
                //dd($city);
        return redirect('bloodbank/governments/'.$government->id.'/citis');
            }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$governments_id)
    {
      $city=City::find($id);

        $city->delete();


        return redirect('bloodbank/governments/'.$governments_id.'/citis');
    }
}
