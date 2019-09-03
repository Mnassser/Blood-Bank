<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Model\Contact;
use App\Model\Setting;
use App\Model\Token;
use App\Mail\ResetPassword;

class ClientController extends Controller 
{

public function store(Request $request){

    $validate = Validator::make($request->all(),[

        'name'=>'required',
        'email'=>'required|unique:clients',
        'bod'=>'required',
        'phone'=>'required|unique:clients',
        'password'=>'required|confirmed',
        'blood_type_id'=>'required',
        'city_id'=>'required'

    ]);
        if($validate->fails()){

           return response($validate->errors());
        }
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = str_random(60);
        $client->save();
        return apiresponse(1,'done',[
            'api_token'=>$client->api_token,
            'client'=>$client

        ]);

        }
        public function login(Request $request){


    $validate = Validator::make($request->all(),[
            'phone'=>'required',
            'password'=>'required'
    ]);
         if($validate->fails()){

           return response($validate->errors());
        }
        $client=Client::where('phone','=',$request->phone)->first();
        
        if($client){
            if(Hash::check($request->password,$client->password)){


            return apiresponse(1,'logged in',$client);
            return auth()->gaurd('api')->validate($request->all());

            }
            else{

                return apiresponse(0,'wrong password',null);
            }


            }
            else{
                return apiresponse(0,'this phone is not exiests ',null);
            }
        }

        public function update(Request $request,$id){

                $client_id = Client::find($id);
                if($client_id){
        $validate = Validator::make($request->all(),[

        'name'=>'required',
        
        'bod'=>'required',
        
        
        'blood_type_id'=>'required',
        'city_id'=>'required'

    ]);
        if($validate->fails()){

           return response($validate->errors());
        }
        $request->merge(['password' => bcrypt($request->password)]);
        $client = $client_id->update($request->all());
        //$client->api_token = str_random(60);
        //$client->save();
        return apiresponse(1,'done',[
        //'api_token'=>$client->api_token,
            'client'=>$client

        ]);

        }


        }


        public function contact(Request $request){
           
          // $setting = Setting::find(1);

           //return apiresponse(1,'DATA',$setting);

        $validate = Validator::make($request->all(),[

        'name'=>'required',
        
        'email'=>'required',
        'phone'=>'required',
        'subject'=>'required',
        'message'=>'required'

    ]);
        if($validate->fails()){

           return response($validate->errors());
        }
        else{

        $contact = Contact::create($request->all());
        
        return apiresponse(1,'the data had been uploaded',$contact);
    }

    }




    public function resetpassword(Request $request){


        $validate = Validator::make($request->all(),[


        'phone'=>'required'
      

    ]);
        if($validate->fails()){

           return response($validate->errors());
        }
        else{

        
        $client=Client::where('phone',$request->phone)->first();

        if($client){

            $code=rand(1111,9999);
                $client->pin_code =$code;
                $client->save();
            Mail::to($client->email)
            ->bcc("juko2050@gmail.com")
            ->queue(new ResetPassword($code));
            return apiresponse(1,'The Code Has Been Sent Is:',$code);
        }
        else{

            return response()->json('Not Exists');


        }
        
       
    }


    }

    public function restorepassword(Request $request){


        $validate = Validator::make($request->all(),[


        'phone'=>'required',
        'pin_code'=>'required',
        'password'=>'required|confirmed'
      

    ]);
        if($validate->fails()){

           return response($validate->errors());
        }
        else{

        
        $client=Client::where('phone',$request->phone)->where('pin_code',$request->pin_code)->first();


        if($client){    
            $password=bcrypt($request->password);
            
                $password= Client::where('phone',$request->phone)->where('pin_code',$request->pin_code)->update(array('password' => $password));
            return response()->json('the password has been changed');
            }
            else{

            return response()->json(' look at the data you inserted');


        }
        
       
    }


    }




    public function registerToken(Request $request){




        $validate = Validator::make($request->all(),[

        //'client_id'=>'required',
        'platform'=>'required',
        'token'=>'required'
        
      

    ]);
        if($validate->fails()){

           return response($validate->errors());
        }

        Token::where('token',$request->token)->delete();

        $token = $request->user()->tokens()->create($request->all());


    return apiresponse(1,'',$token);
    }


   public function notificationSettings(Request $request){




        $validate = Validator::make($request->all(),[

        //'client_id'=>'required',
      'blood_types' => 'required|exists:blood_types,id',
       'governments' => 'required|exists:governments,id'
      

    ]);
        if($validate->fails()){

           return response($validate->errors());
        }
        //// ''''' Work on here '''''//////
       $client = $request->user();
       $government =$client->governments()->sync($request->governments);
       $blood_type =$client->BloodTypes()->sync($request->blood_types);
       /*$data =[
           'governments' => $client ->governments()->pluck('id')->toArray() ,
           'blood_types'  => $client ->BloodTypes()->pluck('id')->toArray()
       ];
*/
    return apiresponse(1,'',$data);
    }



   



        }
        


?>