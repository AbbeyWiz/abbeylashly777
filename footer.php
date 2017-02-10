<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package punchtheme
 */

?>

	</div><!-- #content -->



	<nav id="cd-lateral-nav">
		<!-- test nav -->


			<?php wp_nav_menu( array( 'theme_location' => 'section', 'container' => 'ul', 'menu' => '','menu_class' => 'cd-navigation', 'container_class' => 'cd-navigation' ) ); ?>



		<ul class="cd-navigation cd-single-item-wrapper">
			<li><a href="#0">Privacy Policy</a></li>
			<li><a href="#0">Terms of Use</a></li>
			<li><a href="#0">About</a></li>
		</ul> <!-- cd-single-item-wrapper -->

	</nav>




	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info pb-root container-fluid">
			<a href="http://punchng.com" rel="designer">punchng.com</a> © 	1971-<?php echo date("Y"); ?> The Punch newspaper
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<script>
        ;(function() {
            // Initialize
						var bLazy = new Blazy({
							offset: 30,
							//container: '#scrolling-container',
								breakpoints: [{
								width: 420 // Max-width
								,src: 'data-src-small'
						 }]
						, success: function(element){
								 setTimeout(function(){
							 // We want to remove the loader gif now.
							 // First we find the parent container
							 // then we remove the "loading" class which holds the loader image
							 var parent = element.parentNode;
							 parent.className = parent.className.replace(/\bloading\b/,'');
						 }, 500);
					}
				});
        })();
    </script>
		<script src="https://cdn.plyr.io/2.0.11/plyr.js"></script>
		<script>plyr.setup();</script>
		<!-- Rangetouch to fix <input type="range"> on touch devices (see https://rangetouch.com) -->
		<script src="https://cdn.rangetouch.com/0.0.9/rangetouch.js" async></script>




		<script>
		(function(d, u){
				var x = new XMLHttpRequest(),
						b = d.body;

				// Check for CORS support
				// If you're loading from same domain, you can remove the if statement
				// XHR for Chrome/Firefox/Opera/Safari
				if ("withCredentials" in x) {
						x.open("GET", u, true);
				}
				// XDomainRequest for older IE
				else if(typeof XDomainRequest != "undefined") {
						x = new XDomainRequest();
						x.open("GET", u);
				}
				else {
						return;
				}

				x.send();
				x.onload = function(){
						var c = d.createElement("div");
						c.setAttribute("hidden", "");
						c.innerHTML = x.responseText;
						b.insertBefore(c, b.childNodes[0]);
				}
		})(document, "https://cdn.shr.one/0.1.9/sprite.svg");
		</script>

		<script>//shr.setup();</script>


		<?php

		if ( ! is_user_logged_in() ) {
			?>
			<script type="text/javascript">
			$(document).ready(function(){
				$(document).bind("cut copy paste",function(e) {
						e.preventDefault();
				});

				//Disable full page
		    $("body").on("contextmenu",function(e){
		        return false;
		    });

			});
			</script>
			<?php

		} else {
			?>

			<?php
		     //echo "You are viewing the WordPress Administration Panels";
		}

		?>

</body>
</html>
