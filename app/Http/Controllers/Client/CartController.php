<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Book;
use Cart;

class CartController extends Controller
{
    public function addtocart(Request $request, $id){
        $book = Book::where('id', $id)->first();
        $cartCount = 0;

        if($request->qty <= $book->inventory_number){
            $user = Auth::user();

            $price = $book->price * (1 - $book->sale/100);

            Cart::restore($user->id);

            Cart::add([
                'id'=>$book->id, 
                'name'=>$book->title, 
                'qty'=>$request->qty, 
                'price'=>$price, 
                'weight'=>1,
                'options'=>[
                    'oldprice'=>$book->price,
                    'sale'=>$book->sale,
                    'img'=>$book->Picture[0]->link,
                    'author'=>$book->Author[0]->name
                ]]);

            Cart::store($user->id);

            $cartCount = Cart::count();

            $book->inventory_number -= $request->qty;
            $book->save();  
        }
        return response()->json($cartCount);
    }

    public function getCart(){
    	return view('client\cartdetail');
    }

    public function update(Request $request){
        $user = Auth::user();
        Cart::restore($user->id);
        $newQty = 0;

        $book = Book::where('id', $request->book_id)->first();
        $updateBook = Cart::content()->where('id', $request->book_id)->first();
        
        if($request->qty - $updateBook->qty <= $book->inventory_number){
            $book->inventory_number -= $request->qty - $updateBook->qty;
            $book->save();

            Cart::update($request->id, $request->qty);

            $newQty = $request->qty;
        }
        $cartCount = Cart::count();
        $cartTotal = Cart::total();

        Cart::store($user->id);

        $data = ['newQty'=>$newQty, 'cartCount'=>$cartCount, 'cartTotal'=>$cartTotal];

        return response()->json($data);
    }

    public function delete(Request $request){
        $user = Auth::user();
        Cart::restore($user->id);

        $book = Book::where('id', $request->book_id)->first();
        $updateBook = Cart::content()->where('id', $request->book_id)->first();
        $book->inventory_number += $updateBook->qty;
        $book->save();
        
        Cart::remove($request->id);

        $cartCount = Cart::count();
        $cartTotal = Cart::total();

        Cart::store($user->id);

        $data = ['cartCount'=>$cartCount, 'cartTotal'=>$cartTotal];

        return response()->json($data);
    }
}
