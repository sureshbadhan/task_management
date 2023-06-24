<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Validation\Validator;
use DB;

class TaskController extends Controller
{
    public function task_list(Request $request)
    {
    	$tasks = DB::table('tasks')
            ->select('tasks.*','users.name as username')
            ->leftJoin('users', 'tasks.assigned_to', '=', 'users.id')
            ->orderBy("tasks.id",'desc')
            ->paginate(10);
    	return view('tasks',['tasks' => $tasks]);
    }
    public function get_users()
    {
    	$users = User::all();

    	return $users;
    }
    public function add_task_view()
    {
    	$users = $this->get_users();

    	return view('add-task',['users' => $users]);
    }
    public function add_task(Request $request)
    {
    	$validatedData = $request->validate([
		    'name' => 'required',
		    'description' => 'required',
		    'priority' => 'required',
		    'assigned_to' => 'required',
		    'status' => 'required',
		]);


        $data = array(
        	'name' => $request->name,
		    'description' => $request->description,
		    'priority' => $request->priority,
		    'assigned_to' => $request->assigned_to,
		    'status' => $request->status,
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
        );
        DB::table('tasks')->insert($data);

        return redirect()->route('tasks')->with('success', 'Record inserted successfully!');
    }

    public function edit_task_view(Request $request)
    {
    	if($request->id)
    	{
    		$users = $this->get_users();
    		$task = Task::where('id', $request->id)->first();

    		return view('edit-task',['task' => $task, 'users' => $users]);	
    	}
    	else{
    		return redirect()->route('tasks');
    	}
    }

    public function edit_task(Request $request)
    {
    	$validatedData = $request->validate([
		    'name' => 'required',
		    'description' => 'required',
		    'priority' => 'required',
		    'assigned_to' => 'required',
		    'status' => 'required',
		]);
    	DB::table('tasks')
            ->where('id', $request->task_id)
            ->update([
            	'name' => $request->name,
			    'description' => $request->description,
			    'priority' => $request->priority,
			    'assigned_to' => $request->assigned_to,
			    'status' => $request->status,
			    'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/edit-task/'.$request->task_id)->with('success', 'Record updated successfully!');
    }

    public function delete_task(Request $request)
    {
    	if($request->id)
    	{
    		Task::where('id', $request->id)->delete();
    		return redirect()->route('tasks')->with('success', 'Record deleted successfully!');	
    	}else{
    		return redirect()->route('tasks')->with('success', 'Record not deleted!');
    	}
    }

    public function pending_task()
    {
    	$username = '';
    	if(isset($_GET['user_id']) && !empty($_GET['user_id']))
    	{
    		$username = $this->get_user_name($_GET['user_id']);
    		$tasks = DB::table('tasks')
            ->select('tasks.*','users.name as username')
            ->leftJoin('users', 'tasks.assigned_to', '=', 'users.id')
            ->where('tasks.status','pending')
            ->where('users.id',$_GET['user_id'])
            ->orderBy("tasks.id",'desc')
            ->paginate(10);
    	}
    	else{
    		$tasks = DB::table('tasks')
            ->select('tasks.*','users.name as username')
            ->leftJoin('users', 'tasks.assigned_to', '=', 'users.id')
            ->where('tasks.status','pending')
            ->orderBy("tasks.id",'desc')
            ->paginate(10);
    	}

    	return view('pending-tasks',['tasks' => $tasks, 'username' => $username]);
    }
    public function completed_task()
    {
    	$username = '';
    	if(isset($_GET['user_id']) && !empty($_GET['user_id']))
    	{
    		$username = $this->get_user_name($_GET['user_id']);
    		$tasks = DB::table('tasks')
            ->select('tasks.*','users.name as username')
            ->leftJoin('users', 'tasks.assigned_to', '=', 'users.id')
            ->where('tasks.status','completed')
            ->where('users.id',$_GET['user_id'])
            ->orderBy("tasks.id",'desc')
            ->paginate(10);
    	}
    	else{
    		$tasks = DB::table('tasks')
            ->select('tasks.*','users.name as username')
            ->leftJoin('users', 'tasks.assigned_to', '=', 'users.id')
            ->where('status','completed')
            ->orderBy("tasks.id",'desc')
            ->paginate(10);
    	}

    	return view('completed-task',['tasks' => $tasks, 'username' => $username]);
    }

    public function get_user_name($user_id)
    {
    	$user = User::where('id', $user_id)->first();

    	return $user->name;
    }
}
