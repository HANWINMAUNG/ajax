<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
					<li class="sidebar-item @yield('admin')">
						<a class="sidebar-link" href="{{ route('user.index') }}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">User</span>
                        </a>
					</li>
				</ul>
			</div>
</nav>