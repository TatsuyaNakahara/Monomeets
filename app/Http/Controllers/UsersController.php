<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Mono;






class UsersController extends Controller




{
    
    
    public function __construct() 
     { 
  
         $this->middleware('auth'); 
     } 

    
    
    public function index()
    {
        $users =  User::paginate(10);


        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    /*
    
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $monos = $user->monos()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'monos' => $monos,
            ];
            $data += $this->counts($user);
            return view('users.show', $data);
        }else {
            return view('users.index', [
            'users' => $users,
        ]);
        }
        
    }*/
    
    
    
      public function show($id)
    {
        $user = User::find($id);
        $monos = $user->monos()->orderBy('created_at', 'desc')->paginate(12);

        $data = [
            'user' => $user,
            'monos' => $monos,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
        
        
        
        
        
        

        
        
        
        
    }
    
    
    public function overview($id)
    {
        $user = User::find($id);
        $monos = \App\Mono::orderBy('created_at', 'desc')->paginate(12);

        $data = [
            'user' => $user,
            'monos' => $monos,
        ];

        $data += $this->counts($user);

        return view('users.timeline', $data);
    }
    
    
    
    public function chat($id)
    {
        $user = \Auth::user();
        $mono = Mono::find($id);
       // $postings = $user->postings()->orderBy('created_at', 'desc')->paginate(10);
        $postings = \App\Posting::where('mono_id', $id)->paginate(10);
        $data = [
            'user' => $user,
            'postings' => $postings,
            'mono_id' => $id,
            'mono' => $mono,
        ];

        $data += $this->counts($user);

        return view('users.chat', $data);
    }
    
    
    
    
    public function checkmyitems($id)
    {
        $user = User::find($id);
        $monos = $user->monos()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'monos' => $monos,
        ];

        $data += $this->counts($user);

        return view('users.myitems', $data);
    }
    
    
    

    public function seedetails($id)
    {
        $mono = Mono::find($id);
        //$user = User::find($id);
        $monos = [$mono];//$user->monos()->orderBy('created_at', 'desc')->paginate(10);
        $user = $mono->user()->get()[0];
        $data = [
            'user' => $user,
            'monos' => $monos,
        
        ];
//var_dump($user);
       $data += $this->counts($user);

        return view('monos.monopage', $data);
    }
    
    
    
    
    
    
    
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    
    
    public function favoritings($id)
    {
        $user = User::find($id);
        $favoritings = $user->favoritings()->paginate(10);

        $data = [
            'user' => $user,
            'monos' => $favoritings,
        ];

        $data += $this->counts($user);

        return view('users.favoritings', $data);
        
        
    }

    

    
    public function wantings($id)
    {
        $user = User::find($id);
        $wantings = $user->wantings()->paginate(10);

        $data = [
            'user' => $user,
            'monos' => $wantings,
        ];

        $data += $this->counts($user);

        return view('users.wantings', $data);
    }

    public function wanters($id)
    {
       //s return;
        $user = User::find($id);
        // $wanters = Mono::all();
        $idsTmp = \DB::select('select monos.id as id, mono_want.user_id as wanter_id from  mono_want join monos on mono_want.want_id = monos.id where monos.user_id = ?', [$id]);
        $ids =array();
        $wanter_ids_from_mono_id = array();
        foreach($idsTmp as $t) {
            array_push($ids, $t->id);
            if(false == isset($wanter_ids_from_mono_id[$t->id])) {
                $wanter_ids_from_mono_id[$t->id] = array();
            }
            array_push($wanter_ids_from_mono_id[$t->id], $t->wanter_id);
        } 
//        foreach($wanter_ids_from_mono_id as $i){
 //       User::find($i)->; 
   //     
        
     //   }

        $wanters = Mono::whereIn('id',$ids)->paginate(10);
        $count_wanters = Mono::whereIn('id',$ids)->count();

//        $wanters = $user->wanters()->paginate(10);
        // print_r($wanters);exit;
        $data = [
            'user' => $user,
            'monos' => $wanters,
            'wanter_ids_from_mono_id' => $wanter_ids_from_mono_id
        ];
        
        $data += $this->counts($user);
        $data['count_wanters'] = $count_wanters;
        return view('users.wanters', $data);
    }

    
    
    
    
    
}
