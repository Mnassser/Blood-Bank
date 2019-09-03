<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\Client;
use Illuminate\Support\Facades\Validator;
use App\Model\Contact;
use App\Model\Setting;
use App\Model\Government;
use App\Model\City;
use App\Model\BloodType;
use App\Model\Post;
use App\Model\Order;
use App\Model\Clientable;
use App\Model\Notification;
use App\Model\Token;

class MainController extends Controller
{

public function governments(){


    $governments = Government::all();

    return apiresponse(1,'succses',$governments);


}


public function cities(Request $request){

    if(!empty($request->government_id)){



    $cities = City::where('government_id',$request->government_id)->get();
        


        }
    elseif(empty($request->government_id)){


    $cities = City::all();    
    

    }
    


    return apiresponse(1,'succses',$cities);



}
public function bloodtypes(){

    $blood_types=BloodType::all();

    return apiresponse(1,'succses',$blood_types);


    }
    public function  posts(Request $request){
 
        if(!empty($request->category_id)){
            $posts=Post::where('category_id',$request->category_id)->get();
       }
         elseif(!empty($request->search)){
            $posts=Post::where('title','LIKE','%'.$request->search.'%')->get();
       }
       else{

        $posts=Post::all();
       }
        return apiresponse(1,'succsess',$posts);



    }

public function request(Request $request){

    $validate = Validator::make($request->all(),[

        'name'=>'required',
        'phone'=>'required',
        'blood_type_id'=>'required',
        'amount'=>'required',
        'hospital_name'=>'required',
        'latitude'=>'required',
        'longitude'=>'required',
        'city_id'=>'required',


    ]);
        if($validate->fails()){

           return response($validate->errors());
        }
       
            $order=$request->user()->orders()->create($request->all());

            ////////////////////////////////////////

         

            $clientsIds = $order->city->government->clients()->whereHas('BloodType', function ($q) use ($request,$order) {
                         $q->where('blood_type_id', $order->blood_type_id);
                    })->pluck('clients.id')->toArray();




               // dd($clientsIds);
                     
       
           
        if(count($clientsIds)){
            $notification = $order->Notifications()->create([

                'title'=>'please give me blood',
                //'content'=>$request->user()->name.'need donator',
                'body'=>$order->id,
            ]);

            $notification->clients()->attach($clientsIds);
            $token = Token::where('token','!=','')->whereIn('client_id',$clientsIds)->pluck('token')->toArray();
            //dd($token);

            if(count($token)){

               $title=$notification->title;
                $body=$notification->title;
                $data=[


                'order_id'=>$order->id


                ];

                $send = notifyByFirebase($title,$body,$token,$data);
                //dd($send);
            }
           

        
                }

        
    
            return apiresponse(1,'succsess',$order);

}

    

        
    public function orders(){


    $orders = Order::all();

    return apiresponse(1,'succses',$orders);


}


    public function order(Request $request){


    $order = Order::find($request->id);

    return apiresponse(1,'succses',$order);


}
public function favourite(Request $request){


      $validate = Validator::make($request->all(),[

        //'client_id'=>'required',
        'clientable_id'=>'required',
        'clientable_type'=>'required'



    ]);
        if($validate->fails()){

           return response($validate->errors());
        }
        else{

            //$clientable_id= $request->clientable_id;
           // $clientable_type= $request->clientable_type;
            $clientable = $request->user()->posts()->toggle($request->clientable_id,$request->clientable_type);

                return apiresponse(1,'succses',$clientable);


        }

}


public function favourites(Request $request){
        $clientable = $request->user()->posts()->get();
                return apiresponse(1,'succses',$clientable);

        }

                public function singleOrder(Request $request){
        
            $orders = Order::find($request->id);

                return apiresponse(1,'succses',$orders);
        }


}
?>





