<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
$data = User::orderBy('id','DESC')->paginate(5);
return view('pages.Admin.admins.index',compact('data'))
// return view('pages.Admin.admins.index',compact('data'))
->with('i', ($request->input('page', 1) - 1) * 5);
}


/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$roles = Role::pluck('name','name')->all();
return view('pages.Admin.admins.create',compact('roles'));
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
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        // 'password' => 'required|same:confirm-password',
        'roles_name' => 'required'
    ]);
    try {
        $input = $request->all();
        
        $input['password'] = FacadesHash::make($input['password']);
        
        $user = User::create($input);
        $user->assignRole($request->input('roles_name'));
        
        toastr()->success(trans('messages.success'));
        return redirect()->route('Admins.index'); 
    }
    catch (\Exception $e) {
        return redirect()->route('Admins.index');
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
$user = User::find($id);
return view('users.show',compact('user'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$user = User::find($id);
$roles = Role::pluck('name','name')->all();
$userRole = $user->roles->pluck('name','name')->all();
return view('pages.Admin.admins.Edit',compact('user','roles','userRole'));
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
    'email' => 'required|email|unique:users,email,'.$id,
    'roles' => 'required'
    ]);
    $input = $request->all();
    if(!empty($input['password'])){
    $input['password'] = FacadesHash::make($input['password']);
    }
    else{
        $input = Arr::except($input, ['password']);
    }
    $user = User::find($id);
    $user->update($input);
    FacadesDB::table('model_has_roles')->where('model_id',$id)->delete();
    $user->assignRole($request->input('roles'));
    
    toastr()->success(trans('messages.Update'));
    return redirect()->route('Admins.index');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Request $request)
{
    User::findOrFail($request->id)->delete();
    
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Admins.index');
}
}
