<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NPHController extends Controller
{
    public function getIndex(){
    	return view('admin\book\book_nph_list');
    }
}
