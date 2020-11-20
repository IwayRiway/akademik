<?php
// namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Access;
use Closure;

function is_login(Closure $next)
{
   if(Session::get('user_id')){
      $url = Request::segment(1) +  + Request::segment(3)==true?1:0;

      if(Request::segment(2)==true){
         $url2 = Request::segment(2)=="create"?"/".Request::segment(2):'';
      }

      if(Request::segment(3)==true){
         if(Request::segment(2)=="edit"){
            $url2 = "/id";
            $url3 = "/edit";
         } else {
            $url2="/destroy";
            $url3 ="/id";
         }
      }

      $url = $url+$url2+$url3;
      $access = Access::with(['menu' => function($query) use($url){
                              $query->where('url', $url);
                        }])
                        ->where('role_access_id', Session::get('role_access_id'))
                        ->first();
      
      if($access->menu->nama == $url){
         return $next(url($url));
      } else {
         return redirect()->back()->with('gagal', 'Akses Ditolak');
      }

   } else {
      return redirect()->route('auth.index')->with('info', 'Session Anda Sudah Berakhir. Silahkan Login Kembali');
   }
}