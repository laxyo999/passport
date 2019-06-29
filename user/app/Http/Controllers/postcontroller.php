<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\users;

class postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = posts::all();
        $books = users::all();

     return view('post/index', ['user'=>$books,'posts'=>$posts]);
      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    //    return view('post.create',compact('user',$users));
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
       'users_id'=> 'required',  
       'title'=> 'required',  
      'body'=> 'required'
     
      ]);
      
      $post = new posts([
      'users_id' => $request->get('users_id'),  
      'title' => $request->get('title'),
      'body' => $request->get('body')
      ]);

      $post->save();
      return redirect('/post')->with('success','data inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = posts::where('post_id', $id)->get();
         return view('post.edit',compact('post',$post));
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
       'users_id'=> 'required',  
       'title'=> 'required',  
      'body'=> 'required'
     
      ]);
           $user = posts::where('post_id',$id)->update($validatedData);
          return redirect('/post')->with('success','data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = posts::where('post_id',$id);
         
         $user->delete();

        return redirect('/post')->with('success', 'data successfully deleted');
    }
}
