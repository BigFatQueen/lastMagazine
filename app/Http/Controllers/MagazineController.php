<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Magazine;
use App\Coordinator;
use App\Announce;
use App\Student;
use App\Academic;
use App\Record;
use Auth;
use App\Comment;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Str;
use Mail;
use URL;

use DB;
class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $des=$request->description;
        $dom=new \DomDocument();
        $dom->loadHTML($des,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
       // dd($images); 
        foreach($images as $k => $img){

            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);

            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);

             $image_name='/storages/description/'.time().'.png';

            $path = public_path() . $image_name;
            file_put_contents($path, $data);

            $img->removeAttribute('src');

            $img->setAttribute('src', $image_name);
        }
        // dd($postDate);
       $description = $dom->saveHTML();
        // protected $fillable=['title','photo','postDate','description','article','record_id'];

       $user_id=Auth::user()->id;
        $student_id=Student::where('user_id',$user_id)->first();
        $date=date('Y');
        $aca=Academic::where('name','=',$date)->first();
        $record=Record::where('student_id',$student_id->id)
                ->where('academic_id',$aca->id)
                ->first();
                $record_id=$record->id;

     $article= Magazine::create([
        'title'=>$title,
        'photo'=>$filepath,
        'postDate'=>$postDate,
        'description'=>$description,
        'article'=>$articlepath,
        'record_id'=>$record_id,
        'announce_id'=>$request->announce_id

      ]);

        $coordinator=Coordinator::with('user')->where('faculty_id',$record->faculty_id)->first();
        // dd($coordinator);
         $data = array('name'=>$coordinator->user->name,'url'=> URL::route('magazine.show', 2));
         $email=$coordinator->user->email;
         // dd($email);

          Mail::send(['text'=>'mail'], $data, function($message) use ($email) {
             $message->to($email, 'Article Checking')->subject
                ('Notification of new arrival Article');
             $message->from('_mainaccount@khinzarchiaung.me','KMD Association');
          });

          // dd("sent");

     return redirect()->route('addProposal',$request->announce_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $magazine=Magazine::find($id);
        return view('frontend.blogPost',compact('magazine'));
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
        $des=$request->description;
        $dom=new \DomDocument();
        $dom->loadHTML($des,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
       // dd($images); 
        foreach($images as $k => $img){

            $data = $img->getAttribute('src');
            if(Str::startsWith($data, 'data')){
            list($type, $data) = explode(';', $data);

            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);

             $image_name='/storages/description/'.time().'.png';

            $path = public_path() . $image_name;
            file_put_contents($path, $data);

            $img->removeAttribute('src');

            $img->setAttribute('src', $image_name);
            }
        }
        // dd($postDate);
       $description = $dom->saveHTML();
        // protected $fillable=['title','photo','postDate','description','article','record_id'];

       

     $article= Magazine::find($id);
        $article->title=$title;
        $article->photo=$filepath;
        
        $article->description=$description;
        $article->article=$articlepath;
        
        

        $article->save();

     return redirect()->route('addProposal',$article->announce_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
      return  redirect()->route('magazine.show',$id);
    }


    public function pdfview($id){
        $magazine=Magazine::find($id);
        $filepath=public_path().$magazine->article;
        return view('frontend.previewpdf',compact('magazine'));
    }


    public function sendBasic(){
        
       
          echo "Basic Email Sent. Check your inbox.";
    }


    // public function admitPMbyC($user,$announce){

    // }
}
