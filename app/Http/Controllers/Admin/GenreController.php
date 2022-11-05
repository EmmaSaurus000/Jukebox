<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::paginate(15);
        return view('admin/genres/index', compact(['genres']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Genre::all();
        $parents = $parents->sortBy('name');
        return view('admin/genres/create')->with(['parents'=>$parents]);;
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
        ]);

        // Save
        Genre::create([
            'name' => $request->input('name'),
            'parent' => $request->input('parent'),
            'icon' => $request->input('icon'),
        ]);
        return redirect(route('genres.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = Genre::find($id);
        return view('admin/genres/show', compact(['genre']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::find($id);

        //$parents = $this->dropDownShow();
        //$parents = Genre::where("parent", "=", "id")->get();
        $parents = Genre::all();
        $parents = $parents->sortBy('name');
        //$parents = DB::table('genres')->where("parent", "=", "id")->orderBy("name")->get();
        //$parents = Genre::where("parent", "=", "id")->pluck("name", "id");

        return view('admin/genres/update', compact('genre'))->with(['parents'=>$parents]);
        //return view('genres/update', compact(['genre']));
    }

    /**
     * Fetch for dropdowns e.g.
     *
    // Fetch departments
    $departments['data'] = Departments::orderby("name","asc")
    ->select('id','name')
    ->get();

    // Load index view
    return view('index')->with("departments",$departments);
     *
     * @if($patient_data->month)
    <select id="expiry_month" name="month" class="form-control-sm">
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        $rules = ['name'=>['required', 'string', 'max:125']];

        // run validation
        $request->validate($rules);

        // patch genre
        if($request->input('name') !== $genre->name) {
            $genre->name = $request->input('name');
        }

        if($request->input('parent') !== $genre->parent){
            $genre->parent = $request->input('parent');
        }

        if($request->input('icon') !== $genre->icon){
            $genre->icon = $request->input('icon');
        }

        //update changes
        $genre->save();
        // console_log($genre);
        return redirect(route('genres.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect(route('genres.index'));
    }

    /**
     * Provide drop-down options for parent field in genre forms
     */
    //public function dropDownShow(Request $request)
    public function dropDownShow()
    {
        $parents = Genre::where('parent', '=', 'id')->orderBy('name')->get();
        //return view('')
        return compact(['parents', $parents]);
    }

    public function getDropDown2($id): array
    {
        $children = DB::select("CALL Subgenres($id)");
        return compact('children');
    }


}
