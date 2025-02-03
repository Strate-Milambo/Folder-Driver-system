<?php

namespace App\Http\Controllers;


use Exception;
use Carbon\Carbon;
use App\Models\File;
use App\Models\User;
use Inertia\Inertia;
use App\Models\FileShare;
use App\Models\StarredFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Mail\ShareFilesMail;
use Illuminate\Http\Request;
use App\Jobs\shareFilesToUser;
use App\Rules\EmailAndCodeMatch;
use App\Jobs\UploadFileToCloudJob;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\FileResource;
use App\Http\Resources\UserResource;
use App\Jobs\verificationTotalVirus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use NormanHuth\VirusTotal\VirusTotal;
use App\Jobs\notifyUserForSharingFile;
use App\Http\Requests\StoreFileRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ShareFilesRequest;
use App\Http\Requests\TrashFilesRequest;
use Illuminate\Notifications\Notifiable;
use App\Http\Requests\FilesActionRequest;
use App\Http\Requests\storeFolderRequest;
use App\Http\Requests\DestroyFilesRequest;
use App\Http\Requests\AddToFavouritesRequest;
use App\Notifications\sendFolderNotifications;
use Illuminate\Console\View\Components\Component;


class FileController extends Controller
{
    use Notifiable;
    
    public function myFiles(Request $request,string $folder = null)
    {
      
        
        $search = $request->get('search');

      
        if($folder){
            $folder = File::query()
            ->where('created_by', Auth::id())
            ->where('path',$folder)
            ->firstOrFail();
        }
       
       
        if(!$folder){
            // $folder = File::query()->where("created_by",Auth::id())->get();
            $folder = $this->getRoot();
        }
        

        $favourites = (int)$request->get('favourites');
        
        $query=File::query()
            ->select('files.*')
            ->with('starred')
            ->where('created_by', Auth::id())
            ->where('_lft','!=', 1) //pour eviter d'afficher les files du users
            ->orderBy('is_folder', 'desc')
            ->orderBy('created_at','desc' )
            ->orderBy('id', 'desc');
            // ->paginate(10);
            // dd($query->toSql());
          

            if($search){
                $query->where('name', 'like', "%$search%");
            }else{
                $query->where('parent_id', $folder->id);
            }

            if($favourites===1){
                $query->join('starred_files', 'starred_files.file_id','=','files.id')
                      ->where('files.parent_id', Auth::id())->get();
            }
            
        $files=$query->paginate(10);
   
        $files = FileResource::collection($files);
        

        if ($request->wantsJson()) {
            return $files;
        }

        $ancestors = FileResource::collection([...$folder->ancestors, $folder]);
        // $ancestors = user::find(Auth::id());
     
       
        $coWorkers = User::query()
        ->select('users.*')
        ->join('user_priorities','user_priorities.coworkers', "=", "users.id")
        ->where('user_priorities.users_id',Auth::id())
        ->get(); 
        $coWorkers = UserResource::collection($coWorkers);
      
        
        return Inertia::render('MyFiles',compact('files','folder','ancestors', 'coWorkers'));
    }

    public function  trash(Request $request)
    {
        $search = $request->get('search');
        $query = File::onlyTrashed()
                ->where('created_by', Auth::id())
                ->orderBy('is_folder', 'desc')
                ->orderBy('files.id', 'desc')
                ->orderBy('created_at', 'desc');
                
        if($search){
            $query->where('name', 'like', "%$search%");
        }

        $files=$query->paginate(10);

        $files = FileResource::collection($files);

        if ($request->wantsJson()) {
            return $files;
        }
        
        return Inertia::render('Trash', compact('files'));
    }

    public function sharedWithMe(Request $request)
    {
        $search = $request->get('search');

        $query = File::getSharedWithMe();

        if($search){
            $query->where('name', 'like', "%$search%");
        }

        $files= $query->paginate(10);

        $files = FileResource::collection($files);

        if ($request->wantsJson()) {
            return $files;
        }

       
        return Inertia::render('SharedWithMe', compact('files')); 
    }
    public function sharedByMe(Request $request)
    {
        $search= $request->get('search');

        $query = File::getSharedByMe();

        if($search){
            $query->where('name', 'like', "%$search%");
        }

        $files= $query->paginate(10);

        $files = FileResource::collection($files);
        
        if ($request->wantsJson()) {
            return $files;
        }

        return Inertia::render('SharedByMe', compact('files')); 
    }
    public function favourites(Request $request)
    {
        $search= $request->get('search');

        $query =File::getFavourites();

        

        if($search){
            $query->where('files.name', 'like', "%$search%");
        }

        $files= $query->paginate(10);

        $files = FileResource::collection($files);
        
        if ($request->wantsJson()) {
            return $files;
        }

        return Inertia::render('Favourites', compact('files')); 
    }
    public function coWorkers(Request $request)
    {
        $CoWorkers = User::query()
        ->select('users.*')
        ->join('user_priorities','user_priorities.coworkers', "=", "users.id")
        ->where('user_priorities.users_id',Auth::id())
        ->get(); 
        $CoWorkers = UserResource::collection($coWorkers);

        return Inertia::render('CoWorkers', compact('CoWorkers')); 
    }

    public function createFolder(storeFolderRequest $request)
    {
        
        $data = $request->validated();
        
        $parent = $request->parent; 
      
        if($parent == null){
            $parent = $this->getRoot();
        }
       
        $file = new File();
        $file->is_folder = 1;
        $file->name =$data['name'];
        $parent->appendNode($file);
      
    }

    public function store(StoreFileRequest $request)
    {
        $data = $request->validated();


        // verificationTotalVirus::dispatch($data['files'],Auth::user()); elle présente un problème de sérialisation
        
       

            $parent = $request->parent;
            $user = $request->user();
            $fileTree = $request->file_tree;

            if (!$parent) {
                $parent = $this->getRoot();
            }

            if (!empty($fileTree)) {
                $this->saveFileTree($fileTree, $parent, $user);
            } else {
                foreach ($data['files'] as $file) {
                    /** @var \Illuminate\Http\UploadedFile $file 489548*/

                    $this->saveFile($file, $user, $parent);
                }
            }
        
    }
    public function saveFileTree($fileTree, $parent, $user)
    {
        foreach ($fileTree as $name => $file) {
            if (is_array($file)) {
                $folder = new File();
                $folder->is_folder = 1;
                $folder->name = $name;

                $parent->appendNode($folder);
                $this->saveFileTree($file, $folder, $user);
            } else {

                $this->saveFile($file, $user, $parent);
            }
        }
    }
    public function destroy(FilesActionRequest $request)
    {
       $data = $request->validated();
       $parent = $request->parent;
     
       if($data['all']){
        $children = $parent->children;

        foreach($children as $child){
            $child->moveToTrash();
        }
       }else{

            foreach($data['ids'] ?? [] as $id){
                $file = File::find($id);
                if($file){
                    $file->moveToTrash();
                }
               
            }
       }
    }

    public function download(FilesActionRequest $request)
    {
        $data = $request->validated();
        $parent = $request->parent;
        $all = $data['all'] ?? false;
        $ids = $data['ids'] ?? [];

        if (!$all && empty($ids)) {
            return [
                'message' => 'vous devez Sélectionner du contenu à envoyer'
            ];
        }
        if ($all) {
            $url = $this->createZip($parent->children);
            $filename = $parent->name . '.zip';
        } else {
            [$url, $filename] = $this->getDownloadUrl($ids, $parent->name);
        }
       
        
        return [
            'url' => $url,
            'filename' => $filename
        ];
    }

    public function downloadSharedWithMe(FilesActionRequest $request)
    {
        $data = $request->validated();

        $all = $data['all'] ?? false;
        $ids = $data['ids'] ?? [];

        if (!$all && empty($ids)) {
            return [
                'message' => 'Please select files to download'
            ];
        }

        $zipName = 'shared_with_me';
        if ($all) {
            $files = File::getSharedWithMe()->get();
            $url = $this->createZip($files);
            $filename = $zipName . '.zip';
        } else {
            [$url, $filename] = $this->getDownloadUrl($ids, $zipName);
        }

        return [
            'url' => $url,
            'filename' => $filename
        ];
    }

    public function downloadSharedByMe(FilesActionRequest $request)
    {
        $data = $request->validated();

        $all = $data['all'] ?? false;
        $ids = $data['ids'] ?? [];

        if (!$all && empty($ids)) {
            return [
                'message' => 'Please select files to download'
            ];
        }

        $zipName = 'shared_by_me';
        if ($all) {
            $files = File::getSharedByMe()->get();
            $url = $this->createZip($files);
            $filename = $zipName . '.zip';
        } else {
            [$url, $filename] = $this->getDownloadUrl($ids, $zipName);
        }

        return [
            'url' => $url,
            'filename' => $filename
        ];
    }

    private function getDownloadUrl(array $ids, $zipName)
    {
        if (count($ids) === 1) {
            $file = File::find($ids[0]);

            if ($file->is_folder) {
                if ($file->children->count() === 0) {
                    return [
                        'message' => 'The folder is empty'
                    ];
                }
                $url = $this->createZip($file->children);
                $filename = $file->name . '.zip';
            } else {
            
                $dest = pathinfo($file->storage_path, PATHINFO_BASENAME);
                if ($file->uploaded_on_cloud) {
                    $content = Storage::get($file->storage_path);
                } else {
                    $content = Storage::disk('local')->get($file->storage_path);
                }

                // Log::debug("Getting file content. File:  " .$file->storage_path).". Content: " .  intval($content);

                $success = Storage::disk('public')->put($dest, $content);
                // Log::debug('Inserted in public disk. "' . $dest . '". Success: ' . intval($success));
                $url = asset(Storage::disk('public')->url($dest));
                // Log::debug("Logging URL " . $url);
                $filename = $file->name;
            }
        } else {
            $files = File::query()->whereIn('id', $ids)->get();
            $url = $this->createZip($files);

            $filename = $zipName . '.zip';
        }

        return [$url, $filename];
    }

    /**
     *
     *
     * @param $file
     * @param $user
     * @param $parent
     * @author strat mil's <pmilambo47@gmail.com>
     */
    private function saveFile($file, $user, $parent): void
    {
        // we prefare to upload first of all file in local after that we gon' switch to s3 ; cause in the opposite that schould take a minute

        $path = $file->store('/files/' . $user->id, 'local');

        $model = new File();
        $model->storage_path = $path;
        $model->is_folder = false;
        $model->name = $file->getClientOriginalName();
        $model->mime = $file->getMimeType();
        $model->size = $file->getSize();
        $model->uploaded_on_cloud = 0;
      

        $parent->appendNode($model);

        //todo background job for file upload

        UploadFileToCloudJob::dispatch($model);
       
    }

    public function getRoot()
    {
        return File::query()->whereIsRoot()->where('created_by', Auth::id())->firstOrFail();
    }

    public function createZip($files): string
    {
        $zipPath= 'zip/'. Str::random() . '.zip';
        $publicPath = "public/$zipPath";

        if(!is_dir(dirname($publicPath))){
            Storage::makeDirectory(dirname($publicPath));
        }
        $zipFile= storage::path($publicPath);
        $zip = new \ZipArchive();

        if($zip->open($zipFile, \ZipArchive::CREATE | \ZipArchive::OVERWRITE)===true){
            $this->addFilesToZip($zip,$files);
        }
        $zip->close();
        return asset(Storage::url($zipPath));

    }

    private function addFilesToZip($zip, $files,$ancestors="")
    {
        foreach($files as $file){
            if($file->is_folder){
                $this->addFilesToZip($zip, $file->children, $ancestors . $file->name.'/');

            }else{
                $zip->addFile(Storage::path($file->storage_path), $ancestors . $file->name);
            }
        }

    }

    public function restore(TrashFilesRequest $request)
    {
        $data = $request->validated();
        if($data['all']){
            $children = File::onlyTrashed()->get();
            foreach($children as $child){
                $child->restore();
            }

        }else{
            $ids= $data['ids'] ?? [];
            $children = File::onlyTrashed()->whereIn('id', $ids)->get();
            foreach($children as $child){
                $child->restore();
            }
        }

        return to_route('trash');

    }

    public function deleteForever(TrashFilesRequest $request)
    {
        $data = $request->validated();
        if ($data['all']) {
            $children = File::onlyTrashed()->get();
            foreach ($children as $child) {
                $child->deleteForever();
            }
        } else {
            $ids = $data['ids'] ?? [];
            $children = File::onlyTrashed()->whereIn('id', $ids)->get();
            foreach ($children as $child) {
                $child->deleteForever();
            }
        }

        return to_route('trash');  
    }

    public function addToFavourites(AddToFavouritesRequest $request)
    {
        $data = $request->validated();
      
        $id = $data['id'];
        $file = File::find($id);
        $user_id = Auth::id();

        $starredFile = StarredFile::query()
            ->join('files','files.id','starred_files.file_id')
            ->where('file_id', $file->id)
            ->where('files.parent_id', $user_id)
            ->first();
           
        if ($starredFile) {
            $starredFile->delete();
        } else {
            StarredFile::create([
                'file_id' => $file->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect()->back();
    }

    public function share(ShareFilesRequest $request)
    {
        // modifier le sharefilesrequest pour enfin implemente le scan avec le totalvirus
        //ainsi changez l'email par le nom

    
        $data = $request->validated();
        $parent = $request->parent;

        $all= $data['all'] ?? false;
        $email = $data['email'] ?? [];
        $code = $data['code'] ?? [];
        $ids = $data['ids'] ?? [];

        if(!$all && empty($ids)){
            return[
                'message' => 'Selectionnez un fichier ou dossier à transférer'
            ];
        }

        $user = User::query()->where('AccessCode',$code)->where('email',$email)->first();
        if(!$user){ 
            $message = 'Les identifiants sont incorrects';
            return Inertia::render('ShareFilesModal',compact('message'));
            

          
        }

        if($all){
            $files = $parents->children;

        }else{
            $files = File::find($ids);
        }

        $data=[];
        $ids = Arr::pluck($files, 'id');
        $existingFileIds = FileShare::query()
                        ->whereIn('file_id',$ids)
                        // ->where('user_id',$user->id)
                        ->get()
                        ->keyBy('file_id');
     
        $receiver = User::query()->where("email",$request->email)->get();
       
        foreach($files as $file){
            if($existingFileIds->has($file->id)){
                continue;
            }
            $data[]=[
                'file_id' => $file->id,
                'receiver_id'=>$receiver[0]->id,
                // 'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        FileShare::insert($data);

       

        // TODO send email address
        // Mail::to($user)->send(new ShareFilesMail($user,Auth::user(),$files));

        // shareFilesToUser::dispatch($user,Auth::user(),$files);
        // Mail::to($user)->send(new ShareFilesMail($user, Auth::user(),$files)); // if possible to send user email file's shared


        // notify a user
        // notifyUserForSharingFile::dispatch($user,$files);
        $user->notify(new sendFolderNotifications($files));
        return redirect()->back(); 

    }

}
