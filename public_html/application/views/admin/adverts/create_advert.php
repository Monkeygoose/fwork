<div class="col-2-3">

	<?php echo validation_errors(); ?>

	<?php echo form_open('advert/create_advert'); ?>

		<div class="formitems" style="margin-bottom: 10px;">

			<select class="location-options" name="location">
				<option disabled selected>Location</option>
				<option value="site">Website</option>
				<option value="magazine">Magazine</option>
			</select>

			<select class="site-options hidden" name="section-site">
				<option disabled selected>Section</option>
				<option value="frontpage">Front Page</option>
				<option value="blog">Blog</option>
				<option value="blog">Events</option>
			</select>

			<select class="section-options magazine-options hidden" name="section-mag">
				<option disabled selected>Issue</option>
				<?php 
				foreach ($issues->result() as $row) : 
				?>
					<option value="<?php echo $row->issue_num;?>"><?php echo "Issue-".$row->issue_num; ?></option>
				<?php 
				endforeach; 
				?>
			</select>

			<select class="article-page magazine-options hidden" name="page">
				<option disabled value="page" selected>Page</option>
				<option value="cover">Front Cover</option>
				<?php 
				foreach ($articles->result() as $row) : 
				?>
					<option class="article-option article-issue-<?php echo $row->issue; ?> hidden" value="<?php echo $row->slug;?>"><?php echo $row->title; ?></option>
				<?php 
				endforeach; 
				?>
			</select>

			<select id="site-adtype" class="site-options hidden" name="type-site">
				<option disabled selected>Type</option>
				<option value="banner">Banner</option>
				<option value="footer">Footer</option>
				<option value="events">Events Block</option>
				<option value="skyscraper">Sky scraper</option>
			</select>

			<select id="mag-adtype" class="magazine-options hidden" name="type-mag">
				<option disabled selected>Type</option>
				<option value="sponsor">Sponsor</option>
				<option value="fullpage">Full Page</option>
				<option value="halfpage">Half Page</option>
				<option value="articleblock">Article Block</option>
				<option value="banner">Banner</option>
			</select>			

			<select name="client_name">
				<option disabled selected>Client</option>
				<?php 
				foreach ($clients->result() as $row) : 
				?>
					<option value="<?php echo $row->name;?>"><?php echo $row->name; ?></option>
				<?php 
				endforeach; 
				?>
			</select>

			<input type="text" name="link" placeholder="Link (eg. http://www.example.com)">

			<input class="site-options hidden" type="text" name="impressions" id="impressions" readonly style="border:0; color:#F6803D; font-weight:bold; padding: 0px; margin: 2px 0;">

			<div class="site-options hidden" id="slider"></div>

			<input type="hidden" name="temp_folder" value="<?php echo $temp_folder;?>">

		</div>

		<textarea name="text" class="adverttext magazine-options hidden"></textarea>

		<div class="formitems">

			<div id="magadprice" class="magazine-options hidden">Price £0</div>

			<input type="submit" name="submit" value="Create Article" />

		</div>

	</form>

</div>

<!--<div id="report"></div>-->