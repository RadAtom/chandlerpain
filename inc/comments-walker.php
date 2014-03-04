<?php

class ChandlerPainCommentWalker extends Walker_Comment {

    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

    /** START_LVL
     * Starts the list before the CHILD elements are added. */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>

                <ul class="children">
    <?php }

    /** END_LVL
     * Ends the children list of after the elements are added. */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>

        </ul><!-- /.children -->

    <?php }

    /** START_EL */
    function start_el( &$output, $comment, $depth=0, $args = array() , $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>

        <li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID() ?>">
            <span class="comment-date"><?php comment_date(); ?></span></br>
            <span class="comment-time"><?php comment_time(); ?></span>
            <cite class="comment-author"><?php echo get_comment_author_link(); ?></cite>

            <span id="comment-content-<?php comment_ID(); ?>" class="comment-body">
                <?php if( !$comment->comment_approved ) : ?>
                    <?php //do we not want to output anything if the comment is unapproved? ?>
                <?php else: comment_text(); ?>
                <?php endif; ?>
            </span><!-- /.comment-content -->

            <span class="comment-reply">
                <?php $reply_args = array(
                    //'add_below' => $add_below,
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'] );

                comment_reply_link( array_merge( $args, $reply_args ) );  ?>
            </span><!-- /.reply -->

            <span class="comment-edit"><?php edit_comment_link(); ?></span>

    <?php }

    function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

        </li><!-- /#comment-' . get_comment_ID() . ' -->

    <?php }
}