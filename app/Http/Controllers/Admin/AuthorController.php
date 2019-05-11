<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Book;
use App\Author;
use App\Translator;
use App\PublishingCompany;
use App\Publisher;
use App\Language;
use App\Age;
use App\Topic;
use App\Category;
use App\Picture;


class AuthorController extends Controller
{
    public function getIndex(){
    	$allAuthor = Author::all();
    	return view('admin\book\book_author_list');
    }
}
