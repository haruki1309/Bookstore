<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Auth;
use App\Book;
use App\Author;
use App\Translator;
use App\PublishingCompany;
use App\Publisher;
use App\Language;
use App\Age;
use App\Topic;
use App\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {	
     	//--------------------category-----------------------
     	$data = array(
	    	'menuAuthor' => Author::inRandomOrder()->take(10)->get(),
	    	'menuTranslator' => Translator::inRandomOrder()->take(10)->get(),
	    	'menuPublisher' => Publisher::inRandomOrder()->take(10)->get(),
	    	'menuPublishingCom' => PublishingCompany::inRandomOrder()->take(10)->get(),
	    	'menuLanguage' => Language::inRandomOrder()->take(10)->get(),
	    	'menuAge' => Age::inRandomOrder()->take(10)->get(),
	    	'menuTopic' => Topic::inRandomOrder()->take(10)->get(),
	    	'menuCategory' => Category::inRandomOrder()->take(10)->get()
    	);
    	//----------------------------------------------------- 

    	view()->share($data);
    }
}
