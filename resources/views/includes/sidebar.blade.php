<div class="side-content-wrap">
	<div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
		<ul class="navigation-left">
			<li class="nav-item">
				<a class="nav-item-hold" href="{{ route('home') }}">
					<i class="nav-icon i-Bar-Chart"></i>
					<span class="nav-text">Dashboard</span>
				</a>
			</li>
			<li class="nav-item" data-item="data-master">
				<a class="nav-item-hold" href="#">
					<i class="nav-icon i-Data-Center"></i>
					<span class="nav-text">Data Master</span>
				</a>
				<div class="triangle"></div>
			</li>
			<li class="nav-item">
				<a class="nav-item-hold" href="{{ route('pasiens.index') }}">
					<i class="nav-icon i-Inbox-Out"></i>
					<span class="nav-text">Pendaftaran</span>
				</a>
				<div class="triangle"></div>
			</li>
			<li class="nav-item">
				<a class="nav-item-hold" href="{{ route('pemeriksaans.index') }}">
					<i class="nav-icon i-Inbox-Out"></i>
					<span class="nav-text">Pemeriksaan</span>
				</a>
				<div class="triangle"></div>
			</li>
		</ul>
	</div>

	<div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
		<ul class="childNav" data-parent="data-master">
			<li class="nav-item">
				<a href="{{ route('employees.index') }}">
					<i class="nav-icon i-Empty-Box"></i>
					<span class="item-name">Pegawai</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('users.index') }}">
					<i class="nav-icon i-File-Pictures"></i>
					<span class="item-name">User</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('tindakans.index') }}">
					<i class="nav-icon i-Filter-2"></i>
					<span class="item-name">Tindakan</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('obats.index') }}">
					<i class="nav-icon i-Globe-2"></i>
					<span class="item-name">Obat</span>
				</a>
			</li>
            <li class="nav-item dropdown-sidemenu">
                <a href="#">
                    <i class="nav-icon i-Split-Horizontal-2-Window"></i>
                    <span class="item-name">Wilayah</span>
                    <i class="dd-arrow i-Arrow-Down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('provinces.index') }}">Provinsi</a></li>
                    <li><a href="{{ route('regencies.index') }}">Kabupaten/Kota</a></li>
                    <li><a href="{{ route('districts.index') }}">Kecamatan</a></li>
                    <li><a href="{{ route('villages.index') }}">Kelurahan/Desa</a></li>
                </ul>
            </li>
		</ul>
	</div>

	<div class="sidebar-overlay"></div>
</div>
