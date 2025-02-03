<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\FileShare;
use Illuminate\Http\Request;
use App\Models\Collaborations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Query\JoinClause;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware("admin");
    }

    public function system()
    {
        $allContents = File::all();
        $folders = File::where('is_folder','=','1')->get();
        $files = File::where('is_folder','=','0')->get();
        $users = User::all();
        $collaborations = Collaborations::all();
        $files_shared = FileShare::all();

        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);

        return view('Dashboard.System', compact('allContents','collaborations','folders','files','users','files_shared','notifications'));
    }
    public function users(Request $request)
    {
        $search=$request->input('search');
        $allContents = File::all();
        $folders = File::where('is_folder','=','1')->get();
        $files = File::where('is_folder','=','0')->get();

        $users = DB::table('files as f')->select('u.id as id','u.email as email', 'u.name as name', DB::raw('SUM(f.size) as memory'), 'u.AccessCode', 'u.photo_path' )
                                      ->join('users as u', function(JoinClause $join){
                                        $join->on('f.created_by','=', 'u.id');
                                      })
                                      ->groupBy('f.created_by');
                                     
        if(!empty($search)){
            $users=User::where('name', 'like', "%$search%");
        }
        $users = $users->Simplepaginate(7);

        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);

        return view('Dashboard.Users', compact('allContents','folders','files','users','notifications'));
    }
    public function files(Request $request)
    {
         
        $search = $request->search;
        $folders = File::where('is_folder','=','1')->get();
        $files = File::where('is_folder','=','0')->get();
        $users = User::all();
        $allContent = File::all();
       

        $allContents = DB::table('files as f')->select('f.id as id','f.name as name', 'f.size as size', 'u.name as owner', 'u.photo_path as photo_path' )
            ->join('users as u', function(JoinClause $join){
            $join->on('f.created_by','=', 'u.id');
        });

        if(!empty($search)){
          $allContents = $allContents->where('f.name', 'like', "%$search%");
        }
        $allContents = $allContents->Simplepaginate(10);
       
        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);

        return view('Dashboard.Files', compact('allContents','folders','files','users','allContent','notifications'));
    }

    public function manage(Request $request)
    {
        if($request->choice="Delete")
        {
            $user=User::find($request->user);
            $user->delete();
        }
        else if($request->choice="Warning")
        {
            $user = User::find($request->user);
            $user->statut = "Warning";
        }
        else if ($request->choice="Blocked")
        {
            $user = User::find($request->user);
            $user->statut = "Blocked";
        }
        else
        {
            return redirect()->back();   
        }

        return redirect()->back();
    }
    public function manageFiles(Request $request)
    {
        
        $file=File::find($request->file);

        
      
       
        if($request->choice=="Delete")
        {
            
            $file->delete();
           
        }
        
        else if ($request->choice=="Download")
        {
           
            $file=File::findOrFail($request->file);
            // $extension=$request->file->extension();
            // $filename = time().".".$extension;
            // $path=$request->avatar->storeAs(
            // 'Check_Contents',
            // $filename,
            // 'public'
            // );
            $dest = pathinfo($file->storage_path, PATHINFO_BASENAME);
            $content = Storage::disk('local')->get($file->storage_path);

            
        return response()->download($file->storage_path) ;
        
        }
        else
        {
            return redirect()->back();   
        }

        return redirect()->back();
    }

}
