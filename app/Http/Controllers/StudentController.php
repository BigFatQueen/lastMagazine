<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;
use App\Coordinator;
use App\Level;
use App\User;
use App\Academic;
use App\Record;
use App\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File; 

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

         $faculties=Faculty::all();
         $levels=Level::all();
        return view('backend.student',compact('faculties','levels'));
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
        // dd($request);
        $request->validate([
            'name' => 'required',
            'faculty_id' => 'required',
            'level_id' => 'required',
            'classroom_id' => 'required',
            'email' => 'required|unique:users',
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

        $date=date('Y');
        $aca=Academic::where('name','=',$date)->first();


         $user=User::create([
            'name' => $request->name,
            'avatar'=>$file_path,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
         // dd($user);

        $s=$student=Student::create([
        'user_id'=>$user->id,
        'phone'=>$request->phone,
        'nrc'=>$request->nrc,
        'address'=>$request->address,
        'fatherName'=>$request->fName
       ]);

        $r=Record::where('faculty_id',$request->faculty_id)
            ->where('classroom_id',$request->classroom_id)
        ->orderBy('id','desc')->first();
        $no=1;

        if($r==null){
            $rollno=1;
        }else{
            $rollno=$r->rollno+1;
        }

        Record::create([
            'student_id'=>$s->id,
            'faculty_id'=>$request->faculty_id,
            'academic_id'=>$aca->id,
            'classroom_id'=>$request->classroom_id,
            'rollno'=>$rollno
        ]);

        


        $user->assignRole('student');

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

        $r=Record::find($id);
        $r->rollno=$request->rollno;
        $r->faculty_id=$request->faculty_id;
        $r->classroom_id=$request->classroom_id;
        $r->save();

        $student=Student::find($r->student->id);
        $student->nrc=$request->nrc;
        $student->fatherName=$request->fName;
        $student->phone=$request->phone;
        $student->address=$request->address;
        $student->save();

        $user=User::find($r->student->user->id);
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
        // echo $id;
        $s=Record::find($id);
        Student::where('id',$s->student->id)->delete();
        User::where('id',$s->student->user->id)->delete();
        $s->delete();
         return response()->json(['message'=>"successfully deleted!"]);
    }
}
