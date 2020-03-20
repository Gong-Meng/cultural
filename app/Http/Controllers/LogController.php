<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log as LogModel;

class LogController extends Controller
{
   
	public function __construct(){

        $this->middleware("auth");

    }

    public function index(){


    	$logs = LogModel::get();


    	return view("log.index",compact('logs'));
    }

}
