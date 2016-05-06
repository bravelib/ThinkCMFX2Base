<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/ThinkCMFX2/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/ThinkCMFX2/public/simpleboot/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/ThinkCMFX2/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/ThinkCMFX2/public/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="/ThinkCMFX2/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/ThinkCMFX2/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/ThinkCMFX2/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/ThinkCMFX2/",
    JS_ROOT: "public/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/ThinkCMFX2/public/js/jquery.js"></script>
    <script src="/ThinkCMFX2/public/js/wind.js"></script>
    <script src="/ThinkCMFX2/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<style>
    li {
        list-style: none;
    }
</style>
</head>
<body>
<div class="wrap">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <?php echo ($msgTitle); ?>
                </div>
                <div class="panel-body">
                    <?php echo ($message); ?>
                </div>
                <div class="panel-footer">
                    <a href="<?php echo ($jumpUrl); ?>" class="btn btn-default">返回</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/ThinkCMFX2/public/js/common.js"></script>
<script>
    setTimeout(function () {
        parent.location.href = '<?php echo ($jumpUrl); ?>';
    }, 3000);
</script>
</body>
</html>