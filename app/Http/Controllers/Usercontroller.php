<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
//use Mail;
use Illuminate\Support\Facades\Session;

class Usercontroller extends Controller
{
    public function register(Request $request)
    {
        //validations
        $incoming_requests = $request->validate([
            'name'=>['required','min:3'],
            'email'=>'required|email',
            'refferal_code'=>['nullable','exists:App\Models\User,refferal_code'],
        ]);
       
        if(!empty($incoming_requests['refferal_code'])){
            //get current point of particular refferal code user
            $user_data = DB::select('SELECT users.id AS user_id, points.points AS points FROM users LEFT JOIN points ON users.id=points.user_id WHERE users.refferal_code = ?', [$incoming_requests['refferal_code']]); 
            //convert std object to array
            $user_data = json_decode(json_encode($user_data, true), true);
            
            if(!empty($user_data)){
                $points=$user_data[0]['points']+1;
                //update points for refferal code user only if valid referral code
                Point::where('id', $user_data[0]['user_id'])->update(array('points' => $points));
            }
        }
        //getting last inserted id
        empty(DB::table('users')->orderBy('id', 'DESC')->first())?$last_inserted_id= json_decode('{"id":0}'):$last_inserted_id=DB::table('users')->orderBy('id', 'DESC')->first();
        ($last_inserted_id->id==0)?$new_inserted_id=$last_inserted_id->id+2:$new_inserted_id=$last_inserted_id->id+1;
        $new_inserted_id=$last_inserted_id->id+1;

        //creating a new referral code  to new users
        $incoming_requests['refferal_code']=$new_inserted_id.substr($incoming_requests['name'],0,3);
        //add user entry in user table
        $user =User::create($incoming_requests);
        auth()->login($user);
        $point_data = array("user_id"=>$user->id,"points"=>0);
        //add user entry with default points in  point table
        $points =Point::create($point_data); //successful_page_after_register
        return view('successful_page_after_register', ['refferal_code' => $incoming_requests['refferal_code']]);       
        //return redirect('/get_users');
    }


    public function list_users()
    {
        //check user alreadylogged or not
        if(!empty(auth()->id())){
            $users = User::where(['id' => auth()->id(),])->get();
            if(!empty($users)){
                $user_data = json_decode(json_encode($users, true), true);
                if(!empty($user_data)){
                    $users_list = DB::select('SELECT users.id AS user_id, points.points FROM users LEFT JOIN points ON users.id=points.user_id WHERE 1'); 
                    //convert std object to array
                    $users_list = json_decode(json_encode($users_list, true), true); 
                    return view('list_users', ['user_data' => $user_data[0],'users_list' => $users_list]);
                   // return view('list_users', ['user_data' => $user_data[0]]);
                }
                else
                {
                    return redirect('/dashboard');
                }
            } 
        }  
        else{
            return redirect('/login');
        } 
    }


    public function login(Request $request)
    {
        //validations
        $incoming_requests = $request->validate([
            'name'=>['required','min:3'],
            'email'=>'required|email',
        ]);
        $users = User::where([
                'name' => $incoming_requests['name'],
                'email' => $incoming_requests['email']
        ])->get();
        //check credential valid or not
        if(!empty($users)){
            $user_data = json_decode(json_encode($users, true), true);
            if(!empty($user_data)){
                if(Auth::loginUsingId($user_data[0]['id'])){
                    $request->session()->regenerate();
                    return view('dashboard', ['user_data' => $user_data[0]]);
                }
            }
            else{
                return view('login');
            }
        }      
    }


    public function dashboard()
    {
        //check user alreadylogged or not
        if(!empty(auth()->id())){
            $users = User::where(['id' => auth()->id(),])->get();
            if(!empty($users)){
                $user_data = json_decode(json_encode($users, true), true);
                if(!empty($user_data)){
                    return view('dashboard', ['user_data' => $user_data[0]]);
                }
                else{
                    return redirect('/login');
                }
            } 
        }  
        else{
            return redirect('/login');
        }   
    }


    //logout
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/login');           
    }

}
