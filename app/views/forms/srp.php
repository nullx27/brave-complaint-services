<div class="jumbotron">
    <h2>Ship Replacement Program Complaint</h2>
    <p>
        Sometimes things get messed up when it comes to dealing with alliance SRP.
        While we try to make this process as expedient as possible, if you have not received your SRP within 1 week of loss
        or you have been told that your ship wasn't going to be SRP'd after you thought it was then this is the right place
        to try and resolve your issues.
    </p>
</div>

<?php echo Form::open(array('route' => array('submit'), 'class'=>'complaint_form'))?>

    <div class="form-group">
        <?php echo Form::label('complaint_lossmail', 'Link your lossmail.');?>
        <?php echo Form::text('complaint_lossmail', '',
            array('id' => 'complaint_lossmail',
                'class' => 'form-control',
                'required' => '',
            )
        ); ?>
        <span id="helpBlock" class="help-block">Just your lossmail.</span>
    </div>

    <div class="form-group">
        <?php echo Form::label('complaint_srp_code', 'What was the SRP code for the fleet you flew under?');?>
        <?php echo Form::text('complaint_srp_code', '',
            array('id' => 'complaint_srp_code',
                'class' => 'form-control',
                'required' => '',
            )
        ); ?>
    </div>

    <div class="form-group">
        <?php echo Form::label('complaint_desc', 'If you SRP was denied due to an improper fitting please explain.');?>
        <?php echo Form::textarea('complaint_desc', '',
            array('id' => 'complaint_desc',
                'class' => 'form-control',
                'required' => '',
                'row' => '3'
            )
        ); ?>
        <span id="helpBlock" class="help-block">Paste any chat logs you have or audio links.</span>
    </div>

    <div class="form-group">
        <?php echo Form::label('complaint_outcome', 'Would you like for Internal Affairs to investigate further?');?>
        <div class="radio">

            <label>
                <?php echo Form::radio('complaint_investigate', 'Yes', false, array('id' => 'complaint_investigate_yes')); ?>
                Yes, please investigate further.
            </label>
        </div>
        <div class="radio">
            <label>
                <?php echo Form::radio('complaint_investigate', 'No', false, array('id' => 'complaint_investigate_yes')); ?>
                No. Just thought you should know.
            </label>
        </div>
        <span id="helpBlock" class="help-block">It's totally okay if you do not need the help of internal affairs. We like hearing from you either way!</span>
    </div>

    <?php echo Form::hidden('complaint_type', 'srp'); ?>
    <?php echo Form::hidden('complaint_submitted', 'user', array('class' => 'complaint_submitted')); ?>

    <div class="form-group">
        <div class="btn-group dropup pull-right">
            <button type="button" class="col-sm-10 btn btn-lg btn-primary submit-btn" value="user">Submit as <?php echo Auth::user()->character_name; ?></button>
            <button type="button" class="col-sm-2 btn btn-lg btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu btn-block" role="menu">
                <li><a href="#" class="submit-btn-link" data-type="user"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo Auth::user()->character_name; ?></a></li>
                <li class="divider"></li>
                <li><a href="#" class="submit-btn-link" data-type="anon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Anonymous</a></li>
            </ul>
        </div>
    </div>
</form>