<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\GalleryDetalis;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UserController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('permission:user-list',   ['only' => ['index']]);
    //     $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:user-edit',   ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('dashbord.users.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('dashbord.users.create', compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['status'] = 'active';
        // $input['roles_name'] = $request->roles_name;
        $user = User::create($input);
        // if ($request->file('photo')) {
        //     upladeImage($user, ['photo'], ['user']);
        // }
        // upladeImage($input, ['photo'], ['user']);
        // $user->assignRole($request->input('roles_name'));
        return redirect()->route('users.index')
            ->with('success', __('master.messages_save'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return abort(404);
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
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('dashbord.users.edit', compact('user', 'roles', 'userRole'));
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
        $user = User::findOrFail($id);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user->update($input);
        if ($request->file('photo')) {
            upladeImage($user, ['photo'], ['user']);
        }
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles_name'));
        return redirect()->route('users.index')
            ->with('success', __('master.messages_edit'));
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
        $user->clearMediaCollection('user');
        $user->delete();
        return redirect()->back()
            ->with('success', __('master.messages_delete'));
    }

    public function inActiveList()
    {
        $users = User::status('inactive')->get();
        return view('dashbord.users.in-active-list', compact('users'));
    }

    public function removeImage($id)
    {
        $gallery = GalleryDetalis::findOrFail($id);
        $gallery->clearMediaCollection('galleryDetails');
    }




}
