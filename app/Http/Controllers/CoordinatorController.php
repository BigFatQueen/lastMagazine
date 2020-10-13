<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;
use App\Coordinator;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File; 
class CoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties=Faculty::all();
        return view('backend.coordinator',compact('faculties'));
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
            'name' => 'required',
            'faculty_id' => 'required',
            'email' => 'required|unique:users|',
           'password' => 'required|min:8|same:password_confirm',
           'password_confirm' => 'required|min:8',
        ]);
         // dd($request);


        if($request->hasfile('avatar')){
            $logo=$request->avatar;
            // $logoimage=time().'.'.$logo->extension();
            $file_name = time().rand(99,999).'avatar.'.$logo->extension();
            $request->avatar->move(public_path('/users/image/'),$file_name);
            $file_path="/users/image/".$file_name;
           
        }else{
            $file_path=null;
        }


         $user=User::create([
            'name' => $request->name,
            'avatar'=>$file_path,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
         // dd($user);

        Coordinator::create([
        'user_id'=>$user->id,
        'faculty_id'=>$request->faculty_id,
        'phone'=>$request->phone,
        'nrc'=>$request->nrc,
        'address'=>$request->address,
        'education'=>$request->education
       ]);
        $user->assignRole('coordinator');

        return response()->json(['message'=>'successfully account created']);
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
        if($request->hasfile('avatar')){
            $logo=$request->avatar;
            // $logoimage=time().'.'.$logo->extension();
            $file_name = time().rand(99,999).'avatar.'.$logo->extension();
            $request->avatar->move(public_path('/users/image/'),$file_name);
            $file_path="/users/image/".$file_name;
            File::delete($request->oldavatar);
           
        }else{
            $file_path=$request->oldavatar;
        }

        $manager=Coordinator::find($id);
        $manager->nrc=$request->nrc;
        $manager->faculty_id=$request->faculty_id;
        $manager->education=$request->education;
        $manager->phone=$request->phone;
        $manager->address=$request->address;
        

        $manager->save();

        $user=User::find($manager->user_id);
        $user->avatar=$file_path;
        $user->name=$request->name;
        $user->save();
        return response()->json(['message'=>'successfully account updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $m=Coordinator::find($id);
        User::where('id',$m->user_id)->delete();
        $m->delete();
        return response()->json(['message'=>"successfully deleted!"]);
    }
}
