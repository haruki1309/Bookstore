<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TranslatorController extends Controller
{
    public function getIndex(){
    	return view('admin\book\book_translator_list');
    }
}
