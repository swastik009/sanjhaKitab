<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\UserBook;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Purchase;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $books;

    public function __construct()
    {
        $this->books = new Book;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $books = $this->books->where('books.featured_book','=',1)->paginate(4);

        foreach($books as $book){
            $book->purchased_status = $this->CheckIfPurchased(Auth::user()->id,$book->id);
        }

        $userBooks = DB::table('user_books')
            ->join('books','user_books.book_id','=','books.id')
            ->where('user_id','=',Auth::user()->id)
            ->get();
        return view('public\dashboard',compact('books'))->with('userBooks',$userBooks);
    }


    public function CheckIfPurchased($user_id,$book_id){
            if(Purchase::where('user_id','=',$user_id)->where('book_id','=',$book_id)->exists()) {
                return true;
            }
            return false;


    }

}
