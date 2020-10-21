<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announce;
use App\Magazine;
use Illuminate\Support\Str;

class AnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $announces=Announce::orderBy('id','desc')->get();
        $ms=Magazine::with('record','announce')->where('selected_status',1)->paginate(6);
         // dd($ms);
        return view('frontend.announce',compact('ms'));
    }

    public function announcelist(){
       
      
        $m=Magazine::with('record')->get();

        $announces=Announce::orderBy('id','desc')->get();
         $mselected=Magazine::with('record')->where('selected_status',1)->get();
    // dd($mselected);
        return view('frontend.announce.announcelist',compact('announces','m','mselected'));
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
        $request->validate([
            'title' => 'required',
            'description'=>'required',
            'deadline'=>'required',
            'editline'=>'required'
           
        ]);
          // $postDate=Carbon::now()->toDateTimeString();
        $title=$request->title;
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
           //$description = $dom->saveHTML();
            // protected $fillable=['title','photo','postDate','description','article','record_id'];
         $article= Announce::create([
            'title'=>$title,
            'decsription'=>$request->description,
            'deadline'=>$request->deadline,
            'editLDate'=>$request->editline,
            
          ]);

         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $announce=Announce::find($id);
        return view('frontend.announce.detail',compact('announce'));
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
         $title=$request->title;
        //for descripton  and description photo
        // $des=$request->description;
        // $dom=new \DomDocument();
        // $dom->loadHTML($des,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        // $images = $dom->getElementsByTagName('img');
       // dd($images); 
        // foreach($images as $k => $img){

        //     $data = $img->getAttribute('src');
        //     if(Str::startsWith($data, 'data')){
        //         // dd('yes it is');
        //         list($type, $data) = explode(';', $data);

        //          list(, $data)      = explode(',', $data);
        //           $data = base64_decode($data);
        //             // dd($data);

        //              $image_name='/storages/description/'.time().'.png';

        //             $path = public_path() . $image_name;
        //             file_put_contents($path, $data);

        //             $img->removeAttribute('src');

        //             $img->setAttribute('src', $image_name);
        //     }
            


        // }
        // dd($postDate);
           //$description = $dom->saveHTML();
           $description = $request->description;
            // protected $fillable=['title','photo','postDate','description','article','record_id'];
           $article=Announce::find($id);
         
            $article->title=$title;
            $article->decsription=$description;
            $article->deadline=$request->deadline;
            $article->editLDate=$request->editline;
            $article->save();

          $request->session()->put('message', 'Successfully Updated!');

         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Announce::find($id)->delete();
        return redirect('/announceList');
    }
}
