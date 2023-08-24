<?php
/*
    wp_list_comments( array(
            'style' => 'div',
            'callback' => 'patient_comment',
            'end-callback' => 'patient_end_comment',
            'reverse_top_level' => true,
            'reply_text' => 'Ответить',
            'login_text' => 'Необходимо авторизоваться для добавления комментариев',
        )
    );

    function patient_comment () { ?>
        <div class="media m-b-20" id="comment-<?php comment_ID(); ?>">
            <div class="d-flex mr-3">
                <?php echo get_avatar( $comment, 32, '', '', array( 'class' => 'object rounded-circle thumb-sm' ) ); ?>
            </div>
            <div class="media-body">
                <!-- a href="<?php comment_author_url(); ?>" --><h5 class="mt-0"><?php comment_author(); ?></h5><!--/a -->
                <p class="font-13 text-muted mb-0">
                    <?php comment_text(); ?>
                </p>
                <a href="<?php comment_reply_link(); ?>" class="text-success font-13">Ответить</a>
   <?php }

    function patient_end_comment () {
            echo '</div></div>';
    }
*/
?>

<ul class="commentlist">
	  <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
</ul>

<?php
function mytheme_comment( $comment, $args, $depth ) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }

    $classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
    ?>

    <<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>

    <div class="comment-author vcard">
        <?php
        if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, $args['avatar_size'] );
        }
        printf(
            __( '<cite class="fn">%s</cite>' ),
            get_comment_author_link()
        );
        ?>
    </div>

    <?php if ( $comment->comment_approved == '0' ) { ?>
        <em class="comment-awaiting-moderation">
            <?php _e( 'Ваш комментарий ожидает модерации.' ); ?>
        </em><br/>
    <?php } ?>



    <?php comment_text(); ?>

    <div class="reply">
        <?php
        comment_reply_link(
            array_merge(
                $args,
                array(
                    'add_below' => $add_below,
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth']
                )
            )
        ); ?>
    </div>

    <?php if ( 'div' != $args['style'] ) { ?>
        </div>
    <?php }
}
