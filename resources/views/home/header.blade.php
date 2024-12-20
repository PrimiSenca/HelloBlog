      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="logo"><a href="{{url('/')}}"><img src="images/logo.png"></a></div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">				  					
                     <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                     </li>
					 @if (Route::currentRouteName() !== 'about_t')
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('about_t')}}">About Us</a>
                     </li>
					 @endif
					  @if (Route::currentRouteName() !== 'services_t')
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('services_t')}}">Blog</a>
                     </li>
					 @endif

						@if (Route::has('login'))
							@auth
								<li class="nav-item">
									<x-app-layout >
									</x-app-layout>
								</li>
							<li class="nav-item">
								<a class="nav-link" href="{{url('my_post')}}">My Post</a>
							 </li>	
							 
							<li class="nav-item">
								<a class="nav-link" href="{{url('create_post')}}">Create Post</a>
							 </li>				
                            @else

								<li class="nav-item">
									<a class="nav-link" href="{{ route('login') }}">Login</a>
								 </li>
								 
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">Register</a>
								 </li>

                            @endauth
                          
                        @endif
                  </ul>
               </div>
            </nav>
         </div>
      </div>