<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\message;
use Auth;
use Pusher\Pusher;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = User::where('id', '!=', Auth::User()->id)->get();

        $user = DB::select("select users.id, users.name, users.avatar, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . " 
        group by users.id, users.name, users.avatar, users.email");
        return view('home')
                ->with('user',$user);
    }

    public function get_messages($user_id)
    {
        // return $user_id;
        // getting all messages which is from =Auth id() and to user id or from = user_id and to my_id
        $my_id = Auth::user()->id;
        
        message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        $messages = message::where(function($q) use ($my_id,$user_id) {
         $q->where('from', $my_id)
           ->where('to', $user_id);})
        ->orWhere(function($q) use ($my_id,$user_id) {
         $q->where('to', $my_id)
           ->where('from', $user_id);})->get();


       return view('messages.index')
                ->with('messages',$messages); 

    }

    public function send_message(Request $req){
        // dd($req->all());
        $from = Auth::User()->id;
        $to = $req->receiver_id;
        $message = $req->message;

        $temp = array(
            'from' =>$from,
            'to' =>$to,
            'message' =>$message,
            'is_read' =>0,
            'created_at' =>date('Y-m-d h:i:s')
             );
        $result= message::insert($temp);

        $options = array(
            'cluster' => 'ap2',
            'forceTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data= ['from' => $from, 'to'=>$to];
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
