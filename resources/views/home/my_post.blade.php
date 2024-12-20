<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
@include('home.homecss')

	<style type="text/css">
	.post_deg
	{
		padding: 30px;
		text-align: center;


		
		background-image: url('images/paper-background.avif');
		background-size: cover; 
		background-position: center; 
		background-attachment: fixed; 
	}
	.title_deg
	{
		font-size: 30px;
		font-weight: bold;
		padding: 15px;
		color: black;
	}
	.des_deg
	{
		font-size: 18px;
		font-weight: bold;
		padding: 15px;
		color: black;
	}
	.img_deg
	{
		height: 400px;
		width: 500px;
		padding: 30px;
		margin: auto;
		object-fit: contain;
	}

	.alert 		
	{
			font-size: 20px;
			position: relative;
			z-index: 1;			
	}



	
	</style>




   </head>
   <body>
      <!--header section start -->
		<div class="header_section">
@include('home.header')
      <!--header section end -->
	  
<hr style="border: 2px solid #ccc;">
<div>>	
		@if(session()->has('message'))
		<div class="alert alert-success">	
	
			<button type="button" class="close" data-dismiss="alert"
			aria-hidden="true">x</button>
			{{session()->get('message')}}
		
		</div>
		@endif

</div>	
			
			@foreach($data as $data)
	   <!--<div class="banner_section layout_padding">	-->	
			<div class="post_deg">
				<img class="img_deg" src="/postimage/{{$data->image}}">
				<h4 class="title_deg">{{$data->title}}</h4><small>{{$data->updated_at}}</small>
				<p class="des_deg">{{$data->description}}</p>
				
				<a onclick="return confirm('Are you sure you want to delete this?');" href="{{url('my_post_del',$data->id)}}" class="btn btn-danger">Delete</a>
				
				<a href="{{url('post_update_page',$data->id)}}" class="btn btn-primary">Update</a>

			</div>
			
				
<hr style="border-top: 1px solid "> <!-- 分隔線 -->	
			@endforeach


	
      <!-- footer section start -->
 @include('home.footer')   
   </body>
</html>

