<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id','name','email','is_approved','created_at')->where('is_admin', 'N')->get();
        return view('admin', compact('users'));
    }

    public function updateState(Request $request,$id){
        $user=User::find($id);
        if($user->is_approved == "N"){
            $new_status = "Y";
        }else{
            $new_status = "N";
        }
        $user->is_approved=$new_status;
        $flag = $user->save();
        echo json_encode(['flag' => $flag,"new_status"=>$new_status]);
    }
}
