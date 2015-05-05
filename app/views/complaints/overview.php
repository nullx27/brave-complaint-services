<?php if(isset($filter)) echo $filter; ?>

<table class="table table-striped" id="complaints_overview">
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Type</th>
            <th>User</th>
            <th>Severity</th>
            <th>Status</th>
            <th>Latest Activity</th>

			<?php if(Auth::user()->isReviewer()): ?>
	            <th>Offender</th>
	            <th>Last Reviewer</th>
                <th>Last Comment</th>
			<?php endif; ?>
        </tr>
    </thead>

    <?php

    foreach($complaints as $complaint):
        $class = 'active';

        switch($complaint->status){
            case 'new':
                $class = "warning";
                break;
            case 'resolved':
                $class = "success";
                break;
            case 'inprogress':
                $class = 'info';
                break;
            case 'rejected':
                $class = "active";
                break;
            case 'withdrawn':
                $class = 'active';
                break;
        }

	    if($complaint->important && Auth::user()->isReviewer()) $class = "danger";

	    $last_reviewer = ApiUser::find($complaint->last_reviewer);
	    if($last_reviewer) {
		    $last_reviewer_name = $last_reviewer->character_name;
	    } else {
		    $last_reviewer_name = "";
	    }

	    $comment = Message::where('complaint_id', '=', $complaint->id)->orderBy('created_at', 'desc')->first();
		if($comment){
			$last_comment = $comment->message;
		} else {
			$last_comment = '';
		}

	    ?>

    <tr class="<?php echo $class; ?>">
        <td><a href="<?php echo action('ComplaintController@singleView', array('id' => $complaint->id )); ?>">#<?php echo $complaint->id; ?></a></td>
        <td><?php echo $complaint->created_at; ?></td>
        <td><?php echo strtoupper($complaint->type); ?></td>

        <?php if($complaint->anonymous): ?>
            <td>Anonymous</td>
        <?php else: ?>
            <td><?php echo ApiUser::find($complaint->user_id)->character_name; ?></td>
        <?php endif; ?>
        <td><?php echo $complaint->severity; ?></td>
        <td><?php echo BraveComplaintHelper::$status[$complaint->status] ?></td>
        <td><?php echo $complaint->updated_at ?></td>

	    <?php if(Auth::user()->isReviewer()): ?>
            <td><?php echo $complaint->defendant; ?></td>
            <td><?php echo $last_reviewer_name; ?></td>
            <td data-content="<?php echo e($last_comment); ?>" data-toggle="popover" data-placement="bottom" data-trigger="hover"><?php echo (strlen($last_comment) > 50) ? substr($last_comment,0,50) . '...' : $last_comment;  ?></td>
        <?php endif; ?>
    </tr>

    <?php endforeach; ?>
</table>


<?php if(count($complaints) == 0): ?>
    <h4>No Complaints found!</h4>
<?php endif; ?>