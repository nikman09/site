<section class="blog">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-sm-12">
				
				<div class="blog-posts">
					
					<!-- Blog Post -->
				
			
					<?php
								foreach($data->result_array() as $row){
									
							?>
					<div class="blog-post">

					<div class="post-details" style="width:100%">
							
							<h3>
								<a href="<?php echo base_url("simanis/pengumumandetail?ids=".$row['id_pengumuman']."") ?>"><?= $row['judul'] ?></a>
							</h3>
							
							<div class="post-meta">
								
								<div class="meta-info">
									<i class="entypo-calendar"></i><?php echo tgl_indo($row['tanggal']); ?>				</div>
								
								<div class="meta-info">
									<i class="entypo-star"></i>
									<?= $row['kategori'] ?>
								</div>
								
							</div>
							
							<p><?php echo substr($row['isi'] , 0, 200)?>  [...]</p>
							
						</div>
						
					</div>



							
								
								<?php
									}
									?>
						
							
					
			
					<!-- Blog Pagination -->
					
					
					<div class="text-center">
					
					<?php 
								echo $pagination;  
							  ?>
						
					</div>
					
				</div>
				
			</div>
			
			
			
		</div>
		
	</div>
	