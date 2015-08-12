						</article>
					</div><!-- /scroller-inner -->
				</div><!-- /scroller -->

			</div><!-- /pusher -->
		</div><!-- Container end -->

		<?php 
		foreach ($scripts as $key => $value) {
			echo "
			<!--".$key."-->
			<script src='$value'></script>
			";
		};
		?>
	</body>
</html>