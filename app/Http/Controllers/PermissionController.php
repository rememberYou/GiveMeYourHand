<?php

namespace GiveMeYourHelp\Http\Controllers;

use Purifier;
use Session;
use GiveMeYourHelp\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Instantiate a new PermissionController instance.
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
        $permissions = Permission::latest()->paginate(6);
        return view('models.permissions.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('models.permissions.create');
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
            'name'  => 'required|max:30',
            'level' => 'required',
            'slug'  => 'required|alpha_dash|min:3|max:255|unique:permissions,slug'
        ));

        $permission = new Permission;

        $permission->name  = $request->name;
        $permission->level = $request->level;
        $permission->slug  = $request->slug;

        $permission->save();

        $permissions = Permission::latest()->paginate(6);
              
        return redirect()->route('permissions.index', $permissions)
            ->with('success', 'The permission has been successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \GiveMeYourHelp\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('models.permissions.show')->withPermission($permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \GiveMeYourHelp\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('models.permissions.edit')->withPermission($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \GiveMeYourHelp\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, array(
            'name'  => 'required|max:60',
            'level' => 'required',
            'slug'   => 'required|alpha_dash|min:3|max:255|unique:permissions,slug,' . $permission->id
        ));

        $permission->name  = $request->name;
        $permission->level = $request->level;
        $permission->slug  = $request->slug;

        $permission->save();       

        return redirect()->route('permissions.show', $permission)
            ->with('success', 'The permission has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \GiveMeYourHelp\Permission  $permission
     * @return \Illuminate\Http\Response
        */
    public function destroy(Permission $permission)
    {
        $permission->delete();        

        $permissions = Permission::latest()->paginate(6);
              
        return redirect()->route('permissions.index', $permissions)
            ->with('success', 'The permission has been successfully created!');                
    }
}
