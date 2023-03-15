<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        $point_data = array("user_id"=>$user->id,"points"=>0);
        //add user entry with default points in  point table
        $user =Point::create($point_data); 
        return view('successful_page_after_register', ['refferal_code' => $incoming_requests['refferal_code']]);       
        //return redirect('/get_users');
    }


    public function list_users()
    {
        $user_data = DB::select('SELECT users.id AS user_id, points.points FROM users LEFT JOIN points ON users.id=points.user_id WHERE 1'); 
        //convert std object to array
        $user_data = json_decode(json_encode($user_data, true), true); 
        return view('list_users', ['user_data' => $user_data]);
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
        
        if(!empty($users)){
            $user_data = json_decode(json_encode($users, true), true);
            //set session vaue at the time of login
            session(['useremail' => $user_data[0]['email']]);
            
            return view('dashboard', ['user_data' => $user_data]); 
        }
        else{
            return view('login');
        }    
    }


    public function logout(Request $request)
    {
        //unset session vaue at the time of logout
        session()->forget('useremail'); 
        return redirect('/login');
            
    }

}
