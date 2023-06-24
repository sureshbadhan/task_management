<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Validator;
use DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function create_user(Request $req)
    {
    	$validatedData = $req->validate([
		    'name' => 'required',
		    'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users',
		    'password' => 'required',
		]);
		$data = array(
        	'name' => $req->name,
		    'email' => $req->email,
		    'password' => Hash::make($req->password),
		    'email_verified_at' => date('Y-m-d H:i:s'),
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
        );
        DB::table('users')->insert($data);

        return redirect()->route('users')->with('success', 'Record inserted successfully!');
    }

    public function users_list(Request $request)
    {
    	$users = DB::table('users')
            ->orderBy("id",'desc')
            ->paginate(10);
    	return view('users',['users' => $users]);
    }

    public function edit_user_view(Request $request)
    {
    	if($request->id)
    	{
    		$user = User::where('id', $request->id)->first();

    		return view('edit-user',[ 'user' => $user]);	
    	}
    	else{
    		return redirect()->route('users');
    	}
    }

    public function edit_user(Request $request)
    {
    	$validatedData = $request->validate([
		    'name' => 'required'
		]);
		$update_pass = '';
		if(!empty($request->password))
		{
			DB::table('users')
            ->where('id', $request->user_id)
            ->update([
            	'name' => $request->name,
			    'updated_at' => date('Y-m-d H:i:s'),
			   	'password' => Hash::make($request->password)
            ]);
		}else{
			DB::table('users')
            ->where('id', $request->user_id)
            ->update([
            	'name' => $request->name,
			    'updated_at' => date('Y-m-d H:i:s'),
            ]);
		}
    	
        return redirect('/edit-user/'.$request->user_id)->with('success', 'Record updated successfully!');
    }

    public function delete_user(Request $request)
    {
    	if($request->id)
    	{
    		User::where('id', $request->id)->delete();
    		return redirect()->route('users')->with('success', 'Record deleted successfully!');	
    	}else{
    		return redirect()->route('users')->with('success', 'Record not deleted!');
    	}
    }
}
