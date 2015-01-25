<button type="button" class="btn btn-default btn-lg btn-block add-comment" data-toggle="modal" data-target="#comment-modal">Add Comment</button>

<div class="modal fade" id="comment-modal" tabindex="-1" role="dialog" aria-labelledby="comment-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Leave a comment</h3>
            </div>
            <div class="modal-body">
                <?php echo Form::open(array('route' => array('addComment')))?>
                <div class="form-group">
                    <?php echo Form::textarea('complaint_comment', '',
                        array('id' => 'complaint_comment',
                            'class' => 'form-control',
                            'required' => '',
                            'row' => '3'
                        )
                    ); ?>
                </div>

                <?php if(Auth::user()->isReviewer()): ?>
                    <div class="form-group">
                        <?php echo Form::label('complaint_comment_private', 'Set Private:');?>
                        <?php echo Form::checkbox('complaint_comment_private', 'yes'); ?>
                        <span id="helpBlock" class="help-block">If set to private, this comment is only visable to other HR staff.</span>

                    </div>
                <?php endif; ?>
                <?php echo Form::hidden('complaint_id', $complaint->id); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?php echo Form::submit('Submit', array('class' => 'btn btn-primary save-comment'));?>
                </form>
            </div>
        </div>
    </div>
</div>