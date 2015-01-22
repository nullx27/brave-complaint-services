<div class="jumbotron">
    <h2>Ownership Dispute - Station/Moon/Customs Office/System Complaint</h2>
    <p>
        Please describe the nature of you complaint.  Often in alliances that own chunks of space there will be issues of two or more parties disputing who has access to what resource.  Let's try to resolve these issues here and not out in the open where it makes everyone look greedy.
    </p>
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
        <?php echo Form::label('complaint_defendant_corp', 'If this character is representing a corporation or alliance please list here.');?>
        <?php echo Form::text('complaint_defendant_corp', '',
            array('id' => 'complaint_defendant',
                'class' => 'form-control',
                'required' => '',
                'placeholder' => 'Corperation or Alliance Name'
            )
        ); ?>
    </div>

    <div class="form-group">
        <?php echo Form::label('complaint_desc', 'What is the nature of the dispute?');?>
        <?php echo Form::textarea('complaint_desc', '',
            array('id' => 'complaint_desc',
                'class' => 'form-control',
                'required' => '',
                'row' => '3'
            )
        ); ?>
    </div>

    <div class="form-group">
        <?php echo Form::label('complaint_severity', 'Describe the severity of the problem.: 1 for harmless to 10 for crippling');?>

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
        <?php echo Form::label('complaint_outcome', 'What solution do you propose?');?>
        <?php echo Form::textarea('complaint_outcome', '',
            array('id' => 'complaint_outcome',
                'class' => 'form-control',
                'required' => '',
                'row' => '3'
            )
        ); ?>
    </div>

    <div class="form-group">
        <?php echo Form::label('complaint_investigate', 'Would you like for Internal Affairs to investigate further?');?>
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

    <?php echo Form::hidden('complaint_type', 'ownership'); ?>
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