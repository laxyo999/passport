<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use Validator;

class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    { 

        $users = users::all();

     return view('user/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
      $this->validate($request, [
      'user_name'=> 'required|Alpha'
     
      ]);
      
      $user = new users([
      'name' => $request->user_name
      ]);

      $user->save();
      
      return redirect('/user')->with('success','Insert successfully');
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
       //  echo $id;
       //  die();
       // $users = users::where('user_id', $id)->get();


       // return view('user.index',compact('users',$users));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
          $validatedData = $this->validate($request, [
          'name'=> 'required'
          ]);
           $user = users::where('user_id',$id)->update($validatedData);
           
           
           
          return redirect('/user')->with('success','data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

         $user = users::where('user_id',$id);
         
         $user->delete();

        return redirect('/user')->with('success', 'data successfully deleted');
    }
}
