<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->user = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->paginate(3);
        return view('admin/user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/User/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        \request()->validate([
            'name' => 'required',
            'email' =>'required | email',
            'image' =>'nullable'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::findOrFail($id);

        return view('admin/User/edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        request()->validate([

            'name' => 'required',
            'email' => 'required | email',
            'password'=>'requred',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $user = $this->user->findOrFail($id);
        if(!\request()->image == null){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            \request()->image->move(public_path('img'), $imageName);
            $user->image=$imageName;
        }

        $user->name = \request()->name;
        $user->email = \request()->email;
        $user->password = Hash::make(\request()->password);

        $user->save();

        return redirect()->route('users')->with('success','Successfully updated users profile');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->where('id', '=', $id)->delete();
        return json_encode('success');

    }
}
