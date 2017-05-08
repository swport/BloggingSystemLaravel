<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Category;

use App\Tag;

use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
      $this->middleware('auth');
    }

    public function index()
    {
        //craete a variable and store all the blog posts in it from the database
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        //return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //steps   //validate data   //store in the DB    //redirect to another page
      //validate data

      $this -> validate($request, array(
        'title' => 'required|max:225',
        'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
        'category_id' => 'required|integer',
        'body' => 'required'
      ));
      //store in the DB - elequont
      $post = new Post;
      $post -> title = $request -> title;
      $post -> body = $request -> body;
      $post -> slug = $request -> slug;
      $post -> category_id = $request -> category_id;
      $post -> save();
      $post->tags()->sync($request->tags, false);
      Session::flash('success', 'Post Saved! Thank You.');
      //redirect
      return redirect()->route('posts.show', $post->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $post_id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post)->with;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //find the post in the database and save it as a variable
      $post = Post::find($id);
      $categories = Category::all();
      
      $cats = [];
      foreach ($categories as $category) {
        $cats[$category->id] = $category->name;
      }
      $tags = Tag::all();
      $tags2 = array();
      foreach($tags as $tag) {
        $tags2[$tag->id] = $tag->name;
      }
        //return the view and pass in var the information
      
      return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags);
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
        // Validate the data before we use it

        //save the data to the form
        $post = Post::find($id);


        $this->validate($request, array(
          'title' => 'required|max:255',
          'body' => 'required',
          'category_id' => 'required|integer',
          'slug' => 'required|alpha_dash|min:5|max:225|unique:posts,slug,'.$id
        ));


        $post -> title = $request -> input('title');
        $post -> slug = $request -> input('slug');
        $post -> category_id = $request -> input('category_id');
        $post -> body = $request -> input('body');
        $post->save();
        if(isset($request->tags)){
          $post->tags()->sync($request->tags, true);
        }
        else{
          $post->tags()->sync(array());
        }
        //flash data with success message

        Session::flash('success', 'Post updated successfully');
        //redirect with flash to view post.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
      $post = Post::find($id);

      $post->delete();

      Session::flash ('success', 'Post successfully deleted');

      return redirect()->route('posts.index');

    }
}
