<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use function App\Http\Controllers\console_log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isAdmin')) {

        $users = User::paginate(5);
        $public_playlists = null;

        return view('admin.users.index', compact(['users', 'public_playlists']));
        }
        elseif (Gate::allows('isManager')) {
            $this_user = auth()->user();
            $id = $this_user->id;
          //$users = DB::select('select * from users where role = :role', ['Astronaut']);
           $users = DB::table('users')->where('role', '=', 'Astronaut')->orWhere('id', '=', $id)->get();

           $public_playlists = null;
        return view('admin.users.index', compact(['users', 'public_playlists']));
        }
        else{
            $user = auth()->user();
            $id = $user->id;           // redirect(route('users.show/'.$user->id));
           // UserController::show($id);
            $playlists = DB::select('select * from playlists where user_id = :id', [$id]);
            $public_playlists = DB::select('select * from playlists where public = 1');
            return view('admin/users/show', compact(['user', 'playlists', 'public_playlists']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'name' => 'required|max:125',
            'email' => 'required|email',
            'password' => 'min:7|confirmed',
        ]);

        // Save
        User::create([
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
        ]);
        $user = User::latest()->first(); //where('email', $request->input('email'));
        // return redirect(route('users.index'));
        $playlists = null;
        return view('admin/users/show', compact(['user', 'playlists']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    # public function show($id)
    public function show($id)
    {
        # $user = User::where('id',$id)->get();
        $user = User::find($id);
        $playlists = DB::select('select * from playlists where user_id = :id', [$id]);
        return view('admin/users/show', compact(['user', 'playlists']));
    }

    public function getPlaylists($id)
    {
        //return $this->belongsTo(Genre::class, 'parent');
        $playlists = Playlist::find($id);
        return $playlists;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/users/update', compact(['user']));
        /** Adrian's code. No work for me. return view('admin.users.update', compact(['user'])); */

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $user)
    {
       $rules = ['name'=>['required', 'string', 'max:125']];

        // validate email
        if ($request->input('email') !== $user->email) {
                array_push($rules, ['email' => ['required', 'string', 'max:125', 'unique:users', 'email',/**'email:rgc,dns' this one will check email server is real; requires intl php extension */]]);
        }

        // validate password
        if (isset($request['password']) && !is_null($request->input('password'))) {
            array_push( $rules,['password'=> ['required', 'confirmed',
            ],]);
        }

        // patch user
        if($request->input('name') !== $user->name) {
            $user->name = $request->input('name');
        }

        if($request->input('email') !== $user->email){
            $user->email = $request->input('email');
        }

        if (Gate::allows('isAdmin')) {
            if ($request->input('role') !== $user->role) {
                if($request->input('role') == 'Manager' || 'Astronaut') {
                    $user->role = $request->input('role');
                }
                   // $request->validate([
                    //    'role' => ['required|in:', Rule::in(['Manager', 'Astronaut'])]
                    // ]);

            }
        }

        //update changes
        $user->save();
        // console_log($user);
        return redirect(route('users.index'));
        //return redirect('users.show', compact(['user']))->with('message', 'Profile Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'));
    }
}
