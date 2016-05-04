<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package tsumiki
 */

if ( ! function_exists( 'tsumiki_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tsumiki_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'tsumiki' ),
		'<i class="material-icons md-18">&#xE8DF;</i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'tsumiki' ),
		'<span class="author vcard"><i class="material-icons md-18">&#xE7FD;</i><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'tsumiki_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function tsumiki_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'tsumiki' ) );
		if ( $categories_list && tsumiki_categorized_blog() ) {
			printf( '<span class="cat-links"><i class="material-icons md-18">&#xE8EF;</i>' . esc_html__( '%1$s', 'tsumiki' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'tsumiki' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><i class="material-icons md-18">&#xE54E;</i>' . esc_html__( '%1$s', 'tsumiki' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="material-icons md-18">&#xE0B9;</i>';
		comments_popup_link( esc_html__( 'Leave a comment', 'tsumiki' ), esc_html__( '1 Comment', 'tsumiki' ), esc_html__( '% Comments', 'tsumiki' ) );
		echo '</span>';
	}

	// edit_post_link( esc_html__( 'Edit', 'tsumiki' ), '<span class="edit-link">', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function tsumiki_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'tsumiki_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'tsumiki_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so tsumiki_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so tsumiki_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in tsumiki_categorized_blog.
 */
function tsumiki_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'tsumiki_categories' );
}
add_action( 'edit_category', 'tsumiki_category_transient_flusher' );
add_action( 'save_post',     'tsumiki_category_transient_flusher' );
