<?php
namespace App\Http\Controllers\Permissions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB as FacadesDB;

class RoleController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/


function __construct()
{
$this->middleware('permission:Show permission', ['only' => ['index']]);
//or: $this->middleware(['permission:عرض صلاحية'], ['only' => ['index', 'store']]);
$this->middleware('permission:Add new permission', ['only' => ['create','store']]);
$this->middleware('permission:Edit permission', ['only' => ['edit','update']]);
$this->middleware('permission:Delete permission', ['only' => ['destroy']]);
}


/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
$roles = Role::orderBy('id','DESC')->paginate(5);
return view('roles.index',compact('roles')) ->with('i', ($request->input('page', 1) - 1) * 5);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$permission = Permission::get();
return view('roles.create',compact('permission'));
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$this->validate($request, [
'name' => 'required|unique:roles,name',
'permission' => 'required',
]);

$role = Role::create(['name' => $request->input('name')]);
/////////////////////////////////////////////
$permissions = Permission::whereIn('id', $request->input('permission'))->get();
$role->syncPermissions($permissions);
// NOT WORKING >>> $role->syncPermissions($request->input('permission'));

toastr()->success(trans('messages.success'));
return redirect()->route('roles.index');
// ->with('success','Role created successfully');
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$role = Role::find($id);
$rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
->where("role_has_permissions.role_id",$id)
->get();
return view('roles.show',compact('role','rolePermissions'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$role = Role::find($id);
$permission = Permission::get();
$rolePermissions = FacadesDB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
->all();
return view('roles.edit',compact('role','permission','rolePermissions'));
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
$this->validate($request, [
'name' => 'required',
'permission' => 'required',
]);
$role = Role::find($id);
$role->name = $request->input('name');
$role->save();
/////////////////////////////////////
$permissions = Permission::whereIn('id', $request->input('permission'))->get();
$role->syncPermissions($permissions);
// NOT WORKING >>> $role->syncPermissions($request->input('permission'));
toastr()->success(trans('messages.Update'));
return redirect()->route('roles.index');
// ->with('success','Role updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
FacadesDB::table("roles")->where('id',$id)->delete();
toastr()->error(trans('messages.Delete'));
return redirect()->route('roles.index');
// ->with('success','Role deleted successfully');
}
}