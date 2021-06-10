        <div class="fixed-sidebar-left">
		
			<ul class="nav navbar-nav side-nav nicescroll-bar">
			<li class="navigation-header">
					<span>Home</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
			
			<li>
					<a class="<?php if($title == "Home") echo "active";?>" href="<?php echo base_url();?>ketua/" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="zmdi zmdi-home mr-20"></i><span class="right-nav-text">Dasbord</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
					
				</li>
				<li class="navigation-header">
					<span><?php echo $this->session->userdata('level');?></span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a class="<?php if($title == "Agama" || $title == "Pengurus" || $title == "Kepala Desa" || $title == "Badan Permusyawaratan Desa" || $title == "Pendamping Desa") echo "active";?>"  href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Data Master</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="dashboard_dr" class="collapse collapse-level-1">
						<li>
							<a  class="<?php if($title == "Agama") echo "active";?>" href="<?php echo base_url();?>ketua/agama">Agama</a>
						</li>
						   <li><a  class="<?php if($title == "Pengurus") echo "active";?>" href="<?php echo base_url();?>ketua/pengurus"> Pengurus UED </a></li>
                            <li><a class="<?php if($title == "Kepala Desa") echo "active";?>" href="<?php echo base_url();?>ketua/kades">Kepala Desa </a></li>
                            <li><a class="<?php if($title == "Badan Permusyawaratan Desa") echo "active";?>" href="<?php echo base_url();?>ketua/bpd">BPD </a></li>
                            <li><a class="<?php if($title == "Pendamping Desa") echo "active";?>" href="<?php echo base_url();?>ketua/pamdes">Pendamping Desa </a></li>
				<li><a class="<?php if($title == "Profil USP") echo "active";?>" href="<?php echo base_url();?>ketua/profil_usp">Identitas USP</a></li>
				
					</ul>
				</li>
			
				<li><hr class="light-grey-hr mb-10"/></li>
				<li >
					<a class="<?php if($title == "Pemanfaat") echo "active";?>" href="<?php echo base_url();?>ketua/pemanfaat" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Data Pemanfaat</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
					
				</li>
				
				
				
				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>Dokument</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a class="<?php if($title == "Pinjaman") echo "active";?>"href="<?php echo base_url();?>ketua/rekap"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">Cetak Data Peminjaman</span></div><div class="clearfix"></div></a>
				</li>
				<li><hr class="light-grey-hr mb-10"/></li>
				<?php
function getClientIP() {
 
    if (isset($_SERVER)) {
 
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
 
        if (isset($_SERVER["HTTP_CLIENT_IP"]))
            return $_SERVER["HTTP_CLIENT_IP"];
 
        return $_SERVER["REMOTE_ADDR"];
    }
 
    if (getenv('HTTP_X_FORWARDED_FOR'))
        return getenv('HTTP_X_FORWARDED_FOR');
 
    if (getenv('HTTP_CLIENT_IP'))
        return getenv('HTTP_CLIENT_IP');
 
    return getenv('REMOTE_ADDR');
}

?>
<li><a class=""  href="javascript:void(0);" data-toggle="collapse" data-target="#dokument-print"><div class="pull-left"><i class="zmdi zmdi-file mr-20"></i><span class="right-nav-text">Ip Address</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
				
                        <ul class="nav child_menu" id="dokument-print">
                    
                            <li><a href="#" ><?php echo "".getClientIP()."";?></a></li>
                            </ul>
                    </li>
					
					<li><hr class="light-grey-hr mb-10"/></li>
				</ul>
		</div>
		
		<!-- side menu lama
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Home</a>
                    <li><a><i class="fa fa-edit"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url();?>ketua/agama">Agama </a></li>
                            <li><a href="<?php echo base_url();?>ketua/pengurus"> Pengurus UED </a></li>
                            <li><a href="<?php echo base_url();?>ketua/kades">Kepala Desa </a></li>
                            <li><a href="<?php echo base_url();?>ketua/bpd">BPD </a></li>
                            <li><a href="<?php echo base_url();?>ketua/pamdes">Pendamping Desa </a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url();?>ketua/pemanfaat"><i class="fa fa-users"></i> Data Pemanfaat</a></li>
                    <li><a href="<?php echo base_url();?>ketua/rekap"><i class="fa fa-print"></i> Cetak Data Peminjaman</a></li>

                </ul>
            </div>


        </div>
      


    </div>
</div>
-->