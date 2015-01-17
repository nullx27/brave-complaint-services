<div class="jumbotron">
    <h1>Greetings!</h1>
    <p>
        Thank you for using Brave Collective Internal Affairs complaint and conflict resolution form.  We believe this is the best way to resolve problems and issues within an alliance the size of the Brave Collective and as such we will try our best to work with you to make sure you problem is resolved. Please fill out this form as thoroughly as you can.  An internal affairs officer will contact you within 24 hours of your request being submitted.
        If this is an emergency you can contact x, y, or z with a mail subject line: Internal Affairs Emergency.</p>

    <?php
    if (Session::has('flash_error'))
    {
        ?>
        <div id="flash_error" class="alert alert-danger"><?=Session::get('flash_error')?></div>
    <?php
    }
    ?>

    <?php echo Form::open(array('route' => array('loginaction')))?>
        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Click Here to Authorize</button>
        </div>
    </form>
</div>
