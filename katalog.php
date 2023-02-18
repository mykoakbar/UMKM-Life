<?php
session_start();
include 'dbconnect.php';

?>

<!-- top-brands -->
<div class="top-brands">
		<div class="container">
		<h2>Produk Kami</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile-tp">
								<h5>Penawaran Terbaik Minggu Ini
								<?php
								if(!isset($_SESSION['name'])){
									
								} else {
									echo 'Untukmu, '.$_SESSION['name'].'!';
								}
								?>
								</h5>
								</div>
							<div class="agile_top_brands_grids">
							
							<?php 
											$brgs=mysqli_query($conn,"SELECT * from produk order by idproduk ASC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){

												?>
								<div class="col-md-4 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												<img src="images/offer.png" alt=" " class="img-responsive" />
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="product.php?idproduk=<?php echo $p['idproduk'] ?>"><img title=" " alt=" " src="<?php echo $p['gambar']?>" width="200px" height="200px" /></a>		
															<p><?php echo $p['namaproduk'] ?></p>
															<div class="stars">
															<?php
															$bintang = '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
															$rate = $p['rate'];
															
															for($n=1;$n<=$rate;$n++){
																echo '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
															};
															?>
															</div>
															<h4>Rp<?php echo number_format($p['hargaafter']) ?> <span>Rp<?php echo number_format($p['hargabefore']) ?></span></h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
																<fieldset>
																	<a href="product.php?idproduk=<?php echo $p['idproduk'] ?>"><input type="submit" class="button" value="Lihat Produk" /></a>
																</fieldset>
														</div>
													</div>
												</figure>
											</div>
										</div>
									</div>
								</div>
								<?php
											}
								?>
								
								
								<div class="clearfix"> </div>
							</div>
						</div>
						
											
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //top-brands -->