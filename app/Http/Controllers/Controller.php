<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Mono;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user) {
        $count_monos = $user->monos()->count();
        $count_followings = $user->followings()->count();
        $count_followers = $user->followers()->count();
        $count_favoritings = $user->favoritings()->count();
        $count_wantings = $user->wantings()->count();
        $count_postings = $user->postings()->count();
        
        //$count_wanters = $user->wanters()->count();
        
        {
        $idsTmp = \DB::select('select monos.id as id, mono_want.user_id as wanter_id from  mono_want join monos on mono_want.want_id = monos.id where monos.user_id = ?', [$user->id]);
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

            
            
        }


        return [
            'count_monos' => $count_monos,
            'count_followings' => $count_followings,
            'count_followers' => $count_followers,
            'count_favoritings' => $count_favoritings,
            'count_wantings' => $count_wantings,
            'count_wanters' => $count_wanters,
            'count_postings' => $count_postings,
            

        ];
    }
    
    


}
