<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyDepartment;
use App\Models\Role;
use App\User;
use App\Models\Menu;
use App\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::with('roles','my_departments')->where('users.status','=',1)->latest()->get();
        return view('pages.users.usersList',array(
            'users' => $users
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('status','=',1)->get();
        $departments = MyDepartment::where('status','=',1)->get();

        $menus = Menu::all();

        return view('pages.users.createUsers',array(
            'roles' => $roles,
            'departments' => $departments,
            'menus' => $menus
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->menus[]);

        //dd(Menu::orderBy('sort_order','desc')->get()->toArray());

        $upload_dir = base_path() . '/public/uploads';
        
        if($request->profile_image !== null){

            $request->validate([
            'role_id' => 'required',
            'department_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'gender' => 'required',
            'profile_image' => 'image|mimes:jpeg,png|max:2048'
            ]);
            
            $file = $request->file('profile_image');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->get('username').'.'.$ext;
            $file->move($upload_dir, $filename);
            //dd($filename);
        }
        else
        {
            $request->validate([
            'role_id' => 'required',
            'department_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'gender' => 'required',
            ]);
        
            $filename = 'avatar.png';
        }

        if(!$request->has('status'))
        {
            $status = 0;
        }
        else{
            $status = 1;
        }

        $user = new User;
        $user->role_id = $request->role_id;
        $user->department_id = $request->department_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->status = $status;
        $user->profile_image = $filename;

        $user->save();

        $menus = Menu::orderBy('sort_order','desc')->get()->toArray();

        for ($i=0; $i < sizeof($menus) ; $i++)
        {

            $permissions = new Permission;
            $permissions->user_id = $user->id;
            $permissions->menu_id = $menus[$i]['id'];
            $permissions->status = 0;
            $permissions->save();
            
        }

        foreach($request->menus as $permit_menu)
        {
            $permission = Permission::where('menu_id','=',$permit_menu)->where('user_id','=',$user->id)->first();
            $permission->status = 1;
            $permission->save();
        }

        return redirect('users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::with('roles','my_departments')->where('users.id','=',$id)->get();
        return view('pages.users.showUser',array(
            'users' => $users
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::pluck('role_name','id');
        $departments = MyDepartment::pluck('department_name','id');

        $permissions = Permission::with('menus')->where('user_id','=',$id)->orderBy('id','desc')->get();
       
        //dd($permissions);

        $user = User::findOrFail($id);

        return view('pages.users.editUser',array(
            'roles' => $roles,
            'departments' => $departments,
            'user' => $user,
            'permissions' => $permissions
        ));

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

        //dd($request->menus);
        
        $upload_dir = base_path() . '/public/uploads';
        
        if($request->profile_image !== null){

            $request->validate([
            'role_id' => 'required',
            'department_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            
            'profile_image' => 'image|mimes:jpeg,png|max:2048'
            ]);
            
            $file = $request->file('profile_image');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->get('username').'.'.$ext;
            $file->move($upload_dir, $filename);
            //dd($filename);
        }
        else
        {
            $request->validate([
            'role_id' => 'required',
            'department_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            
            ]);
        
            
        }

        if(!$request->has('status'))
        {
            $status = 0;
        }
        else{
            $status = 1;
        }

        $user = User::findOrFail($id);
        $user->role_id = $request->role_id;
        $user->department_id = $request->department_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        if($request->password !== null)
        {
            $user->password = bcrypt($request->password);
        }
        $user->gender = $request->gender;
        $user->status = $status;
        if($request->profile_image !== null)
        {
            $user->profile_image = $filename;
        }
        

        $user->save();


        $menus = Menu::orderBy('sort_order','desc')->get()->toArray();

        
        $permission = Permission::where('user_id','=',$id)->delete();
       

    


        for ($i=0; $i < sizeof($menus) ; $i++)
        {

            $permissions = new Permission;
            $permissions->user_id = $user->id;
            $permissions->menu_id = $menus[$i]['id'];
            
            $permissions->save();
            
        }

        foreach($request->menus as $permit_menu)
        {
            $permission_menu = Permission::where('menu_id' , $permit_menu)->where('user_id','=',$id)->first();
            
            $permission_menu->status = 1;
            $permission_menu->save();
        }

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->status = 0;

        $user->save();

        return redirect('users');
    }
}
