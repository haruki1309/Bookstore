<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgeController extends Controller
{
    public function getIndex(){
    	return view('admin\book\book_age_list');
    }
}
