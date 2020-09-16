<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Magazine;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
    //     $articles=Article::all();
    //     dd($articles);
               
    //     return view('frontend.blogHome',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('heo world');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
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
     $article= Magazine::create([
        'title'=>$title,
        'photo'=>$filepath,
        'postDate'=>$postDate,
        'description'=>$description,
        'article'=>$articlepath,
        'user_id'=>Auth::user()->id

      ]);

     return redirect('/');


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
        //
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



}
