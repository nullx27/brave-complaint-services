<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BRAVE Complaint Service</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=URL::asset('img/logo_swarm.png');?>" type="image/png" />
    <link rel="shortcut icon" href="<?=URL::asset('img/logo_swarm.png');?>" type="image/png" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?=URL::asset('css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?=URL::asset('css/tablecloth.css')?>">
    <link rel="stylesheet" href="<?=URL::asset('css/prettify.css')?>">
    <link rel="stylesheet" href="<?=URL::asset('css/style.css')?>">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.css" />


</head>
<body>

<div id="wrap">

    <?php echo $navigation; ?>

    <?php if(!App::environment('production')): ?>
        <div class="alert alert-danger" role="alert" style="text-align: center">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Notice:</span>
            This is a DEMO System!
        </div>
    <?php endif; ?>

    <div class="container content">
        <?php if(isset($filter)) echo $filter; ?>

        <?php echo $content; ?>

        <?php if(isset($comments_html)) echo $comments_html; ?>
        <?php if(isset($comment_form)) echo $comment_form; ?>
    </div>

</div>

<?php echo $footer; ?>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="<?=URL::asset('js/bootstrap.min.js')?>"></script>
<script src="<?=URL::asset('js/jquery.metadata.js')?>"></script>
<script src="<?=URL::asset('js/jquery.tablesorter.js')?>"></script>
<script src="<?=URL::asset('js/jquery.tablecloth.js')?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.js"></script>
<script src="<?=URL::asset('js/script.js')?>"></script>


</body>
</html>