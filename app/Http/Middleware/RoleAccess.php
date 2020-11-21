<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class RoleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('user_id')){
            $url = $request->segment(1);
            $url2 = "";
            $url3 = "";

            if($request->segment(2)==true){
                $url2 = $request->segment(2)=="create"?"/".$request->segment(2):'';
            }

            if($request->segment(3)==true){
                if($request->segment(2)=="edit"){
                    $url2 = "/id";
                    $url3 = "/edit";
                } else {
                    $url2="/destroy";
                    $url3 ="/id";
                }
            }

            $url = $url.$url2.$url3;
            $role = Session::get('role_access_id');
            $access = DB::select("SELECT 1 FROM accesses a JOIN menus b ON a.menu_id = b.id WHERE a.role_access_id = $role AND b.url = '$url'");
            
            if(count($access)==0){
                return redirect()->back()->with('gagal', 'Akses Ditolak');
            } else {
                return $next($request);
            }

        } else {
            return redirect()->route('login.index')->with('info', 'Session Anda Sudah Berakhir. Silahkan Login Kembali');
        }

        return $next($request);
    }
}
