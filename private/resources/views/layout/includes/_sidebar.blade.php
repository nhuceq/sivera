<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li>
							<a href="{{ url ('/dashboard') }}" class="{{ isset($menu_dashboard) ? 'active' : '' }}">
								<i class="lnr lnr-home"></i> <span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="{{ url ('/user_detail/') }}/{{ Auth::user() -> id }}" class="{{ isset($menu_profil) ? 'active' : '' }}">
								<i class="lnr lnr-user"></i> <span>Profil</span>
							</a>
						</li>
						<li>
							<a href="{{ url ('/spp_view') }}" class="{{ isset($menu_kelola_spp) ? 'active' : '' }}">
								<i class="lnr lnr-pencil"></i> <span>Kelola SPP</span>
							</a>
						</li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed {{ isset($menu_laporan_spp) || isset($menu_laporan_dispen) ? 'active' : '' }}">
								<i class="lnr lnr-file-empty"></i> <span>Laporan</span> <i class="icon-submenu lnr lnr-chevron-left"></i>
							</a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li>
										<a href="{{ url ('/laporan_spp') }}" class="{{ isset($menu_laporan_spp) ? 'active' : '' }}">Laporan SPP</a>
									</li>
									<li>
										<a href="{{ url ('/laporan_dispen') }}" class="{{ isset($menu_laporan_dispen) ? 'active' : '' }}">Laporan Dispensasi</a>
									</li>
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