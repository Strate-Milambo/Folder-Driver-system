<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;

class QuickDocumentController extends Controller
{
    public function pdf(Request $request)
    {
       

        $data =[
        'title' =>"myFile",
        'content'=>$request->doc
        ];


        $pdf = Pdf::loadView('pdf', $data);
        $pdf->loadHTML($request->doc);
        $user = Auth::user()->name;
        
        $filename = !empty($request->filename) ? $request->filename : $user;

        return $pdf->download($filename.'.pdf');
  
    }
    public function generatePdf(){
        
        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);
        return view('quickDocument', compact('notifications'));
    }
    public function socialTemplate()
    {
        $posts = Posts::query()
        ->select('posts.id as post_id','posts.*','users.photo_path','users.name','users.id as user_id')
        ->join('users','users.id', "=", "posts.user_id")
        ->orderBy('posts.created_at','desc' )
        ->get(); 

        $files = Storage::disk('local')->get('files/1/UrLd5MmmfnW8URTWt6qkFYususYpNBbGb588JxQA.mp4');
        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);
        return view('social', compact('notifications','files','posts'));
    }
    public function getVideo()
    {
        $video = Storage::disk('local')->get("files/1/UrLd5MmmfnW8URTWt6qkFYususYpNBbGb588JxQA.mp4");
        $response = Response::make($video, 200);
        $response->header('Content-Type', 'video/mp4');
        return $response;
    }
    public function createPost(Request $request)
    {
       
        $request->validate([
            'description' => 'required',
            'post_path'=>'required',
        ]);
        $description = $request->description;
        $file = $request->post_path;
      

        $extension=$request->post_path->extension();
        $post_path = time().'.'.$extension;
        
        $path=$request->post_path->storeAS('Posts',$post_path, 'public');

        $posts = new Posts();

            $posts->user_id= Auth::id();
            $posts->description=$description;
            $posts->storage_path=$post_path;
            $posts->extension=$extension;
            $posts->save();
        

        return redirect()->back();
       
    }
    public function addComment(Request $request)
    {
        $request->validate([
            'comment'=> 'required',
        ]);

        $comment = $request->comment;
        $post = $request->post;

        $comments = new Comments();

        $comments->user_id = Auth::id();
        $comments->post_id = $post;
        $comments->content = $comment;

        $comments->save();

        return redirect()->back();
    }
    public function downloadFiles(Request $request)
    {
     
        $nomFichier = $request->file; // Remplacez par le nom de votre fichier
        $path = "storage/Posts/";
        $cheminFichier = public_path($path.$nomFichier);

        // dd($cheminFichier);

        return response()->download($cheminFichier,$nomFichier);
    }
    public function viewFiles(Request $request)
    {
        $nomFichier = $request->view; // Remplacez par le nom de votre fichier
        $path = "storage/Posts/";
        $cheminFichier = public_path($path.$nomFichier);
        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);

       


        // return view('viewDocument', compact('notifications'));

        return response()->file($cheminFichier);

    }
    
}
