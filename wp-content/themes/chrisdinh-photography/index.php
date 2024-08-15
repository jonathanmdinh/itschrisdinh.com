<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.typekit.net/vxj8oei.css">

    <!-- Nano gallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/nanogallery2/2.4.2/css/nanogallery2.min.css" rel="stylesheet" type="text/css">
    <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/nanogallery2/2.4.2/jquery.nanogallery2.min.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app">
        <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
</body>

</html>
