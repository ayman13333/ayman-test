<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input['email'] = $request->email;
        // Must not already exist in the `email` column of `users` table
        $rules = array('email' => 'unique:users,email');

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('fail', 'fail');
        }

        else
        {
            User::create([
                'name' =>$request->name,
                'email' =>$request->email,
                'password'=>Hash::make('123456789'),
                'rule_id'=>$request->rule_id
            ]);
            return redirect()->route('users.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);

        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $input['email'] = $request->email;
        // Must not already exist in the `email` column of `users` table
        $rules = array('email' => 'unique:users,email');

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('fail', 'fail');
        }

        else
        {
            $update = array();
            $update['name'] = $request->name;
            $update['email'] = $request->email;

            User::where('id', $id)->update(
                $update
             );
            return redirect()->route('users.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->back();
    }
}
