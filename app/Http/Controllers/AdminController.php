<?php

namespace GiveMeYourHelp\Http\Controllers;

use GiveMeYourHelp\User;
use GiveMeYourHelp\Role;
use GiveMeYourHelp\Permission;

use Purifier;
use Session;
use Auth;
use Hash;
use Validator;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Instantiate a new AdminController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \GiveMeYourHelp\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('models.admins.show')->withUser($user);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(6);
        return view('models.admins.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $roles2 = array();

        foreach ($roles as $role) {
            $roles2[$role->id] = $role->name;
        }

        return view('models.admins.create')->withRoles($roles2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'username' => 'required|alpha_num|min:3|max:35|unique:users',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|max:40|confirmed',
            'role_id'  => 'required'
        ));

        $user = new User;

        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = $request->password;
        $user->role_id  = $request->role_id;

        $user->save();

        return redirect()->route('models.admins.show', $user)
            ->with('success', 'The user has been successfully created!');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \GiveMeYourHelp\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $roles2 = array();
        foreach ($roles as $role) {
            $roles2[$role->id] = $role->name;
        }
       
        return view('models.admins.edit')
            ->withUser($user)
            ->withRoles($roles2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \GiveMeYourHelp\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, array(
            'username' => 'required|unique:users,username,' . $user->id,
            'email'    => 'required|email|min:5|max:255|unique:users,email,' . $user->id,
            'new_password' => 'nullable|min:8|confirmed'
        ));

        $user->username = $request->username;
        $user->email    = $request->email;
        
        $user->save();

        return view('models.admins.index')->withUsers($users);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \GiveMeYourHelp\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        $users = User::latest()->paginate(6);
        return view('models.admins.index')
            ->withUsers($users)
            ->with('success', 'The user has been successfully deleted!');
    }
}