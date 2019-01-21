<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Penzu</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta name="google-site-verification" content="F2_83TqAMr6kRJDU-qfKLnqP91vbMPecpD_r3JtVKtk" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  -->

	<!-- <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->

	<link href="{{ asset('journal-css/common-css/bootstrap.css') }}" rel="stylesheet">

	<link href="{{ asset('journal-css/common-css/floating-button.css') }}" rel="stylesheet">

	<link href="{{ asset('journal-css/common-css/swiper.css') }}" rel="stylesheet">

	<link href="{{ asset('journal-css/common-css/ionicons.css') }}" rel="stylesheet">


	<link href="{{ asset('journal-css/front-page-category/css/styles.css') }}" rel="stylesheet">

	<link href="{{ asset('journal-css/front-page-category/css/responsive.css') }}" rel="stylesheet">

</head>
<body >

	<nav class="navbar navbar-expand-md navbar-light navbar-laravel ">
        <div class="container">
            <a class="navbar-brand" href="{{ route('journal.index') }}">
                {{ __('Penzu') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
					<li class="nav-item"><a class="nav-link" href="{{route('journal.index')}}">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="{{route('album.index')}}">Album</a></li>
					<li class="nav-item"><a class="nav-link" href="{{route('user.edit')}}">Profile</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <a class="dropdown-item" href="#">{{ __('Update') }}</a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

	<div class="main-slider">
		<div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
			data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
			data-swiper-breakpoints="true" data-swiper-loop="true" >
			<div class="swiper-wrapper">

				<div class="swiper-slide">
					<a class="slider-category" href="category-sidebar.html">
						<div class="blog-image"><img src="{{ asset('journal-css/images/category-1-400x250.jpg') }}" alt="Blog Image"></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>BEAUTY</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div><!-- swiper-slide -->

				<div class="swiper-slide">
					<a class="slider-category" href="#">
						<div class="blog-image"><img src="{{ asset('journal-css/images/category-2-400x250.jpg') }}" alt="Blog Image"></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>SPORT</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div><!-- swiper-slide -->

				<div class="swiper-slide">
					<a class="slider-category" href="#">
						<div class="blog-image"><img src="{{ asset('journal-css/images/category-3-400x250.jpg') }}" alt="Blog Image"></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>HEALTH</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div><!-- swiper-slide -->

				<div class="swiper-slide">
					<a class="slider-category" href="#">
						<div class="blog-image"><img src="{{ asset('journal-css/images/category-4-400x250.jpg') }}" alt="Blog Image"></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>DESIGN</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div><!-- swiper-slide -->

				<div class="swiper-slide">
					<a class="slider-category" href="#">
						<div class="blog-image"><img src="{{ asset('journal-css/images/category-5-400x250.jpg') }}" alt="Blog Image"></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>MUSIC</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div><!-- swiper-slide -->

				<div class="swiper-slide">
					<a class="slider-category" href="#">
						<div class="blog-image"><img src="{{ asset('journal-css/images/category-6-400x250.jpg') }}" alt="Blog Image"></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>MOVIE</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div><!-- swiper-slide -->
				
			</div><!-- swiper-wrapper -->

		</div><!-- swiper-container -->

	</div><!-- slider -->

	<section class="blog-area section">
		<div class="container">
			<div class="row">
		        <div class="col-sm-4 col-sm-offset-3">		            
	                <div class="form-inline md-form mr-auto mb-4">
	                	<form method="POST" action="{{ route('journal.search')}}">
	                	@csrf  
	                    	<input type="text" class="form-control" name="searchValue" id="searchValue" placeholder="Search" >
	                   		<button class="btn btn-success" title="Search" type="submit">
	                    		<i class="ion-search"></i>
	                    	</button>
	                    </form>
	                </div>		           
		        </div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
			  	<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
					  	<div class="modal-header">
							<h4 class="modal-title">Create Journal</h4>
					  	</div>
					  	<div class="modal-body">
							<form method="POST" enctype="multipart/form-data" action="{{ route('journal.store') }}">
                        	@csrf
		                        <div class="form-group row">
		                            <label for="title" class="col-sm-4 col-form-label text-md-right">TITLE</label>
		                            <div class="col-md-6">
		                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title')}}">
		                                @if ($errors->has('title'))
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('title') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="form-group row">
		                            <label for="description" class="col-sm-4 col-form-label text-md-right">Description</label>
		                            <div class="col-md-6">
		                                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{old('description')}}</textarea>
		                                @if ($errors->has('description'))
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('description') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>
		                        <div class="form-group row">
		                            <label for="gender" class="col-sm-4 col-form-label text-md-right">Tag</label>
		                            <div class="col-md-6">
		                                <select id="gender" name="gender" class="form-control">
		                                    <option value="1">Male</option>
		                                    <option value="2">Female</option>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="form-group row mb-0">
		                            <div class="col-md-8 offset-md-4">
		                                <button type="submit" class="btn btn-primary">
		                                    SAVE
		                                </button>
		                            </div>
		                        </div>
		                    </form>
					  	</div>
					  	<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  	</div>
					</div>
			  	</div>
			</div>
			<!-- end Modal -->
			@if (session('message'))
			<div class="alert alert-{{ session('level') }}" role="alert">
				<strong>{{session('message')}}</strong>
			</div>
			@endif
			<div class="row">
				
				@foreach ($journals as $journal)
				<div class="col-lg-4 col-md-6">
					
					<div class="card h-auto w-auto">
						
						<div class="single-post post-style-4">

							<div class="display-table">
								<h4 class="title display-table-cell"><a href="#"><b>{{ $journal->title }}</b></a></h4>
							</div>
							<div class="avatar-area">
								<p class="name" style="font-style: italic;">{{$journal->user->first_name}} {{$journal->user->last_name}}</p>
								<h6 class="date"> {{$journal->created_at}}</h6>
							</div>
							<ul class="post-footer">
								@if(!Auth::check() || Auth::user()->id != $journal->user_id)
									<li style="
										width: 100%;
									    display: inline-block;
									    border-right: 1px solid #fff;
									    background: #EDF3F3;
									">
    							<a href="{{ route('journal.show', $journal->id) }}" title="Show"><i class="ion-eye"></i></a></li>
    							@else 
    							<li><a href="{{ route('journal.show', $journal->id) }}" title="Show"><i class="ion-eye"></i></a></li>
								@endif
								
								@if(Auth::check())
									@if(Auth::user()->id == $journal->user_id)
									<li><a href="{{ route('journal.edit', $journal->id) }}"><i class="ion-android-create" title="Update"></i></a></li>									
									@endif
								@endif
							</ul>

						</div><!-- single-post -->
						

					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->
				@endforeach

			</div><!-- row -->

			<!-- <a class="load-more-btn" href="#"><b>LOAD MORE</b></a> -->
			<div class="d-flex justify-content-center">{{ $journals->links()}}</div> 
			
			<div class="menu pmd-floating-action" style="z-index: 9999;" role="navigation"> 
				@if(Auth::check())
				<a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default" data-title="CREATE A JOURNAL" data-toggle="modal" data-target="#myModal"> 
					<span class="pmd-floating-hidden">CREATE A JOURNAL</span>
					<i class="material-icons">border_color</i>
				</a> 
				<a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default" data-title="MANAGE ALBUM"> 
					<span class="pmd-floating-hidden">ALBUM</span> 
					<i class="material-icons">photo_library</i> 
				</a>
				@endif 
				<a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default" data-title="SEARCH"> 
					<span class="pmd-floating-hidden">SEARCH</span> 
					<i class="material-icons">search</i>
				</a> 
				<a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default" data-title="Dialpad"> 
					<span class="pmd-floating-hidden">Dialpad</span> 
					<i class="material-icons">dialpad</i> 
				</a> 
				<a class="pmd-floating-action-btn btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary" title="Action" href="javascript:void(0);"> 
					<span class="pmd-floating-hidden">Primary</span>
					<i class="material-icons pmd-sm">add</i> 
				</a> 
			</div>
		</div><!-- container -->
	</section><!-- section -->


	<footer>

		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<a class="logo" href="#"><img src="{{ asset('journal-css/images/logo.png') }}" alt="Logo Image"></a>
						<p class="copyright">Bona @ 2017. All rights reserved.</p>
						<p class="copyright">Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
						<ul class="icons">
							<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
						</ul>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
						<div class="footer-section">
						<h4 class="title"><b>CATAGORIES</b></h4>
						<ul>
							<li><a href="#">BEAUTY</a></li>
							<li><a href="#">HEALTH</a></li>
							<li><a href="#">MUSIC</a></li>
						</ul>
						<ul>
							<li><a href="#">SPORT</a></li>
							<li><a href="#">DESIGN</a></li>
							<li><a href="#">TRAVEL</a></li>
						</ul>
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<h4 class="title"><b>SUBSCRIBE</b></h4>
						<div class="input-area">
							<form>
								<input class="email-input" type="text" placeholder="Enter your email">
								<button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
							</form>
						</div>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

			</div><!-- row -->
		</div><!-- container -->
	</footer>


	<!-- SCIPTS -->

	<script src="{{ asset('journal-css/common-js/jquery-3.1.1.min.js') }}"></script>

	<script src="{{ asset('journal-css/common-js/tether.min.js') }}"></script>

	<script src="{{ asset('journal-css/common-js/bootstrap.js') }}"></script>

	<script src="{{ asset('journal-css/common-js/swiper.js') }}"></script>

	<script src="{{ asset('journal-css/common-js/scripts.js') }}"></script>

</body>
</html>

