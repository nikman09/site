<section class="blog blog-single">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-sm-12">
				
				<div class="blog-post-single">
					
					<?php if ( $data['foto']!="")  { ?>
					<a href="<?php echo base_url(); ?>assets/images/berita/<?php echo $data['foto'] ?>" class="image">
				

						<img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $data['foto'] ?>" class="img-responsive img-rounded" />
					</a>
					<?php } ?>
											
					<div class="post-details">
						
						<h3>
							<a href="<?php echo base_url(); ?>site/pelatihan/pengumumandetail?ids=<?php   echo $data['id_pengumuman'] ?>"><?php echo $data['judul'] ?></a>
						</h3>
						
						<div class="post-meta">
							
							<div class="meta-info">
								<i class="entypo-calendar"></i> <?php echo tgl_indo($data['tanggal']) ?>						</div>
							
							<div class="meta-info">
								<i class="entypo-star"></i>
								<?php echo $data['kategori'] ?>
							</div>
							
						</div>
						
					</div>
					
					
					<div class="post-content">
						
					<?php echo $data["isi"] ?>
						
					</div>
					
				
					
					
				</div>
				
			</div>
			
		

				
			</div>
			
		</div>
		
	</div>
	
</section>	
