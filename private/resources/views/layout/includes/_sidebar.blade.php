<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{ url ('/dashboard') }}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>

						<li><a href="{{ url ('/user_detail/') }}/{{ Auth::user() -> id }}" class=""><i class="lnr lnr-user"></i> <span>Profil</span></a></li>

						
						<li><a href="{{ url ('/spp_view') }}" class=""><i class="lnr lnr-pencil"></i> <span>Kelola SPP</span></a></li>	
																
												
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Laporan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="{{ url ('/laporan_spp') }}" class="">Laporan SPP</a></li>
									<li><a href="{{ url ('/laporan_dispen') }}" class="">Laporan Dispensasi</a></li>
								</ul>
							</div>
						</li>

						@if(Auth::user()->role == 'admin')	
						<li><a href="{{ url ('/user_view') }}" class=""><i class="lnr lnr-cog"></i> <span>Pengaturan</span></a></li>
						@endif

						
					</ul>
				</nav>
			</div>s
		</div>