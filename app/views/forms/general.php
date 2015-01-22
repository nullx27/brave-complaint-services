<div class="jumbotron">
    <h2>General Classiness and Rudeness Complaint</h2>
    <p>
        There are a variety of different complaints that fit this category but overall this is designed to be a complaint against one player using derogatory, inflammatory, or unclassy behavior towards another player.  The Brave Collective has a "Stay Classy" rule that was started by the founder Matias Otero which you can read about <b>
            <a href="http://www.reddit.com/r/Bravenewbies/comments/1c2vw4/on_the_subject_of_manners_and_other_thoughts/">here</a></b>.
        We ask that you be respectful and consider that people have different standards for what they view as appropriate remarks.  This is a very diverse organization and what may offend someone on one part of the globe might not offend somebody on the other side.  Still, we need to be mindful and that's what this form is here to do.
        As a precursor,there are also terms that have existed in Eve Online and will continue to exist like the term "Jew Fleet" (a money making fleet) or "rape cage" (when something like a station or pos is completely bubbled and the defender cannot get out) or "sperging" which is often used to describe Brave Lobby comms and is a derogatory way of describing loud chatter on comms by taking a swipe at autism.
        We in the Internal Affairs department would like to acknowledge that while we cannot change the larger culture of Eve Online, we can enforce strict standards to protect you against homophobia, racism, sexism, xenophobia and various forms of in-game bullying within the Brave Collective.
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
        <?php echo Form::label('complaint_desc', 'Describe the nature of the incident.');?>
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
        <?php echo Form::label('complaint_severity_label', 'Describe the severity of the problem.: 1 for harmless to 10 for blatent bullying');?>
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

    <br />

    <div class="form-group">
        <?php echo Form::label('complaint_outcome', 'What is the desired outcome you would like to see as a result of this inquiry?');?>
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

    <?php echo Form::hidden('complaint_type', 'general'); ?>
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