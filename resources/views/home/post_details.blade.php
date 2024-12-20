<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
<base href="/public">
@include('home.homecss')

<style type="text/css">


	.post_title
	{
		font-size: 20px;
		font-weight: bold;

		color: white;
	}
	.div_center
	{
		padding:5px
	}
	label
	{

		width: 250px;
		color:white;
	}
	
	
	.pagination 
	{
		position: fixed;        
		bottom: 20px;           
		left: 20px;            
		z-index: 1000;          
		display: flex;          
		justify-content: flex-start; 
	}

	.pagination a 
	{
		margin: 0 5px;        
		padding: 10px 15px;    
		background-color: #f8f9fa;
		border: 1px solid #ddd;
		color: #007bff;
		text-decoration: none;
		border-radius: 4px;
	}

	.pagination a:hover 
	{
		background-color: #007bff;
		color: white;
	}

	.pagination .active a 
	{
		background-color: #007bff;
		color: white;
	}

	.pagination .disabled a 
	{
		color: #ccc;
	}
</style>




   </head>
   <body>
      <!--header section start -->
		<div class="header_section">
@include('home.header')
      <!--header section end -->




<div class="banner_section layout_padding" style="background-color: rgba(0, 0, 0, 0.5);"> <!-- 設定半透明的黑色背景 -->
    <!-- 使用一個容器包裹圖片和文本 -->
    <div style="text-align: center;" class="col-md-12">
        <!-- 不設固定高度，讓區塊根據內容自適應高度 -->
        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding-bottom: 20px;"> <!-- 增加適當的底部間距 -->
            <!-- 圖片區域 -->
            <img style="padding: 20px; max-width: 800px; max-height: 500px; width: 100%; height: auto; margin: auto; object-fit: contain;" src="/postimage/{{$post->image}}">

            <!-- 文字區域，放在圖片下面 -->
            <h3 style="color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"><b>{{$post->title}}</b></h3> <!-- 白色文字並加上陰影 -->
            <h4 style="color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">{{$post->description}}</h4> <!-- 白色文字並加上陰影 -->
            <p style="color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Post by <b>{{$post->name}}</b>, updated {{$post->updated_at}}</p> <!-- 白色文字並加上陰影 -->
        </div>
    </div>
</div>

<hr style="border: 1px solid #ccc;">




<div class="page-content" style="padding: 20px; margin-left:300px;">	
<h3 class="post_title">Comment:<h3>
		@foreach ($comments as $comment)
		
			<div class="div_center">
				<label>{{ $comment->name }} at {{ $comment->created_at }} said：</label>					
			</div>

			<div class="" style="width: 700px; height:100px; background-color: 	#F0F0F0; color:black;">
				{{ $comment->content }}				
			</div>
		<div style="padding: 10px;"></div>

		@endforeach	
<!-- 分页按钮 -->
<div class="pagination">
    {{ $comments->links('pagination::bootstrap-5') }}
</div>			
</div>





<hr style="border: 1px solid #ccc;">

		@if(session()->has('message'))
		<div class="alert alert-success">	
	
			<button type="button" class="close" data-dismiss="alert"
			aria-hidden="true">x</button>
			{{session()->get('message')}}
		
		</div>
		@endif
		<div class="page-content" style="padding: 20px;">	
		@auth		
			<h3 class="post_title">Post's response<h3>
				<div>
					<form action="{{ url('add_commit', [$post->id, auth()->user()->id]) }}" method="post">
						@csrf
						<div class="div_center">
							<label>Name: {{ Auth::user()->name }}</label>
								
						</div>

						<div class="div_center" style="max-width: 700px;">
							<label>Response</label>
							<textarea name="content" rows="5" class="form-control"  placeholder="Add a comment..."></textarea>						
						</div>

						<div class="div_center">
							<input onclick="return confirm('Sure you want to comment??');"  type="submit" class="btn btn-primary" value="Post Comment"></button>
						</div>	
						
					</form>
		@else
		<p style="font-size: 15px; color: white;">If you want to post a response, please first 
			<a  style="color: yellow;font-size: 18px;" href="{{ route('login') }}">Login</a></p>
		@endauth
				</div>





		</div>







      <!-- footer section start -->
 @include('home.footer')   
   </body>
</html>