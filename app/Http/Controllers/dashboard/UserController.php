<?php

namespace App\Http\Controllers\dashboard;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Language;
use App\Exports\UserExport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Events\Backend\User\UserDeleted;
use App\Repositories\dashboard\UserRepository;
use App\Http\Requests\backend\user\StoreUserRequest;
use App\Http\Requests\backend\user\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        return $this->userRepository = $userRepository;
    }
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $Languages = Language::all();
        return view('dashboard.user.index', ['users' => $users, 'roles' => $roles, 'Languages' => $Languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashpoord()
    {
        return view('welcome');
    }
    public function create()
    {
        $roles = Role::get();
        // $roles2 = Role::name('Admin')->get();
        // $adminRole = Role::where('id'2)->get();
        // $roles2 = User::where('role',2)->get();
        $Languages = Language::get();
        $users = User::get();
        // dd($roles2);

        return view('dashboard.user.create', ['users' => $users, 'roles' => $roles, 'Languages' => $Languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->only(
            'name',
            'email',
            'password',
            'role_id',
            'language',
            'phone_number',
            'image',
        ));


        session()->flash('success', 'user has been added successfully!');
        return redirect()->route('index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $all_Languages = Language::all();
        $user = User::findOrFail($id);
        $Languages_user = $user->languages()->get();
        $role_user = $user->role()->get();
        return view('dashboard.user.edit', ['Languages_user' => $Languages_user, 'roles' => $roles, 'all_Languages' => $all_Languages, 'user' => $user, 'role_user' => $role_user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::where('id', $id)->first();
        //update user
        $this->userRepository->update($user, $request->only(
            'name',
            'email',
            // 'password',
            'role_id',
            'language',
            'phone_number',
            'image',
        ));

        session()->flash('success', 'user has been update successfully!');
        return redirect()->route('index');
    }

    public function resetpassword(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        return view('dashboard.user.resetpassword', ['user' => $user]);
    }
    public function createpassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required',
        ]);
        $user = User::where('id', $id)->first();
        $this->userRepository->createpassword($user, $request->only(
            'password',
        ));

        session()->flash('success', 'user has been update successfully!');
        return redirect()->route('index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function changepass($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.user.changepass', ['user' => $user]);
    }
    public function change(Request $request, $id)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword' => 'required|same:confpassword',
            'confpassword' => 'required',
        ]);

        // $user_id = auth()->user()->id;
        $user = User::find($id);
        if (Hash::check($request->oldpassword, $user->password)) {
            $user->password = Hash::make($request->input('newpassword'));
            $user->save();
            session()->flash('success', 'user has been update successfully!');
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('error', 'Old password does not matched');
        }
    }
    public function profile(Request $request, $id)

    {
        // dd(1);
        $users = User::findOrFail($id);
        $roles = Role::get();
        $Languages = Language::get();
        $user = User::findOrFail($id);
        // dd($user);
        return view('dashboard.user.profile', ['roles' => $roles, 'Languages' => $Languages, 'user' => $user]);
    }


    public function changeimage($id)
    {
        $users = User::findOrFail($id);
        return view('dashboard.user.changeimage', ['users' => $users]);
    }
    public function update_imge(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        //update user
        $this->userRepository->update_imge($user, $request->only(
            'image',
        ));

        session()->flash('success', 'user has been update successfully!');
        return redirect()->route('index');
    }

    public function excel(Request $request)
    {

        $date = Carbon::now();
        return Excel::download(new UserExport($request), 'users' . $date . '.xls');
    }


    public function user_list(Request $request)
    {
        // dd( $request);
        $name = Language::all();
        $roles = Role::all();
        $Languages = Language::all();
        if ($request->ajax()) {
            $data = User::query();
            

// dd($data->get());
            try {
                $search = $request->get('search');
                
                $data->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone_number', 'like', '%' . $search . '%')
                    ->role($request->get('role_id'))
                    ->languages($request->get('name'));
                    if(Auth::user()->role_id == 2){
                        $data->where('role_id', "<>" ,1)->get();
                    
                    }
                    else if(Auth::user()->role_id == 3){
                        $data->where('role_id',3)->get();
                        
                    }
                return datatables($data)
                    ->addColumn('checkbox', function ($item) {
                        return '<input type="checkbox" id="' . $item->id . '" name="someCheckbox" />';
                    })
                    ->addColumn('languages', function (User $user) {
                        return $user->name;
                    })
                    ->addColumn('role', function (User $user) {
                        return $user->role->name;
                    })
                    ->addColumn('name', function (User $user) {
                        return $user->name;
                    })
                    ->addColumn('email', function (User $user) {
                        return $user->email;
                    })
                    ->addColumn('phone-number', function (User $user) {
                        return $user->phone_number;
                    })
                    ->editColumn('image', function ($item) {
                        return '<img src="' . asset('storage/images/employees/image/' . $item->image) . '" class="img-50" style="width: 100px;" />';
                    })
                    ->addColumn('action', function ($item) {
                        if (Auth::user()->role_id == 1) {
                            return '<div class="activity-icon">
                    <ul style="list-style: none">
                        <li><a href="' . route('edit_user', $item->id) . '" class="user-list-actions-icon bg"><i class="fas fa-pencil-alt"></i></a></li>
                        <li><a href="' . route('resetpassword', $item->id) . '" class="user-list-actions-icon bg"><i class="fa fa-key"></i></a></i>
                        <li><a id="delete" onclick="fire()" data-user="' . $item->id . '" data-url="' . route('delete_user') . '" class=""><i class="fa fa-trash"></i></a></li>
                    </ul>
                </div>';
                        } elseif (Auth::user()->role_id == 2) {
                            return '<div class="activity-icon">
                        <ul style="list-style: none">
                            <li><a href="' . route('edit_user', $item->id) . '" class="user-list-actions-icon bg"><i class="fas fa-pencil-alt"></i></a></li>
                            <li><a href="' . route('resetpassword', $item->id) . '" class="user-list-actions-icon bg"><i class="fa fa-key"></i></a></i>
                            <li><a id="delete" onclick="fire()" data-user="' . $item->id . '" data-url="' . route('delete_user') . '" class=""><i class="fa fa-trash"></i></a></li>
                        </ul>
                    </div>';
                        }
                        elseif (Auth::user()->role_id == 3) {
                            return '<div class="activity-icon">
                        <ul style="list-style: none">
                            <li><a href="' . route('edit_user', $item->id) . '" class="user-list-actions-icon bg"><i class="fas fa-pencil-alt"></i></a></li>
                            <li><a href="' . route('resetpassword', $item->id) . '" class="user-list-actions-icon bg"><i class="fa fa-key"></i></a></i>
                        </ul>
                    </div>';
                        }
                    })->rawColumns(['checkbox', 'action', 'image'])->make(true);
            } catch (\Exception $e) {
                return new GeneralException($e);
            }
        }
        return view('dashboard.user.index', compact('roles', 'Languages'));
    }

    public function deluser(Request $request)
    {
        $this->userRepository->deleteById($request->id);
        session()->flash('success', 'Property has been deleted successfully!');
    }
}
