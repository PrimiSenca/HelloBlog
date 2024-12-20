<!DOCTYPE html>
<html>
  <head> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@include('admin.css')
<style type="text/css">
	.title_deg
	{
		font-size: 30px;
		font-weight: bold;
		text-align: center;
		padding: 30px;
		color: white;
	}
	.table_deg
	{
		border: 1px solid white;
		width: 80%;
		text-align: center;
		margin-left: 70px;

	}
	.th_deg
	{
		background-color: skyblue;
	}
	.img_deg
	{
		height: 120px;
		width: 200px;
		padding: 1px;
	}


.pagination {
    position: fixed;        /* 固定位置 */
    bottom: 20px;           /* 离页面底部 20px */
    left: 20px;             /* 离页面左边 20px */
    z-index: 1000;          /* 确保分页按钮浮在其他内容之上 */
    display: flex;          /* 使用 flex 布局 */
    justify-content: flex-start; /* 保持分页按钮对齐到左边 */
}

.pagination a {
    margin: 0 5px;          /* 分页按钮之间的间距 */
    padding: 10px 15px;     /* 分页按钮的内边距 */
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    color: #007bff;
    text-decoration: none;
    border-radius: 4px;
}

.pagination a:hover {
    background-color: #007bff;
    color: white;
}

.pagination .active a {
    background-color: #007bff;
    color: white;
}

.pagination .disabled a {
    color: #ccc;
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
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss=
			"alert" aria-hidden="true">x</button>
			{{session()->get('message')}}
		</div>
		@endif
		
			<h1 class="title_deg">All Post<h1>
			<table class="table_deg">
				<tr class="th_deg">
					<th>Post title</th>
					<th  class="description">Description</th>
					<th>Post by</th>
					<th>Post status</th>	
					<th>User type</th>
					<th>Image</th>	
					<th>Delete</th>	
					<th>Edit</th>
					<th>Status Accept</th>
					<th>Status Reject</th>
				</tr>
		@foreach($post as $postt)
				<tr>
					<td>{{$postt->title}}</td>
					<td  class="description">{{$postt->description}}</td>
					<td>{{$postt->name}}</td>
					<td>
						@if($postt->post_status == 'active')
							<span style="color: LawnGreen;">Active</span>
						@endif
						
						@if($postt->post_status == 'rejected')
							<span style="color: red;">Rejected</span>
						@endif
						
						@if($postt->post_status == 'pending')
							<span style="color: yellow;">Pending</span>
						@endif
					
					</td>	
					<td>{{$postt->usertype}}</td>
					<td>
						<img class="img_deg" src="postimage/{{$postt->image}}">
					</td>
					
					<td>
						<a href="{{url('delete_post',$postt->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
					</td>
						<td>
						<a href="{{url('edit_post',$postt->id)}}" class="btn btn-success">Edit</a>
					</td>	
					
					</td>
						<td>
						<a onclick="return confirm('are you sure to accept this post?')" href="{{url('accept_post',$postt->id)}}" class="btn btn-info">Accept</a>
					</td>
					</td>
						<td>
						<a onclick="return confirm('are you sure to reject this post?')" href="{{url('reject_post',$postt->id)}}" class="btn btn-warning">Reject</a>
					</td>					
				</tr>				
		@endforeach		
				
				
				
			</table>
		</div>
<div class="pagination">
    {{ $post->links('pagination::bootstrap-5') }}
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