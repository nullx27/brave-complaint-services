<div class="jumbotron">
    <h2>Awoxing (blue on blue shooting) Complaint</h2>
    <p>Blue on blue shooting does happen.  It's fine when it's consensual - as in a duel or a sacrifice at the sun - but it is not fine if the other party does not consent.
        Repeated awoxing or the targeted awoxing of a high-value target will result in expulsion from the alliance and your character name and any alts being added to the recruitment ban list.
        Alliance policy on awoxing is 100% SRP with an additional 50% inconvenience fee that goes towards the replacement of any ship lost that is to be paid by the offender.</p>
</div>

<?php echo Form::open(array('route' => array('submit'), 'class'=>'complaint_form'))?>

    <div class="form-group">
        <?php echo Form::label('complaint_defendant', 'Who are you filing this complaint against?');?>
        <?php echo Form::text('complaint_defendant', '',
            array('id' => 'complaint_defendant',
                'class' => 'form-control',
                'required' => '',
                'placeholder' => 'Character Name'
            )
        ); ?>
    </div>


    <div class="form-group">
        <?php echo Form::label('complaint_killmail', 'Link the kill mails here.');?>
        <?php echo Form::textarea('complaint_killmail', '',
            array('id' => 'complaint_killmail',
                'class' => 'form-control',
                'required' => '',
                'row' => '3'
            )
        ); ?>
        <span id="helpBlock" class="help-block">One link per line please.</span>
    </div>


    <div class="form-group">
        <?php echo Form::label('complaint_desc', 'Describe the nature of the incident.');?>
        <?php echo Form::textarea('complaint_desc', '',
            array('id' => 'complaint_desc',
                'class' => 'form-control',
                'required' => '',
                'row' => '3'
            )
        ); ?>
        <span id="helpBlock" class="help-block">Do not link killmails here.</span>
    </div>

    <div class="form-group">
        <?php echo Form::label('complaint_severity', 'Describe the severity of the problem.: 1 for harmless to 10 for blatent bullying');?>

        <br />
        <label class="radio-inline">
            <?php echo Form::radio('complaint_severity', '1', false, array('id' => 'severity_1')); ?> 1
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_severity', '2', false, array('id' => 'severity_2')); ?> 2
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_severity', '3', false, array('id' => 'severity_3')); ?> 3
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_severity', '4', false, array('id' => 'severity_4')); ?> 4
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_severity', '5', false, array('id' => 'severity_5')); ?> 5
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_severity', '6', false, array('id' => 'severity_6')); ?> 6
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_severity', '7', false, array('id' => 'severity_7')); ?> 7
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_severity', '8', false, array('id' => 'severity_8')); ?> 8
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_severity', '9', false, array('id' => 'severity_9')); ?> 9
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_severity', '10', false, array('id' => 'severity_10')); ?> 10
        </label>
    </div>

    <div class="form-group">
        <p><b>What is the total value of items lost?</b></p>
        <span id="helpBlock" class="help-block">Estimate</span>

        <label class="radio-inline">
            <?php echo Form::radio('complaint_value_lost', '25m', false, array('id' => 'complaint_value_lost_25m')); ?>
            25 million ISK
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_value_lost', '50m', false, array('id' => 'complaint_value_lost_50m')); ?>
            25 - 50 million ISK
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_value_lost', '100m', false, array('id' => 'complaint_value_lost_100m')); ?>
            50 - 100 million ISK
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_value_lost', '250m', false, array('id' => 'complaint_value_lost_250m')); ?>
            100 - 250 million ISK
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_value_lost', '500m', false, array('id' => 'complaint_value_lost_500m')); ?>
            250 - 500 million ISK
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_value_lost', '999m', false, array('id' => 'complaint_value_lost_999m')); ?>
            500 - 999 million ISK
        </label>
        <label class="radio-inline">
            <?php echo Form::radio('complaint_value_lost', '1b', false, array('id' => 'complaint_value_lost_1b')); ?>
            1 billion ISK +
        </label>
    </div>

    <div class="form-group">
        <p><b>Has the value of the items lost been repaid in any shape or form?</b></p>

        <div class="radio">
            <label>
                <?php echo Form::radio('complaint_dmg_repair', 'Yes', false, array('id' => 'complaint_dmg_repair_yes')); ?>
                Yes
            </label>
        </div>
        <div class="radio">
            <label>
                <?php echo Form::radio('complaint_dmg_repair', 'No', false, array('id' => 'complaint_dmg_repair_no')); ?>
                No
            </label>
        </div>

        <div class="radio">
            <label>
                <?php echo Form::radio('complaint_dmg_repair', 'Partially', false, array('id' => 'complaint_dmg_repair_partially')); ?>
                Partially
            </label>
        </div>
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

    <?php echo Form::hidden('complaint_type', 'awoxing'); ?>

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