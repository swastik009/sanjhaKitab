<?php

namespace App\Http\Controllers\PublicControllers;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\UserBook;
use App\Purchase;
//use Illuminate\Validation\Rules\In;

class PurchaseController extends Controller
{


    public function index()
    {
        $userBooks = DB::table('user_books')
            ->join('books','user_books.book_id','=','books.id')
            ->where('user_id','=',Auth::user()->id)
            ->get();


        $purchases = DB::table('purchases')
            ->join('books', 'purchases.book_id', '=', 'books.id')
            ->where('user_id', '=', Auth::user()->id)
            ->orderBy('books.id', 'DESC')
            ->paginate(3);
        return view('public/book/purchases', compact('purchases'))->with('userBooks',$userBooks);
    }


    public function Checkout()
    {
        $userBooks = DB::table('user_books')
            ->join('books', 'user_books.book_id', '=', 'books.id')
            ->where('user_id', '=', Auth::user()->id)
            ->get();
        return view('public/book/checkout', compact('userBooks'));
    }


    public function ConfirmCheckOut()
    {
        $userBooks = DB::table('user_books')
            ->join('books', 'user_books.book_id', '=', 'books.id')
            ->where('user_id', '=', Auth::user()->id)
            ->get(); //get required data from the cart table


        $this->InsertIntoPurchase($userBooks); //copies cart table to purchase table
        $this->DropByOneQty($userBooks); // book quantity gets dropped
        UserBook::destroy(Auth::user()->id); //cart table gets deleted
        return redirect()->route('purchases')->with('success','Congrats! book has been purchased. Admin will contact you soon about your order'); //redirects to purchases page
    }


    public function DropByOneQty($userBooks){
        foreach($userBooks as $userBook) {
            DB::table('books')
                ->where('id',$userBook->book_id)
                ->update(['quantity' => $userBook->quantity - 1]);
        }
    }


    public function InsertIntoPurchase($userBooks)
    {
        try {
            foreach ($userBooks as $userBook) {
                Purchase::create([
                    'user_id' => $userBook->user_id,
                    'book_id' => $userBook->book_id,
                    'delivery_status' => 0
                ]);

            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
