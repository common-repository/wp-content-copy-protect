<?php
/*

Plugin Name: WP Content Copy Protect
Plugin URI: https://www.wpsprite.com/plugins/wp-content-copy-protect/
Description: Simple and Amazing  wordpress copy protect plugin. This plugin will be able to block the mouse right button, Ctrl + C key, Ctrl + U key , and F12 key.
Version: 1.1
Author: wpsprite
Author URI: https://www.wpsprite.com/
License: GPLv2 or later */
function wp_content_copy_protect_scripts()
{

    ?>

<style type="text/css">

	* {
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: -moz-none;
		-o-user-select: none;
		user-select: none;
	}

	p {
		-webkit-user-select: text;
		-khtml-user-select: text;
		-moz-user-select: text;
		-o-user-select: text;
		user-select: text;
	}
</style>


<script>

// Disable C-key

	function disableselect(e) {
		return false;
	}

	function reEnable() {
		return true;
	}

	document.onselectstart = new Function("return false");

	if (window.sidebar) {
		document.onmousedown = disableselect;
		document.onclick = reEnable;
	}
</script>
<script>

// Block F12 keyboard key

	jQuery(document).keydown(function(event){
		if(event.keyCode==123){
			return false;
		}
		else if (event.ctrlKey && event.shiftKey && event.keyCode==73){
				 return false;
		}
	});

	jQuery(document).on("contextmenu",function(e){
	   e.preventDefault();
	});

</script>
<script>

	// Disable Ctrl + U
	document.onkeydown = function(e) {
		if(e.keyCode == 123) {
		 return false;
		}
		if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
		 return false;
		}
		if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
		 return false;
		}
		if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
		 return false;
		}

		if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
		 return false;
		}
	 }
</script>

	<?php
}

add_action('wp_head', 'wp_content_copy_protect_scripts');
