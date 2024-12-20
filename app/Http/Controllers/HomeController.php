<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Alert;

class HomeController extends Controller
{

	
	public function index()
	{
		if(Auth::id())
		{
	
			$post = Post::where('post_status','active')->paginate(6);
			$usertype = Auth()->user()->usertype;
			if($usertype=='user')
			{
				return view('home.homepage',compact('post'));
			}
			else if($usertype=='admin')
			{
				return view('admin.adminhome');
			}
			else 
			{
				return redirect()->back();
			}			
		}
	}
	
    public function homepage()
	{
		$post = Post::where('post_status','active')->paginate(6);
		
		return view('home.homepage',compact('post'));
	}

	public function post_details($id)
	{
		$post = Post::find($id);
		$comments = Comment::where('post_id', $id)->paginate(5);
		return view('home.post_details',compact('post','comments'));	
	}	
	
	public function create_post()
	{
		return view('home.create_post');
	}

	public function user_post(Request $request)
	{
		$user = Auth()->user();
		$userid = $user->id;
		$username = $user->name;
		$usertype = $user->usertype;
				
		$post = new Post;
		$post->title = $request->title;
		$post->description = $request->description;	
		
		$post->user_id = $userid;
		$post->name = $username;
		$post->usertype = $usertype;
		$post->post_status = 'pending';
		
		$image = $request->image;
		
		if($image)
		{
			$imagename = time().'.'.$image->getClientOriginalExtension();
			$request->image->move('postimage',$imagename);
			$post->image = $imagename;			
		}

		$post->save();
		
		Alert::success('Congrats','You have Added the data Successfully');	//info,success
		return redirect()->back();
	}

	public function my_post()
	{
		$user=Auth::user();
		$userid=$user->id;
		$data = Post::where('user_id','=',$userid)->get();
		
		return view('home.my_post',compact('data'));
	}	
	
	public function my_post_del($id)
	{
		$data = Post::find($id);
		$comments = Comment::where('post_id', $id)->get();
		foreach ($comments as $comment) {
			$comment->delete();
		}
		$data->delete();
		return redirect()->back()->with('message','Post Deleted Successfully');
	}
	
	public function post_update_page($id)
	{
		$data = Post::find($id);
		return view('home.post_page',compact('data'));
	}

	public function update_post_data(Request $request,$id)
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


	public function about_t()
	{
		return view('home.about_t');
	}
	public function services_t()
	{
		$post = Post::where('post_status','active')->paginate(6);
		return view('home.services_t',compact('post'));

	}
	
	public function add_commit(Request $request, $post_id, $user_id)
	{
		$comment = new Comment();
		$comment->post_id = $post_id;
		$comment->user_id = $user_id;
		$comment->name = Auth::user()->name;
		$comment->content = $request->content;

		$comment->save();

		return redirect()->back()->with('message', 'Comment added successfully.');
	}
	

	
}

