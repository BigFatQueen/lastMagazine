<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $academic = Academic::all();
        return response()->json(['success'=>'Got List', "data" => $academic]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([
            'year' => 'required|unique:academics,name',
           
        ]);
        for ($i=0; $i < count($request["year"]) ; $i++) { 
            $year = new Academic;
            $year->name = $request['year'][$i];
            $year->save();
        }

        if($year) {
            return response()->json(['message'=>'Created Successfully', "status" => 200]);
        }else{
            return response()->json(error);
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
        $year = Academic::find($id);
        $year->name = $request['name'];
        $year->save();
        if($year) {
            return response()->json(['message'=>'Updated Successfully', "status" => 200]);
        }else{
            return response()->json(error);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $year = Academic::find($id);
        $year->delete();
        if($year) {
            return response()->json(['message'=>'Deleted Successfully', "status" => 200]);
        }else{
            return response()->json(error);
        }
    }
}
