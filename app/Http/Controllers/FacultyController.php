<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;
use DataTables;
use Illuminate\Support\Facades\File; 

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('backend.faculty');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|unique:faculties',
           'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $name=$request->name;
         if($request->hasfile('logo')){
            $logo=$request->logo;
            $logoimage=time().'.'.$logo->extension();
            $request->logo->move(public_path('/storages/faculty/'), $logoimage);
            $logopath='/storages/faculty/'.$logoimage;
        }else{
            $logopath=null;
        }
        // dd($logopath);
        Faculty::create([
            'name'=>$name,
            'logo'=>$logopath
        ]);
        return redirect('/faculty')->with('message','successfully added');
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
        //
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
        // dd($request->logo);
         if($request->hasfile('logo')){
            $logo=$request->logo;
            $logoimage=time().'.'.$logo->extension();
            $request->logo->move(public_path('/storages/faculty/'), $logoimage);
            $logopath='/storages/faculty/'.$logoimage;
            File::delete($request->oldlogo);
        }else{
            $logopath=$request->oldlogo;
        }
        // dd($logopath);

        $faculty=Faculty::find($id);
        $faculty->name=$request->name;
        $faculty->logo=$logopath;
        $faculty->save();
        // $faculty->name=$requset->name;

        return response()->json(['success'=>'successfully added']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $f=Faculty::find($id);
        $f->delete();
        return response()->json(['success'=>"successfully deleted"]);
        
    }

    public function getFaculties(){
        $faculties=Faculty::all();
        return DataTables::of($faculties)->addIndexColumn()->toJson();
    }
}
