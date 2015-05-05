<div class="jumbotron">
	<?php if(Auth::user()->isReviewer()):
		$class = "";
		if($complaint->important) $class = ' active';
		?>
		<div class="pull-right important-button">
			<a href="#" class="btn btn-danger mark-important <?php echo $class; ?>" role="button">Important</a>
		</div>
	<?php endif; ?>

    <div class="btn-group pull-right">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"<span id="status-button"><?php echo BraveComplaintHelper::$status[$complaint->status]; ?></span> <span class="caret"></span>
            </button>
        <?php if(Auth::user()->isReviewer()): ?>
            <ul class="dropdown-menu" role="menu">
                <?php foreach(BraveComplaintHelper::$status as $key => $val): ?>
                    <li><a class="update-status" name="<?php echo $key; ?>" href=""><?php echo $val; ?></a></li>
                <?php endforeach; ?>
            </ul>

        <?php else: ?>
            <?php if($complaint->status != 'withdraw'): ?>
                <ul class="dropdown-menu" role="menu">
                    <li><a class="update-status" name="withdraw" href="">Withdraw</a></li>
                </ul>
            <?php endif; ?>
        <?php endif; ?>

    </div>

    <?php if($complaint->anonymous): ?>
        <h3>Complaint #<?php echo $complaint->id; ?> by Anonymous</h3>

        <?php if(Auth::user()->isReviewer(true)): ?>
            <small class="clearfix pull-right">
                <?php echo link_to_route('overviewUser','Find all anonymous complaints by this user',array('hash' => Hashids::encode($complaint->user_id))); ?>
            </small>
        <?php endif; ?>

    <?php else: ?>
        <h3>Complaint #<?php echo $complaint->id; ?> by <?php echo ApiUser::find($complaint->user_id)->character_name; ?></h3>
    <?php endif; ?>

    <br />

    <dl class="dl-horizontal">
        <dt>Type</dt>
        <dd><?php echo strtoupper($complaint->type); ?></dd>
    </dl>

    <dl class="dl-horizontal">
        <dt>Date</dt>
        <dd><?php echo $complaint->created_at; ?></dd>
    </dl>

    <?php if(!is_null($complaint->severity)): ?>
    <dl class="dl-horizontal">
        <dt>Severity</dt>
        <dd><?php echo $complaint->severity; ?></dd>
    </dl>
    <?php endif; ?>

    <?php if(!is_null($complaint->defendant)): ?>
    <dl class="dl-horizontal">
        <dt>Accused Person</dt>
        <dd><?php echo $complaint->defendant; ?></dd>
    </dl>
    <?php endif; ?>

    <dl class="dl-horizontal">
        <dt>Description</dt>
        <dd><?php echo nl2br($complaint->desc); ?></dd>
    </dl>

    <dl class="dl-horizontal">
        <dt>Should Investigate?</dt>
        <dd>
            <span class="glyphicon <?php echo ($complaint->investigate) ? 'glyphicon-thumbs-up' : 'glyphicon-thumbs-down'; ?>" aria-hidden="true"></span>
        </dd>
    </dl>

    <?php

    $data = unserialize($complaint->data);

    foreach( $data as $key => $val):
            switch($key){
                case 'complaint_outcome':
                    $key = 'Desired outcome';
                    break;
                case 'complaint_killmail':
                    $key = 'Killmail';
                    $killmails = explode("\n", $val );
                    $val = '<ul>';
                    foreach($killmails as $killmail){
                        //poor mans validator...
                        if(preg_match('/^[http|https]:\/\/.+/', $killmail) !== FALSE){
                            $val .= '<li><a href="' . $killmail . '">Killmail</a></li>';
                        } else {
                            $val .= "<li>{$killmail}</li>";
                        }
                    }
                    $val .= '</ul>';
                    break;
                case 'complaint_value_lost':
                    $key = 'Lost value';
                    switch($val){
                        case '25m':
                            $val = '< 25 million ISK';
                            break;
                        case '50m':
                            $val = '25 - 50 million ISK';
                            break;
                        case '100m':
                            $val = '50 - 100 million ISK';
                            break;
                        case '250m':
                            $val = '100 - 250 million ISK';
                            break;
                        case '500m':
                            $val = '250 - 500 million ISK';
                            break;
                        case '999m':
                            $val = '500 - 999 million ISK';
                            break;
                        case '1b':
                            $val = '1 billion ISK +';
                            break;
                    }
                    break;
                case 'complaint_dmg_repair':
                    $key  = 'Repaid?';
                    break;
                case 'complaint_defendant_corp':
                    $key = 'Corp or Alliance';
                    break;
                case 'complaint_lossmail':
                    $key = 'Lossmail';
                    $val = "<a href=\"{$val}\">Klick</a>";
                    break;
                case 'complaint_srp_code':
                    $key = 'SRP Code';
                    break;
                case 'complaint_srp_code':
                    $key = 'SRP Code';
                    break;
            }

            ?>

            <dl class="dl-horizontal">
                <dt><?php echo $key; ?></dt>
                <dd><?php echo nl2br($val); ?></dd>
            </dl>

        <?php endforeach; ?>
</div>