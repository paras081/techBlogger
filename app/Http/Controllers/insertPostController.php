<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class insertPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('author.createPost');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewAllPost()
    {
        $postTableData = Post::all();

        return view('welcome',compact('postTableData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(Request $request)
    {
        $this->validate($request,[
            'userName' => 'required',
            'title' => 'required',
            'category' => 'required',
            'description' =>'required',
            'imgUrl' =>'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $imgName = time().'.'.$request->imgUrl->extension();

        $request->imgUrl->move(public_path('/images/postImages'),$imgName);

        $postTableData = new Post();

        $postTableData->user_id = $request->userName;
        $postTableData->title = $request->title;
        $postTableData->description = $request->description;
        $postTableData->image_url = $imgName;
        $postTableData->category = $request->category;
        $tempTags= implode(',',$request->input('tags'));
        $postTableData->tags = trim($tempTags,',');
//        $postTableData->tags = 'web';
        $postTableData->save();
       // dd($tempTags);
        return redirect(route('createPost'))->with('successMsg','Successfully Posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCategorySpecific($id)
    {
        $postTableData = Post::all()->where('category',$id);
//        dd($postTableData);
        return view('welcome',compact('postTableData'));
//        return view('welcome')->with('postTableData',$postTableData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUsernameSpecificPost($id)
    {
        $user = User::findOrFail($id);
        $postTableData = $user->users_post;
//        dd($postTableData);
        return view('welcome',compact('postTableData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTagSpecificPost($id)
    {
        $post= Post::find($id);
//        select `php` from `tags` where `tags`.`id` = name limit 1)
        $postTableData = $post->tags;
        dd($postTableData);
//        return view('welcome',compact('postTableData'));

//        $tag= Tag::;
//        $postTableData = $tag->post;
////        dd($postTAbleData);
//        return view('welcome',compact('postTableData'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
