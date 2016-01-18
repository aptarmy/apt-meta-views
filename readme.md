# Post views counter
This plug-in is for WordPress theme made by AptTheme. It cannot be used within other themes.

---

## How to use this plug-in ?
Add this code in template-tags.php included by functions.php file to show Post Views in template.

`
function brawo_post_views() {
	if (function_exits('apt_meta_views_get')) {
		apt_meta_views_get();
	} else {
		_e('Please install required plug-ins to show Post-Views-Count.', 'user hasn\'t yet installed APT Meta Views', 'brawo' );
	}
}
`