<?php
 
// Do not delete this section
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
    die ('Please do not load this page directly. Thanks!'); }
if ( post_password_required() ) { ?>
    <div class="alert alert-warning">
        <?php _e('This post is password protected. Enter the password to view comments.', 'bst'); ?>
    </div>
<?php
    return;
}
// End do not delete section
 
if (have_comments()) : ?>

<h3><?php _e('Feedback', 'bst'); ?></h3>
<p class="text-muted" style="margin-bottom: 20px;">
    <i class="glyphicon glyphicon-comment"></i>&nbsp; <?php _e('Comments', 'bst');  ?>: <?php comments_number(__('None', 'bst'), '1', '%'); ?>
</p>
  
<ol class="commentlist">
    <?php wp_list_comments('type=comment&callback=bst_comment');?>
</ol>

<ul class="pagination">
    <li class="older"><?php previous_comments_link() ?></li>
    <li class="newer"><?php next_comments_link() ?></li>
</ul>

<?php
  else :
	  if (comments_open()) :
  echo "<p class='alert alert-info'>" . __('Be the first to write a comment.', 'bst') . "</p>";
		else :
			echo "<p class='alert alert-warning'>" . __('Comments are closed for this post.', 'bst') . "</p>";
		endif;
	endif;
?>

<?php if (comments_open()) : ?>
<section id="respond">
    <h3><?php comment_form_title(__('Your feedback', 'bst'), __('Responses to %s', 'bst')); ?></h3>
    <p><?php cancel_comment_reply_link(); ?></p>
    <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
        <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'bst'), wp_login_url(get_permalink())); ?></p>
    <?php else : ?>
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <?php if (is_user_logged_in()) : ?>
                <p>
                    <?php printf(__('Logged in as', 'bst') . ' <a href="%s/wp-admin/profile.php">%s</a>.', get_option('siteurl'), $user_identity); ?>
                    <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'bst'); ?>"><?php echo __('Log out', 'bst') . ' <i class="glyphicon glyphicon-arrow-right"></i>'; ?></a>
                </p>
            <?php else : ?>
                <div class="form-group">
                    <label for="author"><?php _e('Your name', 'bst'); if ($req) echo ' <span class="text-muted">' . __('(required)', 'bst') . '</span>'; ?></label>
                    <input type="text" class="form-control" name="author" id="author" placeholder="<?php _e('Your name', 'bst'); ?>" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
                </div>
                <div class="form-group">
                    <label for="email"><?php _e('Your email address', 'bst'); if ($req) echo ' <span class="text-muted">' . __('(required, but will not be published)', 'bst') . '</span>'; ?></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="<?php _e('Your email address', 'bst'); ?>" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
                </div>
                <div class="form-group">
                    <label for="url"><?php echo __('Your website', 'bst') . ' <span class="text-muted">' . __('if you have one (not required)', 'bst') . '</span>'; ?></label>
                    <input type="url" class="form-control" name="url" id="url" placeholder="<?php _e('Your website url', 'bst'); ?>" value="<?php echo esc_attr($comment_author_url); ?>">
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="comment"><?php _e('Your comment', 'bst'); ?></label>
                <textarea name="comment" class="form-control" id="comment" placeholder="<?php _e('Your comment', 'bst'); ?>" rows="8" aria-required="true"></textarea>
            </div>
            <p><input name="submit" class="btn btn-default" type="submit" id="submit" value="<?php _e('Submit comment', 'bst'); ?>"></p>

            <?php comment_id_fields(); ?>
            <?php do_action('comment_form', $post->ID); ?>
        </form>
    <?php endif; ?>
</section>
<?php endif; ?>
