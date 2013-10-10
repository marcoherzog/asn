<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'twentyeleven' ); ?></label>
<?php if(false): ?>
    <input type="text" class="field" name="s" id="s" value="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" onfocus="if (this.value == '<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>';}" />
<?php endif; ?>
    <input type="text" class="field" name="s" id="s" value="<?php the_search_query(); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
	</form>
