<?php
 
namespace App\Http\Controllers;
 
use App\User;
use Illuminate\Support\Facades\Auth;
 
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $user = Auth::user();
 
        // ログイン者以外のユーザを取得する
        $users = User::where('id' ,'<>' , $user->id)->get();
        // チャットユーザ選択画面を表示
        return view('chat_user_select' , compact('users'));
    }
}