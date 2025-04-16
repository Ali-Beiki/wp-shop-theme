<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Top Phone</h4>
					<div class="section-nav">
						<div id="slick-nav-3" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick" data-nav="#slick-nav-3">
				
					<!-- product widget -->
					<?php $i=0; ?>
					<?php $new_product =new WP_Query(array(
						'post_type' => 'product',
						'category_name'=> 'laptop'
					)); ?>
					<?php if($new_product->have_posts()):  ?>
						<?php $total = $new_product->post_count; ?>
						<?php while($new_product->have_posts()) : $new_product->the_post(); ?>
						<?php if($i%3===0) : ?>
							<div>
						<?php endif; ?>
							<div class="product-widget">
								<div class="product-img">
									<img src="<?php the_post_thumbnail_url(); ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"><?php the_category(); ?></p>
									<h3 class="product-name"><a href="<?php echo get_permalink(); ?>"> <?php the_title(); ?></a></h3>
									<h4 class="product-price"><?php echo Product::price_separator(get_the_ID()); ?></h4>
								</div>
							</div>
							<?php $i++; ?>
						
						<?php if($i%3===0 || $i === $total) : ?>
							</div>
						<?php endif; ?>
						
						<?php endwhile; ?>
					<?php endif; ?>
					
					<!-- /product widget -->
			
				</div>
			</div>

			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Top selling</h4>
					<div class="section-nav">
						<div id="slick-nav-4" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick" data-nav="#slick-nav-4">
				
					<!-- product widget -->
					<?php $i=0; ?>
					<?php $new_product =new WP_Query(array(
						'post_type' => 'product',
						'category_name'=> 'phone'
					)); ?>
					<?php if($new_product->have_posts()):  ?>
						<?php $total = $new_product->post_count; ?>
						<?php while($new_product->have_posts()) : $new_product->the_post(); ?>
						<?php if($i%3===0) : ?>
							<div>
						<?php endif; ?>
							<div class="product-widget">
								<div class="product-img">
									<img src="<?php the_post_thumbnail_url(); ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"><?php the_category(); ?></p>
									<h3 class="product-name"><a href="<?php echo get_permalink(); ?>"> <?php the_title(); ?></a></h3>
									<h4 class="product-price"><?php echo Product::price_separator(get_the_ID()); ?></h4>
								</div>
							</div>
							<?php $i++; ?>
						
						<?php if($i%3===0 || $i === $total) : ?>
							</div>
						<?php endif; ?>
						
						<?php endwhile; ?>
					<?php endif; ?>
					
					<!-- /product widget -->
			
				</div>
			</div>

			<div class="clearfix visible-sm visible-xs"></div>

			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Top selling</h4>
					<div class="section-nav">
						<div id="slick-nav-5" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick" data-nav="#slick-nav-5">
				
					<!-- product widget -->
					<?php $i=0; ?>
					<?php $new_product =new WP_Query(array(
						'post_type' => 'product',
						'category_name'=> 'laptop'
					)); ?>
					<?php if($new_product->have_posts()):  ?>
						<?php $total = $new_product->post_count; ?>
						<?php while($new_product->have_posts()) : $new_product->the_post(); ?>
						<?php if($i%3===0) : ?>
							<div>
						<?php endif; ?>
							<div class="product-widget">
								<div class="product-img">
									<img src="<?php the_post_thumbnail_url(); ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"><?php the_category(); ?></p>
									<h3 class="product-name"><a href="<?php echo get_permalink(); ?>"> <?php the_title(); ?></a></h3>
									<h4 class="product-price"><?php echo Product::price_separator(get_the_ID()); ?></h4>
								</div>
							</div>
							<?php $i++; ?>
						
						<?php if($i%3===0 || $i === $total) : ?>
							</div>
						<?php endif; ?>
						
						<?php endwhile; ?>
					<?php endif; ?>
					
					<!-- /product widget -->
			
				</div>
			</div>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>