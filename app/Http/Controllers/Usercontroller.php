<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Point;

class Usercontroller extends Controller
{
    public function register(Request $request)
    {
        $incoming_requests = $request->validate([
            'name'=>['required','min:3'],
            'email'=>'required|email',
            'refferal_code'=>['nullable','exists:App\Models\User,refferal_code'],
        ]);
       
        if(!empty($incoming_requests['refferal_code'])){
  
            $users = User::where('refferal_code', $incoming_requests['refferal_code'])->get();
            $users_data = json_decode(json_encode($users, true), true);
            //get current point of particular refferal code user
            $points = Point::where('user_id',$users_data[0]['id'])->get();
            $points_data = json_decode(json_encode($points, true), true);
            if(!empty($users)){
                $points=$points_data[0]['points']+1;
                //update points for refferal code user 
                Point::where('id', $users_data[0]['id'])->update(array('points' => $points));
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
        //add user entry in  point table
        $user =Point::create($point_data);        
        return redirect('/get_users');
    }
    public function list_users()
    {
        $user_data = DB::select('SELECT users.id AS user_id, points.points FROM users LEFT JOIN points ON users.id=points.user_id WHERE 1'); 
        //convert std object to array
        $user_data = json_decode(json_encode($user_data, true), true); 
        return view('list_users', ['user_data' => $user_data]);
    }

}
