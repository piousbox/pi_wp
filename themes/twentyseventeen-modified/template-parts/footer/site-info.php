<?php
/**
 * 20180924 _vp_
 * Displays footer site info
 *
 */

?>
<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
</div><!-- .site-info -->
