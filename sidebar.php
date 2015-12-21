<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
	<dl class="panel panel-default">
	<dt class="panel-heading"><span class="glyphicon glyphicon-book"></span>分类</dt>
	<dd class="panel-body">
		<?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
	</dd>
	</dl>
<?php endif; ?>

<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTags', $this->options->sidebarBlock)): ?>
	<dl class="panel panel-default tagsCloud">
	<dt class="panel-heading"><span class="glyphicon glyphicon-tags"></span>TAGS</dt>
	<dd class="panel-body">
		<?php $this->widget('Widget_Metas_Tag_Cloud')->parse('<a class="" href="{permalink}">{name}<sup>{count}</sup></a>'); ?>
	</dd>
	</dl>
<?php endif; ?>

<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
	<dl class="panel panel-default">
	<dt class="panel-heading"><span class="glyphicon glyphicon-calendar"></span>归档</dt>
	<dd class="panel-body">
		<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=m月 / Y')->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
	</dd>
	</dl>
<?php endif; ?>

<?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<dl class="panel panel-default">
	<dt class="panel-heading"><span class="glyphicon glyphicon-option-horizontal"></span>其他</dt>
	<dd class="panel-body">
	<ul>
		<?php if($this->user->hasLogin()): ?>
			<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
			<li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
		<?php else: ?>
			<li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
		<?php endif; ?>
		<li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
		<li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
		<li><a href="http://www.typecho.org">Typecho</a></li>
	</ul>
	</dd>
	</dl>
<?php endif; ?>



<!-- end #sidebar -->
