<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /*public function index()
	{
		if(Auth::id())
		{
			$usertype = Auth()->user()->usertype;
			if($usertype=='user')
			{
				return view('home.homepage');
			}
			else if($usertype=='admin')
			{
				return view('admin.index');
			}
			else 
			{
				return redirect()->back();
			}			
		}
	}*/
	
	public function post_page()
	{
		return view('admin.post_page');
	}
	
	public function add_post(Request $request)
	{
		$user = Auth()->user();
		$userid = $user->id;
		$name = $user->name;
		$usertype = $user->usertype;
				
		$post = new Post;
		$post->title = $request->title;
		$post->description = $request->description;	
		
		$post->user_id = $userid;
		$post->name = $name;
		$post->usertype = $usertype;

		$post->post_status = 'active';
		$image = $request->image;
		
		if($image)
		{
			$imagename = time().'.'.$image->getClientOriginalExtension();
			$request->image->move('postimage',$imagename);
			$post->image = $imagename;			
		}

		$post->save();
		return redirect()->back()->with('message','Post Added Successfully');
	}
	
	public function show_post()
	{
		$post = Post::paginate(10);
		return view('admin.show_post',compact('post'));
	}
	
	public function delete_post($id)
	{
		$post = Post::find($id);
		$comments = Comment::where('post_id', $id)->get();
		foreach ($comments as $comment) {
			$comment->delete();
		}
		$post->delete();

		return redirect()->back()->with('message', 'Post Deleted Successfully');
	}	
	
	public function edit_post($id)
	{
		$post = Post::find($id);
		return view('admin.edit_page',compact('post'));
	}	

	public function update_post(Request $request,$id)
	{
		$data = Post::find($id);
		$data->title = $request->title;
		$data->description = $request->description;
		$image = $request->image;
		
		if($image)
		{
			$imagename = time().'.'.$image->getClientOriginalExtension();
			$request->image->move('postimage',$imagename);
			$data->image = $imagename;			
		}
		
		$data->save( );
		return redirect()->back()->with('message','Post Updated
			Successfully');
	}

	public function accept_post($id)
	{
		$data = Post::find($id);
		$data->post_status='active';
		$data->save();
		return redirect()->back()->with('message','Post Status Changed to Active');
	}

	public function reject_post($id)
	{
		$data = Post::find($id);
		$data->post_status='rejected';
		$data->save();
		return redirect()->back()->with('message','Post Status Changed to Rejected');
	}	
}
