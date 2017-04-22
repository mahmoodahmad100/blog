<header>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('welcome') }}">The blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-left">
				<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{route('welcome')}}">Home</a></li>
				<li class="{{ Request::is('blog') ? 'active' : '' }}"><a href="{{route('blog.index')}}">Blog</a></li>
        <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{route('contact')}}">contact us</a></li>
        <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{route('about')}}">about</a></li>
      </ul>

			<ul class="nav navbar-nav pull-right">
				@if(Auth::check())

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello {{ Auth::user()->name }}<strong class="caret"> </strong></a>
					<ul class="dropdown-menu">
						<li>
							<a href="{{ route('tags.index') }}">tags</a>
							<a href="{{ route('categories.index') }}">categories</a>
							<a href="{{ route('posts.index') }}">posts</a>
						</li>
						<li class="divider"> </li>
						<li>
							<a href="{{ route('signout') }}"><span class="glyphicon glyphicon-off"> </span> Sign out</a>
						</li>
					</ul>
				</li>

				@else
					<li>
						<a href="{{ route('signin') }}">Signin</a>
					</li>
					<li>
						<a href="{{ route('signup') }}">Signup</a>
					</li>
				@endif
			 </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
