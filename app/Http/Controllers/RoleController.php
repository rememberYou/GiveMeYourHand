<?php

namespace GiveMeYourHelp\Http\Controllers;

use GiveMeYourHelp\User;
use GiveMeYourHelp\Role;
use GiveMeYourHelp\Permission;

use Purifier;
use Session;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Instantiate a new RoleController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->paginate(6);
        return view('models.roles.index')->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $permissions2 = array();

        foreach ($permissions as $permission) {
            $permissions2[$permission->id] = $permission->name;
        }

        return view('models.roles.create')->withPermissions($permissions2);
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
            'name'          => 'required|alpha_dash|min:2|max:30',
            'permission_id' => 'required',
            'slug'          => 'required|alpha_dash|min:2|max:255|unique:roles,slug' 
        ));

        $role = new Role;

        $role->name = $request->name;
        $role->permission_id = $request->permission_id;
        $role->slug = $request->slug;

        $role->save();

        return redirect()->route('roles.index', $role)
            ->with('success', 'The role has been successfully created!');               
    }

    /**
     * Display the specified resource.
     *
     * @param  \GiveMeYourHelp\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('models.roles.show')->withRole($role);
    }

    /**
     * Display the specified resource.
     *
     * @param  \GiveMeYourHelp\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $permissions2 = array();

        foreach ($permissions as $permission) {
            $permissions2[$permission->id] = $permission->name;
        }

        return view('models.roles.edit')
            ->withRole($role)
            ->withPermissions($permissions2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \GiveMeYourHelp\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, array(
            'name'          => 'required|alpha_dash|min:2|max:30',
            'permission_id' => 'required',
            'slug'          => 'required|alpha_dash|min:2|max:255|unique:roles,slug,' . $role->id,
        ));

        $role->name          = $request->name;
        $role->permission_id = $request->permission_id;
        $role->slug          = $request->slug;

        $role->save();       

        return redirect()->route('roles.index', $role)
            ->with('success', 'The role has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \GiveMeYourHelp\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $users = User::all();
        
        foreach ($users as $db_user) {
            if ($db_user->role->name == $role->name) {
                return redirect()->route('roles.index')
                    ->with('error', 'The role can\'t be deleted because it contains users!');
            }
        }

        $role->delete();
       
        return redirect()->route('roles.index')
            ->with('success', 'The role has been successfully deleted!');
    }
}