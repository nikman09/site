<?php   
	$nama = $this->session->userdata("nama");
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
?>
				<nav class="site-nav">
					
					<ul class="main-menu hidden-xs" id="main-menu">
						<li>
							<a href="<?php echo base_url() ?>flashsale/order">
								<span>Order</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>flashsale/ketentuan">
								<span>Syarat & Ketentuan</span>
							</a>
						</li>
						<li>
							<a>
								<span><span class="fa fa-user"></span> <?php echo $nama ?></span>
							</a>
							
							<ul>
								<li>
									<a href="<?php echo base_url() ?>flashsale/profil">
										<span>Profil</span>
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() ?>flashsale/logout">
										<span>Logout</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
					
				
					<div class="visible-xs">
						
						<a href="#" class="menu-trigger">
							<i class="entypo-menu"></i>
						</a>
						
					</div>
				</nav>