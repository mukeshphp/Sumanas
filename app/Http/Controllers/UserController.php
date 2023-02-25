<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(5);
		//dd($users);
        return view('users.index', compact('users'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('users.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        
        User::create($request->post());

        return redirect()->route('user.list')->with('success','User has been created successfully.');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function edit(Request $req, $id)
    {
		$userInfo = User::find($id);
        return view('users.edit',compact('userInfo'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
		
        $name = $request->input('name');
		$email = $request->input('email');
		
		$userInfo = User::find($id);
		$userInfo->name = $name;
		$userInfo->email = $email;
        $userInfo->save();

        return redirect()->route('user.list')->with('success','User Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {	
        User::find($id)->delete();
        return redirect()->route('user.list')->with('success','User has been deleted successfully');
    }
}
