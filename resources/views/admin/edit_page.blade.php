<!DOCTYPE html>
<html>
  <head> 

<base href="/public">
@include('admin.css')
<style type="text/css">
	.post_title
	{
		font-size: 30px;
		font-weight: bold;
		text-align: center;
		padding: 30px;
		color: white;
	}
	.div_center
	{
		text-align: center;
		padding: 30px;
	}
	label
	{
		display: inline-block;
		width: 200px;
	}
</style>
  </head>
  <body>
 @include('admin.header')
 
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
  @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
		<div class="page-content">
		
		@if(session()->has('message'))
		<div class="alert alert-success">	
	
			<button type="button" class="close" data-dismiss="alert"
			aria-hidden="true">x</button>
			{{session()->get('message')}}
		
		</div>
		@endif
		
		<h1 class="post_title">Update Post<h1>
		<form action="{{url('update_post',$post->id)}}" method="post"
		enctype="multipart/form-data">
				@csrf
				
			<div class="div_center">
				<label>Post Title</label>
				<input type="text" name="title" value="{{$post->title}}">				
			</div>

			<div class="div_center">
				<label>Description</label>
				<textarea name="description">{{$post->description}}</textarea>						
			</div>
			
			<div class="div_center">
				<label>Old Image</label>
				<img style="margin:auto;" height="100px" width="150px" src="/postimage/{{$post->image}}">
			</div>

			<div class="div_center">
				<label>Upload Old Image</label>
				<input type="file" name="image">			
			</div>	

			<div class="div_center">
				<input type="submit" value="update" class="btn btn-outline-danger">			
			</div>			
		
		
		</form>
		</div>

	 @include('admin.footer')  
      
	  
<script type="text/javascript">
	function confirmation(ev)
	{
		ev.preventDefault();
		var urlToRedirect = ev.currentTarget.getAttribute('href');
		console.log(urlToRedirect);
		swal({
			title:"Are you Sure to delete this?",
			text :"You won't be able to revert this delete",
			icon:"warning",
			buttons: true,
			dangerMode: true,
			
		})
		.then((willCancel)=>
		{
			if(willCancel)
			{
				window.location.href = urlToRedirect;
			}
			
		});
	}
</script>
  </body>
</html>