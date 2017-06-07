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

use GiveMeYourHelp\Http\Requests\EditRequest;
    
class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {        
        $this->middleware('auth');
        
        $this->middleware('admin', ['only' => [
            'create',
            'index',
        ]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \GiveMeYourHelp\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('models.users.show')->withUser($user);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(6);
        return view('models.users.index')->withUsers($users);
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
            if ($role->name != 'founder') {
                $roles2[$role->id] = $role->name;
            }
        }

        return view('models.users.create')->withRoles($roles2);
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
        $user->password = Hash::make($request->password);
        $user->role_id  = $request->role_id;

        $user->save();

        return redirect()->route('users.show', $user)
            ->with('success', 'The user has been successfully created!');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \GiveMeYourHelp\User  $user
     * @param  \GiveMeYourHelp\EditRequest $request
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, EditRequest $request)
    {
        $roles = Role::all();
        $roles2 = array();
        foreach ($roles as $role) {
            if ($role->name != 'founder') {
                $roles2[$role->id] = $role->name; 
            } else {
                if ($user->role_id == 5) {
                    $roles2[$role->id] = $role->name;
                }
            }            
        }

        return view('models.users.edit')
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
        if (!Auth::user()->isAdmin()) {
            $this->validate($request, array(        
                'username' => 'required|alpha_num|unique:users,username,' . $user->id,
                'email'    => 'required|email|min:5|max:255|unique:users,email,' . $user->id,
                'old_password' => 'nullable|min:8',
                'new_password' => 'nullable|min:8|different:old_password|confirmed'
            ));

            $user->username = $request->username;
            $user->email    = $request->email;

            if (!empty($request->input('old_password'))) {
                if (!empty($request->input('new_password'))) {
                    if (Hash::check($request->old_password, $user->password)) {
                        $user->password = Hash::make($request->input('new_password'));
                    } else {
                        return redirect()->back()->withErrors(array('message' => 'Login field is required.'));
                    }
                } else {
                    return redirect()->back()->withErrors($validation, 'new_password');
                }
            }
        } else {
            $this->validate($request, array(        
                'username' => 'required|unique:users,username,' . $user->id,
                'email'    => 'required|email|min:5|max:255|unique:users,email,' . $user->id,
                'role_id'  => 'required',
                'password' => 'nullable|min:8|confirmed'
            ));

            $user->username = $request->username;
            $user->email    = $request->email;
            $user->role_id  = $request->role_id;
                        
            if (!empty($request->input('password'))) {
                $user->password = Hash::make($request->password);
            }  
        }

        $user->save();
        
        if (!Auth::user()->isAdmin()) {
            return redirect('/home')
                ->with('success', 'Your account has been successfully updated!');
        }
        return view('models.users.show')
            ->withUser($user)
            ->with('success', 'The account has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \GiveMeYourHelp\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!Auth::user()->isAdmin()) {
            $user->delete();
            
            return redirect('/home')
                ->with('success', 'Your acocunt has been successfully deleted!');
        } else {
            if ($user->role_id == 5) {
                $users = User::all();
            
                foreach ($users as $db_user) {
                    if ($db_user != $user && $db_user->role_id == 5) {
                        $user->delete(); 
                        return redirect()->route('users.index')
                            ->with('success', 'The user has been successfully deleted!');
                    }
                }
            
                return redirect()->route('users.index')
                    ->with('error', 'The founder can\'t be deleted!');
            }
        }
        
        $user->delete();
        
        return redirect()->route('users.index')
            ->with('success', 'The user has been successfully deleted!');
    }
}