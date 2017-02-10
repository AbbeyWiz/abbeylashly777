<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package punchtheme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<!-- analytics -->
	<script>
	(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
	(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
	l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-79306903-1', 'punchng.com');
	ga('send', 'pageview');
	</script>




	<!-- Start Alexa Certify Javascript -->
	<script type="text/javascript">
	_atrk_opts = { atrk_acct:"FPXso1IWNa104B", domain:"punchng.com",dynamic: true};
	(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
	</script>
	<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=FPXso1IWNa104B" style="display:none" height="1" width="1" alt="" /></noscript>
	<!-- End Alexa Certify Javascript -->


	<!-- Facebook -->
	<meta property="fb:pages" content="206270189411151" />

	<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
	<script>
	  var googletag = googletag || {};
	  googletag.cmd = googletag.cmd || [];
	</script>

	<!-- Google DFP -->
	<script>
	  googletag.cmd.push(function() {
	    googletag.defineSlot('/31989200/article-bottom', [320, 120], 'div-gpt-ad-1474456642179-0').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/article-bottom-mobile', [320, 120], 'div-gpt-ad-1474456642179-1').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/fb1', [728, 90], 'div-gpt-ad-1474456642179-2').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/fb2', [468, 60], 'div-gpt-ad-1474456642179-3').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/fullbanner4', [468, 60], 'div-gpt-ad-1474456642179-4').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/fullbanner1', [728, 90], 'div-gpt-ad-1474456642179-5').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/fullbanner2', [468, 60], 'div-gpt-ad-1474456642179-6').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/fullbanner3', [468, 60], 'div-gpt-ad-1474456642179-7').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/hm-sb1', [300, 250], 'div-gpt-ad-1474456642179-8').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/hm-sb2', [[300, 250], [300, 300]], 'div-gpt-ad-1474456642179-9').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/hm-sb3', [[300, 100], [300, 300], [300, 250]], 'div-gpt-ad-1474456642179-10').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/hm-sb4', [300, 250], 'div-gpt-ad-1474456642179-11').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/hm-sb5', [300, 250], 'div-gpt-ad-1474456642179-12').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/hm-sb6', [300, 100], 'div-gpt-ad-1474456642179-13').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/hm-sb7', [300, 100], 'div-gpt-ad-1474456642179-14').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/in-sb1', [300, 250], 'div-gpt-ad-1474456642179-15').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/in-sb2', [300, 250], 'div-gpt-ad-1474456642179-16').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/in-sb3', [300, 250], 'div-gpt-ad-1474456642179-17').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/320x100-9', [300, 100], 'div-gpt-ad-1474456642179-18').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/topbar', [[728, 90], [600, 90]], 'div-gpt-ad-1474456642179-19').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/in-sb4', [300, 250], 'div-gpt-ad-1474456642179-20').addService(googletag.pubads());

	googletag.defineSlot('/31989200/Punch_Textlink_1', [320, 100], 'div-gpt-ad-1474541196894-0').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/Punch_Textlink_2', [320, 100], 'div-gpt-ad-1474541196894-1').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/Punch_Textlink_3', [320, 100], 'div-gpt-ad-1474541196894-2').addService(googletag.pubads());
	 googletag.defineSlot('/31989200/Punch_Textlink_5', [[320, 120], [320, 50], [320, 100]], 'div-gpt-ad-1477323510339-0').addService(googletag.pubads());
	    googletag.defineSlot('/31989200/Punch_Textlink_4', [[320, 120], [320, 50], [320, 100]], 'div-gpt-ad-1477323510339-1').addService(googletag.pubads());

	    googletag.pubads().enableSingleRequest();
	    googletag.pubads().collapseEmptyDivs();
	    googletag.enableServices();
	  });
	</script>

	<!-- Mads header script -->
	<script src="//eu2.madsone.com/js/tags.js"></script>

	<!-- EPOM Header script -->
	<!-- BEGIN TAG - HEAD -->
	<script type="text/javascript">
	  /*<![CDATA[*/
	  if(!(window.EcpmbandConfig && window.EcpmbandConfig.ads)) window.EcpmbandConfig = {ads:[]};
	  EcpmbandConfig.ads.push({
	      ecpmband_key:"3e507788090721ad2570158fadc4bbbb",
	      ecpmband_channel: "",
	      ecpmband_code_format:"ads-async.js",
	      ecpmband_click:"",
	      ecpmband_custom_params:{},
	      ecpmband_target_id:"ecpmband-3e507788090721ad2570158fadc4bbbb"
	  });
	  (function () {
	      var sc = document.createElement("script");
	      sc.type = "text/javascript";
	      sc.async = true;
	      sc.src = (location.protocol == "https:" ? "https:" : "http:") + "//www.adsonflags.com\/js\/show_ads_ecpmband.js?pubId=2925";
	      var s = document.getElementsByTagName("script")[0];
	      s.parentNode.insertBefore(sc, s);
	  })();
	  /*]]>*/
	</script>
	<!-- END TAG - HEAD -->


<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'punchtheme' ); ?></a>



	<!-- replacer header -->

<div class="header-wrap">


	<header id="header">
		<a id="cd-logo" href="#0"></a>


		<nav class="cd-secondary-nav">

				<div class="logo">
					<a href="<?php echo home_url(); ?>">
						<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
						<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/punch.svg" alt="Logo" class="logo-img"> -->
						<img src="<?php echo get_template_directory_uri(); ?>/assets/punch-white.svg" alt="Logo" class="logo-img">
					</a>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>



		</nav> <!-- .cd-secondary-nav -->


		<a id="cd-menu-trigger2" href="#"><span class="cd-menu-text"></span><span class="cd-menu-icond"><img src="<?php echo get_template_directory_uri(); ?>/assets/search.svg" alt="Logo" class="Search" /></span></a>
		<a id="cd-menu-trigger" href="#"><span class="cd-menu-text">Sections</span><span class="cd-menu-icon"></span></a>

		<div class="search-bar search--closed">
			<?php get_search_form(); ?>
		</div>
	</header>



	<script type="text/javascript">
		$( "#cd-menu-trigger2" ).click(function() {

			if($(".search-bar").hasClass('search--opened')) {
				$(".search-bar").removeClass('search--opened').addClass('search--closed');
				$( ".search-field" ).blur();
			}else {
				$(".search-bar").removeClass('search--closed').addClass('search--opened');
				$( ".search-field" ).focus();
			}

			});

	</script>
</div>






	<div id="content" class="site-content cd-main-content">
