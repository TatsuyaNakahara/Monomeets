<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class PostingsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $postings = $user->postings()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'postings' => $postings,
            ];
            $data += $this->counts($user);
            return view('users.chat', $data);
        }else {
            return view('welcome');
        }
    }
    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'saying' => 'required|max:191',
        ]);

        $request->user()->postings()->create([
            'saying' => $request->saying,
        ]);

        return redirect()->back();
    }
    
    
    public function destroy($id)
    {
        $posting = \App\Posting::find($id);

        if (\Auth::id() === $posting->user_id) {
            $posting->delete();
        }

        return redirect()->back();
    }
    
}
