<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use JD\Cloudder\Facades\Cloudder;

class MonosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $monos = $user->feed_monos()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'monos' => $monos,
            ];           
            $data += $this->counts($user);
            return view('users.show', $data);
        }
        return view('welcome', $data);
    }
    */
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
            return view('welcome');
        }
        
        
    }

    
    
    public function store(Request $request)
    {
        $this->validate($request,[
          'file'=> 'required',
            'title' => 'required|max:191',
            'content' => 'required|max:191',
           ]);
           
           
        Cloudder::upload($request->file('file'), null, ['folder' => "app/pictures"]);
        $url = Cloudder::getResult()['url'];
        
        $filename = $request->file('file')->store('public/images');
        
        

        $request->user()->monos()->create([
            'title' => $request->title,
            'content' => $request->content,
            'group_picture' => $url,
        ]);

        return redirect()->back();
        
        
    }
    
    
    public function edit($id)
    {
        
        
        $mono = \App\Mono::find($id);

        return view('monos.edit', [
            'mono' => $mono,
        ]);
    }
        
        
        
      //  $mono = \App\Mono::find($id);

    //    if (\Auth::id() === $mono->user_id) {
      //      $mono->edit();
    //    }

      //  return redirect()->back();
    
    
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:191',   
            'content' => 'required|max:191',
        ]);
        
        $mono = \App\Mono::find($id);
        $mono->content = $request->content;
        $mono->title = $request->title;
        $mono->save();

        return redirect('/');
    }
    
    
    
    
    public function destroy($id)
    {
        $mono = \App\Mono::find($id);

        if (\Auth::id() === $mono->user_id) {
            $mono->delete();
        }

        return redirect()->back();
    }
    
    
    public function toppage()
   {
       return view('monos.toppage');
   }


}
