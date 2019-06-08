<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Book;
use App\User;
use Cart;

class LoginController extends Controller
{
    public function postLogin(Request $request){
    	if(Auth::attempt( ['email'=>$request->email, 'password'=>$request->password])){
    		$user = Auth::user();

    		Cart::restore($user->id);

            if($request->bookID > -1){
                $book = Book::where('id', $request->bookID)->first();
                $price = $book->price * (1 - $book->sale/100);

                Cart::add([
                    'id'=>$book->id, 
                    'name'=>$book->title, 
                    'qty'=>$request->bookQty, 
                    'price'=>$price, 
                    'weight'=>1,
                    'options'=>[
                        'oldprice'=>$book->price,
                        'sale'=>$book->sale,
                        'img'=>$book->Picture[0]->link,
                        'authors'=>$book->Author
                    ]]);
            }

    		return redirect()->back()->with('user', $user);
    	}
    	else{
    		return redirect()->back();
    	}
    }
    public function logout(){
        $user = Auth::user();

        //Cart::store($user->id);

        Auth::logout();

        foreach(Cart::content() as $item){
            Cart::remove($item->rowId);
        }

        return redirect()->back();
    }
}
