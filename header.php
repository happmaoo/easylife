<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
	<meta charset="utf-8">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
	<link rel="shortcut icon" href="<?php $this->options->themeUrl('style/favicon.ico'); ?>">
	<link rel="stylesheet" media="all" href="<?php $this->options->themeUrl('bootstrap/css/bootstrap.min.css'); ?>"/>
	<link rel="stylesheet" media="all" href="<?php $this->options->themeUrl('style/style.css'); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- 通过自有函数输出HTML头部信息 -->
	<?php $this->header(); ?>
</head>
<body>



<!--#header-->
<div id="header" class="header">
		<!-- Static navbar -->
<div class="navbar navbar-default navbar-fixed-top ex-navbar" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-menu">
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="logo navbar-brand" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
			<a href="javascript:void(0);" class="ex-navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-form"><span class="glyphicon glyphicon-search"></span></a>
			<a href="#" class="ex-navbar-toggle"><span class="glyphicon glyphicon-user"></span></a>
		</div>

		<div class="collapse navbar-collapse navbar-left navbar-collapse-menu">
			<ul class="nav navbar-nav">
				<li><a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
				<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
				<?php while($pages->next()): ?>
				<li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
				<?php endwhile; ?>
			</ul>
		</div>
		<div id="exNotifier" class="collapse navbar-collapse navbar-right hidden-xs" data-toggle="exNotify" data-uid="0" data-popover="#notificationPopover" data-dock="right" data-top="40" data-margin="0">
			<ul class="nav navbar-nav ex-login-navbar">
				<li class="visible-sm"><a href="javascript:void(0);" data-toggle="collapse" data-target=".navbar-collapse-form"><span class="glyphicon glyphicon-search"></span></a></li>
								<!--li class="dropdown"><a href="/account/login">登录</a></li>
				<li class="dropdown">
					<a href="/account/register" class="dropdown-toggle" data-toggle="dropdown" data-hover="exDropdown">注册<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/account/register">注册帐号</a></li>
						<li role="presentation" class="divider"></li>
						<li><a href="/account/loginByQQ">QQ帐号登录</a></li>
						<li><a href="/account/loginByWeibo">微博帐号登录</a></li>
					</ul>
				</li-->
							</ul>
		</div>
		<div style="" class="navbar-collapse navbar-right navbar-collapse-form collapse">
			<form class="navbar-form ex-navbar-form" role="search" action="./" method="post">
				<div class="input-group">
					<input name="s" class="form-control input-sm" placeholder="" value="" type="text">
					<span class="input-group-btn">
						<button class="btn btn-default btn-sm" type="submit"><span class="glyphicon glyphicon-search"></span></button>
					</span>
				</div>
			</form>
		</div><!-- /.navbar-collapse -->
	</div>
</div>
	<!--<div class="header_logoer">
		<div class="container">
			<div class="col-xs-6"><a class="logo" href="/"><h1>技术之家</h1></a></div><div class="other col-xs-6">其他内容</div>
		</div>
	</div>-->
</div>
<!--end #header-->