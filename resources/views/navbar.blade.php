
    <!-- wrapper -->
	<div class="header">
        <div class="container">
			<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse navbar-dark navbar-expand-lg navbar-custom m-5">
				<a href="{{route('home')}}" class="navbar-brand">
					Miracle
				</a>
				<button class="navbutton navbar-toggler btn btn-sm btn-secondary" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a href="{{route('home')}}" class="nav-link">Home<span class="sr-only"></span> </a> 
						</li>
						<li class="nav-item">
							<a href="{{route('product.index')}}" class="nav-link">Products</a> 
						</li>
						<li class="nav-item">
							<a href="{{route('blogs')}}" class="nav-link">Blogs</a> 
						</li>
						<li class="nav-item">
							<a href="{{route('about')}}" class="nav-link">About</a> 
						</li>
						</li>
						<li class="nav-item ">
							<a href="{{route('account')}}" class="nav-link">
								Account
								<span class="icon-user"></span>
							</a> 
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<!-- <img src="Images/cart.png" width="30px" height="30px"> -->
								<a href="javascript:void(0);" class="icon" onclick="menutoggle"></a>
									<!-- <i class="fa fa-bars"></i> -->
							</a>
						</li>
						</ul>
				</div>
			</nav>
		</div>	
	</div>
    <!-- /#wrapper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
