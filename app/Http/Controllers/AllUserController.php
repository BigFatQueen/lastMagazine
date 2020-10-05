<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manager;
use DataTables;
use App\User;
use App\Coordinator;
use App\Classroom;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File; 
use App\Record;
use App\Student;

class AllUserController extends Controller
{
    public function smindex(){
    	return view('backend.supermanager');
    }
    public function getsuperManager(){
    	$managers=Manager::with('user');
        return DataTables::of($managers)->addIndexColumn()->toJson();
    }

    public function getCoordinator(){
        $coordinators=Coordinator::with(['user','faculty'])->get();
        // dd($coordinators);
        return DataTables::of($coordinators)->addIndexColumn()->toJson();
    }

    public function getStudent(){
        $students=Record::with(['student.user','faculty','classroom.level','academic'])->get();
        // dd($coordinators);
        return DataTables::of($students)->addIndexColumn()->toJson();
    }



    public function supermanagerDelete($id){
    	$m=Manager::find($id);
    	User::where('id',$m->user_id)->delete();
    	$m->delete();
    	return response()->json(['message'=>"successfully deleted!"]);
    }
    public function supermanagerStore(Request $request){

         $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
           'password' => 'required|min:8|same:password_confirm',
           'password_confirm' => 'required|min:8',
        ]);



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

        Manager::create([
        'user_id'=>$user->id,
        'phone'=>$request->phone,
        'nrc'=>$request->nrc,
        'address'=>$request->address,
        'education'=>$request->education
       ]);
        
        $user->assignRole('manager');

        return response()->json(['message'=>'successfully account created']);
    }

    public function supermanagerUpdate(Request $request,$id){
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

        $manager=Manager::find($id);
        $manager->nrc=$request->nrc;
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


    public function getclassByL($id){
        $classes=Classroom::with('level')->where('level_id',$id)->get();
        return $classes;
    }

    public function staticalDashboard(){
        return view('backend.staticalDashboardNew2');
    }


}


