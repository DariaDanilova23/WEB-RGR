<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\MasterClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __constructor(){
    }
    public function index(){
        return view('home');
    }
    public function about(){
        return view('about');
    }
    public function master(){
        $schedule = MasterClass::all();
        return view('master',['masters'=>$schedule]);
    }
    public function news(){
        $newspage = Blog::paginate(5);
        return view('news',['news'=>$newspage]);
    }
}
