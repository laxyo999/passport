<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\comments;

class commentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = comments::all();
        $comment = posts::all();

     return view('comment/index', ['comments'=>$comments, 'comment'=>$comment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
       'posts_id'=> 'required',  
      'body'=> 'required'
     
      ]);
      
      $post = new comments([
      'users_id' => $request->get('users_id'),  
      'posts_id' => $request->get('posts_id'),
      'body' => $request->get('body')
      ]);

      $post->save();
      return redirect('/comment')->with('success','data inserted');
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
         $comment = comments::where('comment_id', $id)->get();
         return view('comment.edit',compact('comment',$comment));
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
       'posts_id'=> 'required',  
       'body'=> 'required'
     
      ]);
           $user = comments::where('comment_id',$id)->update($validatedData);
          return redirect('/comment')->with('success','data updated');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = comments::where('comment_id',$id);
         
         $user->delete();

        return redirect('/comment')->with('success', 'data successfully deleted');
    }
}
