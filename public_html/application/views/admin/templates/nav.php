<div class="mp-level"> <!-- mp-level 1 -->

	<h2 class="icon icon-world">Menu</h2>

	<ul>

		<li><a class="actbtn" data-loc="<?php echo base_url();?>index.php/admin/dashboard">Home</a></li>

		<li class="icon icon-arrow-left">

			<a class="icon icon-display" href="#">Users</a>
			
			<div class="mp-level">
			
				<h2 class="icon icon-display">Users</h2>

					<ul>
						<li><a class="actbtn" data-loc="<?php echo base_url();?>index.php/register/register_user">Create User</a></li>
						<li><a class="actbtn" data-loc="<?php echo base_url();?>index.php/register/view_users">View Users</a></li>
					</ul>

				
			</div>
			
		</li>

		<li class="icon icon-arrow-left">

			<a class="icon icon-display" href="#">Magazine</a>
			
			<div class="mp-level">
			
				<h2 class="icon icon-display">Magazine</h2>

					<ul>

						<li class="icon icon-arrow-left">

							<a class="icon icon-display" href="#">Issues</a>
							
							<div class="mp-level">
							
								<h2 class="icon icon-display">Issues</h2>

									<ul>

										<li><a class="actbtn" data-loc="<?php echo base_url();?>index.php/issue/create_issue">Create Issue</a></li>
										<li><a class="actbtn" data-loc="<?php echo base_url();?>index.php/issue/view_issues">View Issues</a></li>

									</ul>

							</div>

						</li>

						<li class="icon icon-arrow-left">

							<a class="icon icon-display" href="#">Articles</a>
							
							<div class="mp-level">
							
								<h2 class="icon icon-display">Articles</h2>

									<ul>

										<li><a class="" href="<?php echo base_url();?>index.php/article/create_article">Create Article</a></li>
										<li><a class="actbtn" data-loc="<?php echo base_url();?>index.php/article/view_articles">View Articles</a></li>

									</ul>

							</div>

						</li>

						<li></li>
						<li></li>
						<li></li>
					</ul>

				
			</div>
			
		</li>

		<li class="icon icon-arrow-left">

			<a class="icon icon-display" href="#">Blog</a>
			
			<div class="mp-level">
			
				<h2 class="icon icon-display">Blog</h2>

					<ul>

						<li><a class="actbtn" data-loc="<?php echo base_url();?>index.php/article/create_post">Create Blog Article</a></li>
						<li><a class="actbtn" data-loc="<?php echo base_url();?>index.php/article/view_posts">View Blog Articles</a></li>

						<li></li>
						<li></li>
						<li></li>
					</ul>

				
			</div>
			
		</li>

		<li><a href="<?php echo base_url();?>index.php/signin/logout">Logout</a></li>
		
	</ul>

</div><!-- mp-level 1 END -->