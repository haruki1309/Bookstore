<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
use App\Picture;
use App\Order;

class HomepageController extends Controller
{
    public function getIndex(){
    	$saleOffBook = Book::where('sale', '>', 0)->inRandomOrder()->take(3)->get();

    	$newBook = Book::orderBy('publishing_year', 'DESC')->take(16)->inRandomOrder()->get();

    	$bestSellerBooks = Book::where('inventory_number', '>', '0')
    			->join('book_order', 'book.id', '=','book_order.book_id')
    			->select('book.id', 'book.title','book.price', 'book.sale',
    					DB::raw('count(book_order.book_id) as sales_count'))
    			->groupBy('book_order.book_id', 'book.id', 'book.title','book.price', 'book.sale')
    			->orderBy('sales_count', 'desc')
    			->take(4)
    			->get();

    	$recommendBook = array();

    	if(Auth::check() && count(Order::where('user_id', Auth::user()->id)->get()) > 0){
    		//$purcharsedID: table(id, count(id))->orderBy(desc): lay ra record chua id xuat hien nhieu nhat trong hoa don, id o day co the la id cua Author, Topic, Category

    		$purcharsedAuthorID = DB::table('book')
    						->join('book_order', 'book.id', '=','book_order.book_id')
    						->join('order', 'order.id', '=', 'book_order.order_id')
    						->where('user_id', Auth::user()->id)
    						->select('book.id')
							->groupBy('book.id')
    						->join('author_book', 'book.id', '=', 'author_book.book_id')
    						->select('author_book.author_id', DB::raw('count(author_book.author_id) as book_count'))
    						->groupBy('author_book.author_id')
    						->orderBy('book_count', 'desc')
    						->first();
    		
    		$recommendAuthor = Author::with('Book')->where('id', $purcharsedAuthorID->author_id)->first();
    		
    		$purcharsedTopicID = DB::table('book')
    						->join('book_order', 'book.id', '=','book_order.book_id')
    						->join('order', 'order.id', '=', 'book_order.order_id')
    						->where('user_id', Auth::user()->id)
    						->select('book.id')
							->groupBy('book.id')
							->join('book_topic', 'book.id', '=', 'book_topic.book_id')
    						->select('book_topic.topic_id', DB::raw('count(book_topic.topic_id) as book_count'))
    						->groupBy('book_topic.topic_id')
    						->orderBy('book_count', 'desc')
    						->first();
    		$recommendTopic = Topic::with('Book')->where('id', $purcharsedTopicID->topic_id)->first();

    		$purcharsedCategoryID = DB::table('book')
    						->join('book_order', 'book.id', '=','book_order.book_id')
    						->join('order', 'order.id', '=', 'book_order.order_id')
    						->where('user_id', Auth::user()->id)
    						->select('book.id')
							->groupBy('book.id')
							->join('book_category', 'book.id', '=', 'book_category.book_id')
    						->select('book_category.category_id', DB::raw('count(book_category.category_id) as book_count'))
    						->groupBy('book_category.category_id')
    						->orderBy('book_count', 'desc')
    						->first();
    		$recommendCategory = Category::with('Book')->where('id', $purcharsedCategoryID->category_id)->first();

    		$recommendBook = array();
    		//merge 3 mang thanh 1 mang $recommendBook, luc nay mang bi trung lap nhieu
    		foreach($recommendAuthor->Book as $book){
    			array_push($recommendBook, $book);
    		}
    		foreach($recommendTopic->Book as $book){
    			array_push($recommendBook, $book);
    		}
    		foreach($recommendCategory->Book as $book){
    			array_push($recommendBook, $book);
    		}
    		//loc cac phan tu duplicate cua mang
    		$deleteArr = array();
    		for($i = 0; $i < count($recommendBook); $i++){
    			for($j = $i + 1; $j < count($recommendBook); $j++){
    				if($recommendBook[$i]->id == $recommendBook[$j]->id){
    					array_push($deleteArr, $j);
    				}
    			}
    		}
    		$deleteArr = array_unique($deleteArr);
    		
    		foreach($deleteArr as $id){
    			unset($recommendBook[$id]);
    		}	
    	}

      	return view('client\home', compact('saleOffBook', 'newBook', 'bestSellerBooks', 'recommendBook'));
    }
}
