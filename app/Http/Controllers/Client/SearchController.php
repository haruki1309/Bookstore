<?php

namespace App\Http\Controllers\Client;

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
use App\Advertiserment;

class SearchController extends Controller
{
    public function postSearch(Request $request){
    	$key = $request->searchField;

    	$viewName = 'Kết quả tìm kiếm: '.$key;

    	if($key == ''){
    		//reload current page
    		return redirect()->back();
    	}

    	$book = Book::where('title', 'like', "%$key%")->get();
        $authors = Author::where('name', 'like', "%$key%")->get();
        $publishers = Publisher::where('name', 'like', "%$key%")->get();
        $publishingComs = PublishingCompany::where('name', 'like', "%$key%")->get();

        // if(count($authors) > 0){
        //     foreach ($authors as $author) {
        //         $book = array_merge($book->toArray(), $author->Book->toArray());
        //     }
        // }

        // if(count($publishers) > 0){
        //     foreach ($publishers as $publisher) {
        //         $book = array_merge($book->toArray(), $publisher->Book->toArray());
        //     }
        // }

        // if(count($publishingComs) > 0){
        //     foreach ($publishingComs as $publishingCom) {
        //         $book = array_merge($book->toArray(), $publishingCom->Book->toArray());
        //     }
        // }

        return view('client\result', compact('viewName', 'book'));
    }

    public function getSearch(){
    	return redirect('/homepage');
    }

    public function getCategory($category, $id){

    	switch ($category) {
    		case 'author':
    			$author = Author::where('id', $id)->first();
    			$book = $author->Book;
    			$viewName = 'Tác giả: '.$author->name;
    			break;

    		case 'translator':
    			$translator = Translator::where('id', $id)->first();
    			$book = $translator->Book;
    			$viewName = 'Dịch giả: '.$translator->name;
    			break;

    		case 'publisher':
    			$publisher = Publisher::where('id', $id)->first();
    			$book = $publisher->Book;
    			$viewName = 'Nhà phát hành: '.$publisher->name;
    			break;

    		case 'publishingcom':
    			$publishingcom = PublishingCompany::where('id', $id)->first();
    			$book = $publishingcom->Book;
    			$viewName = 'Nhà xuất bản: '.$publishingcom->name;
    			break;

    		case 'language':
    			$language = Language::where('id', $id)->first();
    			$book = $language->Book;
    			$viewName = 'Ngôn ngữ: '.$language->name;
    			break;

    		case 'age':
    			$age = Age::where('id', $id)->first();
    			$book = $age->Book;
    			$viewName = 'Độ tuổi '.$age->name;
    			break;

    		case 'topic':
    			$topic = Topic::where('id', $id)->first();
    			$book = $topic->Book;
    			$viewName = 'Chủ đề: '.$topic->name;
    			break;

    		case 'category':
    			$category = Category::where('id', $id)->first();
    			$book = $category->Book;
    			$viewName = 'Thể loại: '.$category->name;
    			break;

            case 'advertiserment':
                $adv = Advertiserment::where('id', $id)->first();
                $book = $adv->Book;
                $viewName = $adv->title;
                break;

    		default:
    			# code...
    			break;
    	}

    	return view('client\result', compact('viewName', 'book'));
    }

    public function getSaleOff(){
        $book = Book::where('sale', '>', '0')->orderBy('sale', 'DESC')->get();
        $viewName = 'Sách đang khuyến mãi';

        return view('client\result', compact('viewName', 'book'));
    }
}
