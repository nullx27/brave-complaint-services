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
                $class = "danger";
                break;
            case 'withdrawn':
                $class = '';
                break;
        } ?>

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
    </tr>

    <?php endforeach; ?>
</table>


<?php if(count($complaints) == 0): ?>
    <h4>No Complaints found!</h4>
<?php endif; ?>