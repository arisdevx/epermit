<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Area;
use App\Models\UserLocation;
use Flash;
use Validator;
use Auth;
use Hash;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:read-module-admins')->only('index');
    //     $this->middleware('permission:create-module-admins')->only(['create', 'store']);
    //     $this->middleware('permission:update-module-admins')->only(['edit', 'update']);
    //     $this->middleware('permission:delete-module-admins')->only('destroy');
    // }

    public function index(Request $request)
    {
        if(auth()->user()->hasRole(['admin', 'super']))
        {
            $admins = User::whereHas('user_role.role.mode_role.mode', function($q) {
                $q->where('name', 'admin');
                $q->orWhere('name', 'officer');
                $q->orWhere('name', 'jabatan_perhutanan_negeri');
                $q->orWhere('name', 'pegawai_hutan_daerah');
            })
            ->where(function($q) use ($request) {
                $q->whereRaw('LOWER(name) LIKE ?', ['%'.strtolower($request->search).'%']);
                $q->orWhereRaw('LOWER(email) LIKE ?', ['%'.strtolower($request->search).'%']);
            })
            ->paginate(10);

            /**
             $admins = User::whereHas('user_role.role', function($q) {
                $q->whereIn('name', Auth::user()->allowed_roles('read'));
            })
            ->whereHas('user_role.role.mode_role.mode', function($q) {
                $q->where('name', 'admin');
            })
            ->where(function($q) use ($request) {
                $q->whereRaw('LOWER(name) LIKE ?', ['%'.strtolower($request->search).'%']);
                $q->orWhereRaw('LOWER(email) LIKE ?', ['%'.strtolower($request->search).'%']);
            })
            ->paginate(10);
            */
        }
        else
        {
            $admins = User::whereHas('user_role.role', function($q) {
            $q->whereIn('name', Auth::user()->allowed_roles('read'));
            })
            ->whereHas('user_role.role.mode_role.mode', function($q) {
                $q->where('name', 'admin');
            })
            ->whereHas('userLocation', function($q){
                $q->where('state_id', auth()->user()->userLocation->state_id);
            })
            ->where(function($q) use ($request) {
                $q->whereRaw('LOWER(name) LIKE ?', ['%'.strtolower($request->search).'%']);
                $q->orWhereRaw('LOWER(email) LIKE ?', ['%'.strtolower($request->search).'%']);
            })
            ->paginate(10);
        }

        return view('admin.index', compact('admins'));
    }

    public function create()
    {
        $admin = new User();
        $roles = Role::whereIn('name', Auth::user()->allowed_roles('create'))
            ->whereHas('mode_role.mode', function($q) {
                $q->where('name', 'admin');
            })
            ->pluck('display_name', 'id');
        $role = null;

        if(auth()->user()->hasRole(['super', 'admin']))
        {
            $states = State::get();
        }
        else
        {
            $states = State::where('id', Auth::user()->userLocation->state_id)->get();
        }
        

        return view('admin.form', compact('admin', 'roles', 'role', 'states'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'role' => 'required|in:'.implode(',', array_keys(Auth::user()->allowed_roles('create')))
        ]);

        $password = str_random(8) . substr(str_shuffle('~!@#$%^&*()'), 0, 2);

        if($validate->fails()) {
            return ['errors' => $validate->errors()];
        }

        $user           = new User();
        $user->username = $request->username;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($password);
        $user->status   = '1';
        $user->save();

        activityLog('Tambah Pengguna ' . $user->name);

        $user->attachRole($request->role);

        $userLocation = new UserLocation;
        $userLocation->user_id = $user->id;
        $userLocation->state_id = (!empty($request->state) ? $request->state : 0);
        $userLocation->area_id = (!empty($request->area) ? $request->area : 0);
        $userLocation->save();

        // LARAVEL SEND THE EMAIL
        event(new UserCreated(compact('user', 'password')));

        Flash::success(sprintf('Akaun %s telah berjaya dibuatkan.', $user->name));
        return ['errors' => false];
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $admin = User::find($id);
        $roles = Role::whereIn('name', Auth::user()->allowed_roles('update'))
            ->whereHas('mode_role.mode', function($q) {
                $q->where('name', 'admin');
            })
            ->pluck('display_name', 'id');
        $role = $admin->roles->first()->id;
        $location = UserLocation::where('user_id', $id)->first();

        if(auth()->user()->hasRole(['super', 'admin']))
        {
            $states = State::get();
            $areas = Area::get();
        }
        else
        {
            $states = State::where('id', $location->state_id)->get();
            $areas     = Area::where('state_id', $location->state_id)->get();
        }

        

        return view('admin.form', compact('admin', 'roles', 'role', 'location', 'states', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => "required|email|unique:users,email,$id,id|max:255",
            'role' => 'required|in:'.implode(',', array_keys(Auth::user()->allowed_roles('update')))
        ]);

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $user = User::find($id);
        $user->username = $request->username;
        $user->name     = $request->name;
        $user->email    = $request->email;
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->status   = '1';
        $user->save();

        $user->syncRoles($request->role);

        $userLocation = UserLocation::where('user_id', $user->id)->first();
        
        if(!empty($userLocation))
        {
            $userLocation->user_id = $user->id;
            $userLocation->state_id = (!empty($request->state) ? $request->state : 0);
            $userLocation->area_id = (!empty($request->area) ? $request->area : 0);
            $userLocation->save();
        }

        activityLog('Update Pengguna ' . $user->name);

        Flash::success(sprintf('Akaun %s telah berjaya diubah.', $user->name));
        return ['errors' => false];
    }

    public function destroy($id)
    {
        $user = User::find($id);
        activityLog('Hapus Pengguna ' . $user->name);
        $user->profile->delete();
        $user->syncRoles([]);
        $user->delete();

        Flash::success(sprintf('Akaun %s telah berjaya dihapuskan.', $user->name));
        return redirect()->route('admin.index');
    }

    public function findArea(Request $request)
    {
        $areas = Area::where('state_id', $request->state_id)->get();

        $data[] = [
            'id' => '',
            'text' => ''
        ];

        foreach($areas as $area)
        {
            $data[] = [
                'id' => $area->id,
                'text' => $area->name
            ];
        }

        return response()->json($data);
    }
}
