<?php

namespace App\Http\Controllers;

use App\Model\Client;
use Illuminate\Http\Request;
class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clients = Client::all();
        //dd($citis);
        return view('bloodbank.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



  
    public function update(Request $request, $id)
    {
        $client=Client::find($id);

        if($client->active == 1){

            $client->active = 0;
            $client->save();
        }

        elseif($client->active == 0){

            $client->active = 1;
            $client->save();

}
else{
    return back();

}
 return back();
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $client=Client::find($id);

        $client->delete();


        return redirect('bloodbank/clients');
    }
}
