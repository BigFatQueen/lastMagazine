<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Magazine;
use App\Coordinator;
use App\Announce;
use App\Student;
use App\Academic;
use App\Faculty;
use App\Record;
use Auth;
use App\Comment;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Str;
use Mail;
use URL;
use DB;
use ZipArchive;
use Illuminate\Contracts\Encryption\DecryptException;
class MagazineController extends Controller
{
    public function __construct()
    {
        // Only Authenticated Users can access
        $this->middleware('auth', ['only' => [
            'show'
        ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $role= Auth::user()->roles[0]->name;
       // if($role=='student'){

       // }
       //  $magazines=Magazine::orderBy('id','desc')->get();
       //  return view('frontend.article.list',compact('magazines'));
    }

    public function getArticleByAID($id){
        // dd($id);
        $id = decrypt($id);

         $role= Auth::user()->roles[0]->name;
       if($role=='student'){
           $sid= Auth::user()->student[0]->id;
           $magazines=Record::with(['magazines'=>function($q) use ($id){
            $q->where('announce_id',$id);
           }])->where('student_id',$sid)->get();
           // dd($magazines);
       }
       $announce=Announce::find($id);
        //$magazines=Magazine::orderBy('id','desc')->get();
        return view('frontend.article.list',compact('magazines','announce'));
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
            'title' => ['required', 'max:255'],
            'coverphoto' => ['required','mimes:jpeg,jpg,png'],
            'article' => ['required','mimes:pdf'],
            'accept' => ['required'],
        ]);
        // dd($request);
       //  if ($validator->fails())
       //  {
       //      return response()->json(['errors'=>$validator->errors()->all()]);
       //  }


        $postDate=Carbon::now()->toDateTimeString();
        $title=$request->title;
        // $coverphoto=$request->file('coverphoto');
        if($request->hasfile('coverphoto')){
            $coverphoto=$request->coverphoto;
            $coverimage=time().'.'.$coverphoto->extension();
            $request->coverphoto->move(public_path('/storages/cover/'), $coverimage);
            $filepath='/storages/cover/'.$coverimage;
        }else{
            $filepath=null;
        }
        // article

         if($request->hasfile('article')){
            $article=$request->article;
            $articleimage=time().'.'.$article->extension();
            $request->article->move(public_path('/storages/article/'), $articleimage);
            $articlepath='/storages/article/'.$articleimage;
        }else{
            $articlepath=null;
        }

        // dd($articlepath);





        //for descripton  and description photo
        // $des=$request->description;
        // $dom=new \DomDocument();
        // $dom->loadHTML($des,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        // $images = $dom->getElementsByTagName('img');
       // dd($images); 
        // foreach($images as $k => $img){

        //     $data = $img->getAttribute('src');
        //     list($type, $data) = explode(';', $data);

        //     list(, $data)      = explode(',', $data);

        //     $data = base64_decode($data);

        //      $image_name='/storages/description/'.time().'.png';

        //     $path = public_path() . $image_name;
        //     file_put_contents($path, $data);

        //     $img->removeAttribute('src');

        //     $img->setAttribute('src', $image_name);
        // }
        // dd($postDate);
      // $description = $dom->saveHTML();
        // protected $fillable=['title','photo','postDate','description','article','record_id'];

       $user_id=Auth::user()->id;
       // dd($user_id);
        $student_id=Student::where('user_id',$user_id)->first();
        // dd($student_id);
        $date=date('Y');
        $aca=Academic::where('name','=',$date)->first();
        // dd($aca);
        $record=Record::where('student_id',$student_id->id)
                // ->where('academic_id',$aca->id)
                ->first();
                $record_id=$record->id;

     $article= Magazine::create([
        'title'=>$title,
        'photo'=>$filepath,
        'postDate'=>$postDate,
        'description'=>$request->description,
        'article'=>$articlepath,
        'record_id'=>$record_id,
        'announce_id'=>$request->announce_id

      ]);

        $coordinator=Coordinator::with('user')->where('faculty_id',$record->faculty_id)->first();
         // dd($coordinator);
        $mid=encrypt($article->id);
         $data = array('name'=>$coordinator->user->name,'url'=> URL::route('magazine.show', $mid));
         $email=$coordinator->user->email;
          // dd($email);

          Mail::send(['text'=>'mail'], $data, function($message) use ($email) {
             $message->to($email, 'Article Checking')->subject
                ('Notification of new arrival Article');
             $message->from('_mainaccount@bobomm.me','KMD Magazine');
          });

           // dd("sent");

     return redirect()->route('getArticleByAID',encrypt($request->announce_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = decrypt($id);
        // dd($id);
        $magazine=Magazine::find($id);
        // dd($magazine);
         return view('frontend.article.articleDetail',compact('magazine'));
    }

    public function magazineShow($id){
        $magazine=Magazine::find($id);
        // dd($magazine);
         return view('frontend.article.articleDetail',compact('magazine'));
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
        // dd($request);
        // dd($request);
        $postDate=Carbon::now()->toDateTimeString();
        $title=$request->title;
        // $coverphoto=$request->file('coverphoto');
        if($request->hasfile('coverphoto')){
            $coverphoto=$request->coverphoto;
            $coverimage=time().'.'.$coverphoto->extension();
            $request->coverphoto->move(public_path('/storages/cover/'), $coverimage);
            $filepath='/storages/cover/'.$coverimage;
        }else{
            $filepath=$request->oldPhoto;
        }
        // article

         if($request->hasfile('article')){
            $article=$request->article;
            $articleimage=time().'.'.$article->extension();
            $request->article->move(public_path('/storages/article/'), $articleimage);
            $articlepath='/storages/article/'.$articleimage;
        }else{
            $articlepath=$request->oldArticle;
        }

        // dd($articlepath);





        //for descripton  and description photo
        // $des=$request->description;
        // $dom=new \DomDocument();
        // $dom->loadHTML($des,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        // $images = $dom->getElementsByTagName('img');
       // dd($images); 
        // foreach($images as $k => $img){

        //     $data = $img->getAttribute('src');
        //     if(Str::startsWith($data, 'data')){
        //     list($type, $data) = explode(';', $data);

        //     list(, $data)      = explode(',', $data);

        //     $data = base64_decode($data);

        //      $image_name='/storages/description/'.time().'.png';

        //     $path = public_path() . $image_name;
        //     file_put_contents($path, $data);

        //     $img->removeAttribute('src');

        //     $img->setAttribute('src', $image_name);
        //     }
        // }
        // dd($postDate);
       // $description = $dom->saveHTML();
        // protected $fillable=['title','photo','postDate','description','article','record_id'];

       

     $article= Magazine::find($id);
        $article->title=$title;
        $article->photo=$filepath;
        
        $article->description=$request->description;
        $article->article=$articlepath;
        
        

        $article->save();

     return redirect()->route('getArticleByAID',encrypt($article->announce_id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
       // Magazine::find($id)->delete();

    }

    public function comment(Request $request){
        // dd($request);
        $id=Auth::user()->id;
        $magazine_id=$request->id;
        $comment=$request->comment;

       $newcomment=new Comment();
       $newcomment->magazine_id=$magazine_id;
       $newcomment->user_id=$id;
       $newcomment->comment=$comment;
       $newcomment->save();

      $m= Magazine::find($magazine_id);
      if($m->comment_status !=1){
        $m->comment_status=1;
        $m->save();
      }
       // dd($newcomment);
        return json_encode($newcomment);

    }

    public function getcomment($id){
        $comments=Comment::where('magazine_id',$id)
        ->with('user')
        ->orderBy('id','desc')->get();
        return $comments;
        // $comments=CommentResource::collection($comments);
        // return $comments;
        
    }

    public function addProposal($id){
        $user=Auth::user();
        $user_id=$user->id;
        $announce=Announce::find($id);
        // dd($user);
        if($user->hasRole('coordinator')){
            $faculty_id=$user->coordinator[0]->faculty_id;
            // $magazines=Magazine::where('record_id',$record->id)
            //             ->where('announce_id',$announce->id)
            //             ->orderBy('id','desc')->get();
            // $magazines=DB::table('magazines')
            // ->join('records','magazines.record_id','=','records.id')
            // ->join('students','students.id','=','records.student_id')
            // ->join('users','students.user_id','=','users.id')
            // ->select('*','users.name as sname')
            // ->where('magazines.announce_id',$id)
            // ->orderByDesc('magazines.id')
            // ->get();
            // dd($magazines);
            $magazines=Magazine::whereHas('record',function($q) use ($faculty_id){
                $q->where('faculty_id','=',$faculty_id);
            })
            ->where('announce_id',$id)
            ->orderBy('id','desc')->get();
            

        }else{

            
       
            // $user_id=Auth::user()->id;
            $student_id=Student::where('user_id',$user_id)->first();
            $date=date('Y');
            $aca=Academic::where('name','=',$date)->first();
            $record=Record::where('student_id',$student_id->id)
                    ->where('academic_id',$aca->id)
                    ->first();
            $magazines=Magazine::where('record_id',$record->id)
            ->where('announce_id',$announce->id)
            ->orderBy('id','desc')->get();
        }



        // studnet roll
        
       

        return view('frontend.blogHome',compact('magazines','announce'));
    }

    public function selectdProposal($id){
      $magazine=Magazine::find($id);
      $magazine->selected_status=1;
      $magazine->save();
     session(['success' => 'selected proposal!']);
      return  redirect()->route('magazine.show',encrypt($id));
    }


    public function unselectdProposal($id){
        $magazine=Magazine::find($id);
          $magazine->selected_status=0;
          $magazine->save();
         session(['success' => 'unselected proposal!']);
          return  redirect()->route('magazine.show',encrypt($id));
    }


    public function pdfview($id){
        $magazine=Magazine::find($id);
        $filepath=public_path().$magazine->article;
        return view('frontend.previewpdf',compact('magazine'));
    }


    public function sendBasic(){
        
       
          echo "Basic Email Sent. Check your inbox.";
    }


    public function getArticleforFID($id){
        $id = decrypt($id);
        $announce=Announce::find($id);
        
        // $rs=Record::with(['magazines'=>function($q) use ($id){
        //     $q->where('announce_id',$id);
        // }])->where('faculty_id',$cF_id)->get();

//          User::withAndWhereHas('submissions', function($query) use ($id){
//     $query->where('taskid', $id);
// })->get();

         $role=Auth::user()->roles[0];
         if($role->name =='manager'){
             

            $magazines=Magazine::with('record.faculty')->where('announce_id',$id)
            ->where('selected_status',1)
            ->orderBy('id','desc')->get();

         }else{
            $cF_id=Auth::user()->coordinator[0]->faculty_id;
            $magazines=Magazine::whereHas('record',function($q) use ($cF_id){
                $q->where('faculty_id','=',$cF_id);
            })->with('record')
            ->where('announce_id',$id)
            ->orderBy('id','desc')->get();
         }
        

         // for manager start
         // $ms=Magazine::with(['record.faculty'=>function($q) use ($cF_id){
         //    $q->where('id',$cF_id);
         // }])->where('announce_id',$id)->get();
         // dd($magazines);
         // for manager end
         return view('frontend.article.listforFMSM',compact('announce','magazines'));
    }


    public function articleDGuest($id){
        $id=decrypt($id);
        $m=Magazine::find($id);
        return view('frontend.articleDG',compact('m'));
    }

        //contributions for each faculty
    public function getStatical1(){
       
        $data=Magazine::with('record.academic','record.faculty')->get();


         $data=collect($data);
         $data=$data->groupBy(['record.academic.name','record.faculty.name'])->toArray();
        // dd($data);
         $faculties=Faculty::all();
        // foreach ($faculties as $key => $value) {
        //     echo $value->id;
        // }
         $report=[];
         foreach ($faculties as $v) {
           $report[]=$v->name;
        }


       
         
         // dd($data);
         foreach($data as $i=>$v){
            foreach ($v as $k => $val) {
                $data[$i][$k]=count($val);
            }
         }
         
         foreach ($data as $key => $value) {

             foreach ($faculties as $f) {
                 if(!array_key_exists($f->name, $value)){
                    $data[$key][$f->name]=0;
                 }
                    
             }
              // ksort($data[$key]);

         }

         // ksort($data['4']);
         // $report=[];
         // dd($data);
         foreach($data as $i=>$v){
            $data[$i]=array_replace(array_flip($report), $v);
         }
         
         


         return response()->json(['report'=>$report,'data'=>$data]);
        
    }

      //student count or contributions
       public function getStatical2(){
        
        // $data=DB::select('select count(distinct(magazines.record_id)) as cm from magazines 
        //     join records on records.id = magazines.record_id 
        //     join faculties on records.faculty_id = faculties.id 
        //     join academics on academics.id = records.academic_id 
        //     group by faculties.id,academics.name order by academics.id' );
         // dd($data);
         $faculties=Faculty::all();
          $report=[];
         foreach ($faculties as $v) {
           $report[]=$v->name;
        }
        $data=Magazine::with('record.academic','record.faculty','record.student'
        )->get();
        // dd($data);



         $data=collect($data);
         $data=$data->groupBy(['record.academic.name','record.faculty.name','record_id'])->toArray();

        foreach($data as $i=>$v){
            foreach ($v as $k => $val) {
                $data[$i][$k]=count($val);
            }
         }
         // dd($data);
         foreach ($data as $key => $value) {

             foreach ($faculties as $f) {
                 if(!array_key_exists($f->name, $value)){
                    $data[$key][$f->name]=0;
                 }
                    
             }
              // ksort($data[$key]);

         }

        foreach($data as $i=>$v){
            $data[$i]=array_replace(array_flip($report), $v);
         }
        // dd($data);
        
        return response()->json(['report'=>$report,'data'=>$data]);

      }



      public function downloadzip($id){
        $id=decrypt($id);
        $m=Magazine::find($id);
        // echo $id;
        $public_dir=public_path().'/KMDtemplate/zipupload/';
        // dd($public_dir);
        $zipFileName = Carbon::now().'.zip';
        $zip = new ZipArchive;

        if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {    
            $zip->addFile(public_path().$m->article);        
             $zip->close();
        }
         $headers = array(
                'Content-Type' => 'application/octet-stream',
            );
        $filetopath=$public_dir.'/'.$zipFileName;
        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName,$headers);
        }
        $a=['status'=>'file does not exist'];
        // echo $a['status'];
        abort(404);
      }



      public function getMByFID($id){

        // $cF_id=Auth::user()->coordinator[0]->faculty_id;
            $ms=Magazine::whereHas('record',function($q) use ($id){
                $q->where('faculty_id','=',$id);
            })->with('record')
            ->where('selected_status',1)
            ->orderBy('id','desc')->paginate(6);
            // dd($ms);
             return view('frontend.announce',compact('ms'));

      }


      public function getNoComment($id){
        
         $cF_id=Auth::user()->coordinator[0]->faculty_id;
        $ms=Magazine::whereHas('record',function($q) use ($cF_id){
                $q->where('faculty_id','=',$cF_id);
            })->with('record.faculty','record.student.user')
        ->where('announce_id','=',$id)
        ->where('comment_status','=',0)
        ->where('postDate','>=', Carbon::now()->subDays(14))
        ->orderByDesc('id')
        ->get();


         
         return Datatables::of($ms)->addIndexColumn()->make(true);

      }


      public function getNoComment14($id){
         $cF_id=Auth::user()->coordinator[0]->faculty_id;
        $ms=Magazine::whereHas('record',function($q) use ($cF_id){
                $q->where('faculty_id','=',$cF_id);
            })->with('record.faculty','record.student.user')
        ->where('announce_id','=',$id)
        ->where('comment_status','=',0)
        ->where('postDate','<=', Carbon::now()->subDays(14))
        ->orderByDesc('id')
        ->get();
         return Datatables::of($ms)->addIndexColumn()->make(true);
      }



}
