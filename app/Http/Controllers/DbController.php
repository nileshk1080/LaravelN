<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class DbController extends Controller{

    
   
    public function index(){
        
        $users = Users::all();
        return $users;
    }
}
