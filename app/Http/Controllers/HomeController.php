<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Role;
use App\Model\Permission;
use App\Model\Role_Has_Permission;
use Spatie\Permission\Traits\HasRoles;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use HasRoles;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        /*
       $role->givePermissionTo($permission);
*/
       //$permission=Role::create(['name'=>'writer']);
      
     /*  $role=Role::find(1);
        $role=Role::find(1);
        $role->givePermissionTo($permission);
        $role=Role::find(2);
        $permission=Permission::find(6);
       auth()->user()->givePermissionTo('delete post');
       auth()->user()->assignRole($role);
*/      // $permission->delete($role);
        
        //auth()->user()->assignRole('writer');


        //return User::Role('admin')->get();

        return view('/home');
        
    }
}