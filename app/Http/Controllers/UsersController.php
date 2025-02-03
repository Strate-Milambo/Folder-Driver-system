<?php

namespace App\Http\Controllers;
use App\Models\User;
use Inertia\Inertia;
use App\Mail\ContactMail;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Models\user_priority;
use App\Models\Collaborations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\DeletedCollaborations;
use App\Notifications\AcceptedCollaborations;
use App\Notifications\CoworkersNotifications;

class UsersController extends Controller
{
 
    public function users_trait(Request $request)
    {

       
        $collaborate = false;
        $coworkers = [];

       (int)$idUser=$request->statut;
      
       $user = $request->user();
        
      
        // the get the all coworkers this owner has.
        $usersPriorities=User::find(Auth::id())->usersPriorities()->get();
    
        $allUsersPriority=[];

        if(!empty($usersPriorities)){ 
            foreach($usersPriorities as $user){
                $allUsersPriority[] = $user->coworkers; 
            }
        }

        if(isset($idUser)){
            
            $user = User::find($idUser);
            if(!in_array($user->id, $allUsersPriority)){
                
                $priority = new user_priority();

                $priority->users_id=Auth::id();
                $priority->coworkers=$user->id;
                $priority->save();

                $collaborationAdd =DB::table('user_priorities as t1')
                    ->join('user_priorities as t2', 't1.users_id', '=', 't2.coworkers')
                    ->where('t1.users_id', Auth::id())
                
                    ->select('t1.users_id as user1', 't2.users_id as user2')
                    ->get();
                   
                    if(count($collaborationAdd) > 0){

                        $collaborate1 = new  Collaborations();
                        $collaborate1->first_users = $collaborationAdd[0]->user1;
                        $collaborate1->second_users = $collaborationAdd[0]->user2;
                        $collaborate1->save();

                        $collaborate2 = new  Collaborations();
                        $collaborate2->first_users = $collaborationAdd[0]->user2;
                        $collaborate2->second_users = $collaborationAdd[0]->user1;
                        $collaborate2->save();
                        

                    }else{
                        $collaborate = false;
                    }

                    $collaborations = user_priority::where("coworkers",Auth::id())->get();
       
                    // if(!empty($collaborations)){
                    //     $collaborations = $collaborations;
                    // }
               
                    $iterations = count($collaborations) -1;
                  
                    
                    
                    for($i=0; $i <= $iterations ; $i++){
                        $coworkers[] = $collaborations[$i]->users_id;

                    }
                   
                    if(!in_array($idUser,$coworkers)){
                        
                        $user->notify(new CoworkersNotifications());
                    }else{
                        $user->notify(new AcceptedCollaborations());
                    }
                
            }else{

               user_priority::where('coworkers','=', $user->id)->delete(); 
               $user->notify(new DeletedCollaborations());
                Collaborations::where([
                    ['first_users', Auth::id()],
                    ['second_users', $user->id]
                ])->delete();
                Collaborations::where([
                    ['first_users', $user->id],
                    ['second_users', Auth::id()]
                ])->delete();    
            }
            
        }
        return redirect()->back();
    }
    public function users(Request $request)
    {
  
       
        $collaborate = false;
        $coworkers = [];
       
        
       $user = $request->user();

       $search=$request->input('search') ?? "";

        $usersPriorities = User::query()
                ->select('users.*')
                ->join('user_priorities','user_priorities.coworkers', "=", "users.id")
                ->where('user_priorities.users_id',Auth::id())
               
                ->get(); 

        $totalUsers = User::all();
        $users = new User();

        $notices = DB::table('notifications')->select('notifications.*')->limit(1)->get();

        $collaborations = Collaborations::where("first_users",Auth::id())->get();
       
      
    
   
   
        if(!empty($search)){
            $users=$user->query()->where('name', 'like', "%$search%")->orderBy('id','desc' );
        }else{
            $users = $users->orderBy('id','desc' );
        }

        $users = $users->simplepaginate(9);
   
        $iterations = count($collaborations) -1;
      
      
        
        for($i=0; $i <= $iterations ; $i++){
            $coworkers[] = $collaborations[$i]->second_users;
        } 
        
        $memorySize= DB::table('files')->select(DB::raw('SUM(files.size) as memory'))
        ->join('users', 'files.created_by','=', 'users.id')
        
        ->where('users.id', Auth::id())
        ->groupBy('files.created_by')->get()[0];

        $defaultSize = 2147483648;
        $restSize = $defaultSize - $memorySize->memory;
        $totalSize = $memorySize->memory;
        $totalSizes = $this->get_user_size($memorySize->memory);
        // $restSize = $this->get_user_size($restSize);

       $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);
        
        return view("usersTemplate", compact('usersPriorities','user','users', 'totalUsers', 'notices','coworkers', 'totalSize', 'totalSizes','restSize','notifications','defaultSize'));
    }
   

    public function help(Request $request)
    {
        $user = $request->user();
        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);
        return view("helpUser", compact('user','notifications'));
    }
    public function welcome()
    {
        return view('welcomeFolder');
    }
    public function profile()
    {
        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);

        return view('profileUser',compact('notifications'));
    }
    public function usersProfile(Request $request)
    {
        $user= User::where('id','=',$request->id)->get()[0];

      
        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);

        return view('usersProfile', compact('user','notifications'));
    }
    public function Notifications()
    {
   
        
        $notificationsAll = Auth::user()->unreadnotifications()->simplepaginate(10);
        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);
        return view('notificationUser', compact('notificationsAll','notifications'));
    }
    public function policy()
    {
        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);

        return view('policy', compact('notifications'));
    }
    public function invitation()
    {  
        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);

        return view('invitation', compact('notifications'));
    }
    public function Emailinvitation(Request $request)
    {   
        $request->validate([
            'email'=> 'required|email',
        ]);
        $user = User::find(Auth::id());
        Mail::to($request->email)->send(new WelcomeMail($user));
        
        return redirect()->back();
    }
    public function contact()
    {
        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);

        return view('contact', compact('notifications'));
    }
    public function contactSend(Request $request)
    {   
      
        $request->validate([
            'email'=> 'required|email',
            'name' => 'required',
            'content'=>'required|min:10',
            'subject'=>'required',
        ]);
       
        
        // $user = User::find(Auth::id());
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($request->name,$request->subject,$request->content,$request->email));
        
        return redirect()->back();
    }
    public function FirstWelcome()
    {
        $notifications = Auth::user()->unreadnotifications()->simplepaginate(4);

        return view('welcomeApp' , compact('notifications'));
    }
    public function get_user_size($size)
    {
        $units=['o','Ko','Mo', 'Go', 'To', 'Po'];

        
        $power = $size > 0 ? floor(log($size,1024)) : 0;

        return number_format($size/pow(1024,$power),2,'.',',')." ". $units[$power];
    }
}
