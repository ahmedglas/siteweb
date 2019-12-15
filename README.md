# siteweb


<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>






                        //// mine
                        
						<div class="recommended_items"><!--recommended_items-->
							<h2 class="title text-center">recommended items</h2>
							<?php 
							
							require_once("./php/config/db.php");
   
						$id_article = $_GET['profil_views'];
						$sql = "SELECT * from article a
						where a.categorie = (select b.categorie 
						from article b 
						where   b.id_article='".$id_article."');";
						$res = mysqli_query($con, $sql);
						$i = 0;
						while ($row_pro = mysqli_fetch_array($res)) {
						$id_article = $row_pro['id_article'];
						$description = $row_pro['artdesc'];
						$img = $row_pro['image'];
						
						
						$ttc = $row_pro['ttc'];
						$string ="";
						$string .='<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<a href="product-details.php?profil_views='. "$id_article".'><img src="images/cart/'."$img".'alt=""></a>
									<h2>'."$ttc".' </h2>
									<p>'."$description".'</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
								</div>
							</div>
						</div>
					</div>'
							
						
							
							
							?>
							
							<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">	
										
										<?php if($i<4) 
										echo '<div class="item">'.$string.'</div>';
										else 
										echo '<div class="item active">'.$string.'</di>';
										?>
								</div>
						<?php } ?>
								 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>			
							</div>
						</div><!--/recommended_items-->