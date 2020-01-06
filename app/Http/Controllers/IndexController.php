<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{


	public function __construct(){

		$this->middleware('auth');

	}


	//后台首页
    public function index(){


    	return view("index.index");
    }
}
