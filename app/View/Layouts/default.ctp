<?php
/**
 * Backlog management
 *
 * @since         2012-12-04
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title_for_layout ?></title>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>

    <style type="text/css">
/* Sticky footer styles
-------------------------------------------------- */

html, body {
    height: 100%;
    /* The html and body elements cannot have any padding or margin. */
}

/* Wrapper for page content to push down footer */
#wrap {
    min-height: 100%;
    height: auto !important;
    height: 100%;
    /* Negative indent footer by it's height */
    margin: 0 auto -60px;
}

/* Set the fixed height of the footer here */
#push, #footer {
    height: 60px;
}
#footer {
    background-color: #f5f5f5;
}

/* Lastly, apply responsive CSS fixes as necessary */
@media (max-width: 767px) {
    #footer {
        margin-left: -24px;
        margin-right: -24px;
        padding-left: 24px;
        padding-right: 24px;
    }
}
    </style>

    <?php echo $this->fetch('meta').PHP_EOL ?>
    <?php echo $this->fetch('css').PHP_EOL ?>
    <?php echo $this->fetch('script').PHP_EOL ?>
</head>
<body>
    <div id="wrap">
        <div class="container">

            <div class="page-header">
                <h1><?php echo h($title_for_layout) ?></h1>
            </div>

            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>

        </div>
    </div>

    <?php echo $this->element('sql_dump'); ?>
</body>
</html>

