<!DOCTYPE html>
<html lang="en">
   <head>
@include('home.homecss')

	<style type="text/css">
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
@include('home.header')
      <!--header section end -->
      <!-- services section start -->

     <div class="services_section layout_padding">

         <div class="container">
            <div class="row">
               <div class="col-sm-12">
               <!-- 使用白色文字和陰影來增加可讀性 -->
                <h1 class="services_taital" style="color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">Blog Posts</h1>
                <p class="services_text" style="color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">Typesetting industry lorem Ipsum is simply dummy text of the</p>
               </div>
            </div>
            <div class="services_section_2">
               <div class="row">
	   
				@foreach($post as $postt)
			   
                  <div class="col-lg-4 col-sm-12 col-md-4">
                     <div class="box_main active">

                           <img style="width: 350px; height: 230px; object-fit: cover;" src="/postimage/{{$postt->image}}" class="image_1">
         
                 
                       
                        <h4 class="tation_text">{{$postt->title}}</h4>
						<p  class="tation_text">Updated : {{$postt->updated_at}}</p>
						<p>Post by <b>{{$postt->name}}</b> </p>
						
                        <div class="readmore_bt"><a href="{{url('post_details',$postt->id)}}">Read More</a></div>
                     </div>					 
                  </div>
				  
				@endforeach
              </div>
		   
            </div>
         </div>
 
      </div>
	  <!-- 分頁按鈕 -->
<!-- 分页按钮 -->
<div class="pagination">
    {{ $post->links('pagination::bootstrap-5') }}
</div>	
      <!-- services section end -->
      <!-- footer section start -->
@include('home.footer')  
      <!-- footer section end -->
  
   </body>
</html>