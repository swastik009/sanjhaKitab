<?php

namespace App\Http\Controllers\PublicControllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Book;
use App\UserBook;
use App\Purchase;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Auth;

class PublicBookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $books = Book::paginate(4);
        foreach($books as $book){
            $book->purchased_status = $this->CheckIfPurchased(Auth::user()->id,$book->id);
        }

        $userBooks = DB::table('user_books')
            ->join('books','user_books.book_id','=','books.id')
            ->where('user_id','=',Auth::user()->id)
            ->get();

        return view('public\book\index',compact('books'))->with('userBooks',$userBooks);
    }



    public function destroy($id){
        DB::delete('DELETE FROM user_books where user_books_id = '.$id);
        return json_encode('success');


    }

    public function show(Book $book){

        ($this->CheckIfAddedToCart(Auth::user()->id,$book->id)) ? $book->ClickCartExists = true : $book->ClickCartExists = false;
        ($this->CheckIfPurchased(Auth::user()->id,$book->id)) ? $book->ClickPurchasedExists = true : $book->ClickPurchasedExists = false;


        $userBooks = DB::table('user_books')
            ->join('books','user_books.book_id','=','books.id')
            ->where('user_id','=',Auth::user()->id)
            ->get();

        return view('public/book/show',compact('book'))->with('userBooks',$userBooks);
    }






    public function AddToCart(Book $book){
        //dd($book->id);
        $this->CreateIfNot(Auth::user()->id,$book->id);
        //$this->DropByOneQty($book);
        //return back()->with('success','Added to cart');
        return json_encode('success');


    }




//Business Logic

    public function CreateIfNot($user_id,$book_id){
        if(!UserBook::where('user_id','=',$user_id)->where('book_id','=',$book_id)->exists()){
            UserBook::create([
               'user_id' => $user_id,
               'book_id'=> $book_id
            ]);
        }
        else
            return true;
    }



    public function CheckIfAddedToCart($user_id,$book_id){
        if(UserBook::where('user_id','=',$user_id)->where('book_id','=',$book_id)->exists()) {
                return true;
        }
        return false;

        }

    public function CheckIfPurchased($user_id,$book_id){
        if(Purchase::where('user_id','=',$user_id)->where('book_id','=',$book_id)->exists()) {
            return true;
        }
        return false;

    }
    }

