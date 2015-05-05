<?php if(isset($comments) && $comments && count($comments) > 0): ?>
    <?php foreach($comments as $comment): ?>

        <?php
        $background = 'panel-default';
        if(!$comment->public) $background = 'panel-danger';
        ?>

        <div class="panel <?php echo $background; ?>">
            <?php if(is_null($comment->system_msg)): ?>
                <div class="panel-heading">
                    <h3 class="panel-title">

                        <?php
                        //Show anon when complaint is anonymous or commenter is complaint submitter
                        if($complaint->anonymous && $comment->user_id == $complaint->user_id): ?>
                            Anonymous
                        <?php else: ?>
                            <?php echo ApiUser::find($comment->user_id)->character_name; ?>
                        <?php endif; ?>
                        commented on <?php echo $comment->created_at ?><?php if(!$comment->public): ?><span class="pull-right">PRIVATE</span><?php endif; ?></h3>
                </div>
            <?php endif; ?>
            <div class="panel-body">
                <?php echo nl2br($comment->message); ?>
            </div>
        </div>

    <?php endforeach; ?>
<?php endif; ?>