<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
@include('home.homecss')

<style type="text/css">
	.div_deg
	{		
		text-align: center;
	}
	.title_deg
	{
		font-size: 30px;
		font-weight: bold;
		color: black;
		padding: 30px;
	}
	label
	{
		display: inline-block;
		width: 200px;
		color: white;
		font-size: 20px;
		font-weight: bold;
		text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
	}
	.field_deg
	{
		padding: 25px;
	}
</style>

   </head>
   <body>
		@include('sweetalert::alert')
   
      <!--header section start -->
      <div class="header_section">
@include('home.header')

   <div class="banner_section layout_padding">	 
	<div class="div_deg">
	<h1 class="title_deg">Add Post<h1>
	
		<form action="{{url('user_post')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="field_deg">
				<label>Title</label>
				<input type="text" name="title">				
			</div>

			<div class="field_deg">
				<label>Description</label>
				<textarea name="description"></textarea>						
			</div>

			<div class="field_deg">
				<label>Add Image</label>
				<input type="file" name="image">			
			</div>	

			<div class="field_deg">
				<input type="submit" value="Add Post" class="btn btn-outline-light">			
			</div>	
			
		</form>
	</div>	 
	 </div>
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
 @include('home.footer')   
   </body>
</html>