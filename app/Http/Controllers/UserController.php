<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('haveAccess', 'user.index');
        $users = User::with('roles')->orderBy('id')->paginate(6);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $users = User::findOrFail($id);
        return view('users.edit', compact('users'));
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
        $validData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required'
        ]);

        $users = User::findOrFail($id);
        $users->name = $validData['name'];
        $users->email = $validData['email'];
        $users->save();

        return redirect()->route('users.index')->with('status_success', 'User Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /* this method is used for change the status of users in project
    (if user is enable o disable) */

    public function changeStatus($id)
    {
        $users = User::find($id);
        
        if ($users->isEnable) {
            $check = false;
        }else {
            $check = true;
        }
        $users->isEnable = $check;
        $users->save();
        
        return redirect('/users'); 

    }
}
