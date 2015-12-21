<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<!--#bodyer-->
<div id="bodyer" class="container">
	<div class="row">
			<div class="col-md-8 bodyer_list">
				<h3 class="archive_title"><?php $this->archiveTitle(array(
			'category'  =>  _t('分类 %s 下的文章'),
			'search'	=>  _t('包含关键字 %s 的文章'),
			'tag'	   =>  _t('标签 %s 下的文章'),
			'author'	=>  _t('%s 发布的文章')
		), '', ''); ?></h3>
				<?php if ($this->have()): ?>
				<?php while($this->next()): ?>
					<article class="article_main list_box">
						<dl class="article_list_box2">
							<dt><a class="article_list_title" href="<?php $this->permalink() ?>"><h1><?php $this->title() ?></h1></a></dt>
							<dd class="article_list_info">
								<span class="glyphicon glyphicon-time"></span><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d'); ?></time> | 
								<span class="glyphicon glyphicon-comment"></span><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('没有评论', '1 条评论', '%d 条评论'); ?></a>
							</dd>
							<dd	class="thumbnail"><img src="<?php @thumbnail($this); ?>" alt="<?php $this->title() ?>"></dd>
							<dd class="article_list_txt">
								<?php @summary($this); ?>
							</dd>
						</dl>
					</article>
					<?php endwhile; ?>
					<?php else: ?>
						<article class="article_main list_box">
							<h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
						</article>
					<?php endif; ?>
				<?php $this->need('pagebar.php'); ?>
			</div>
		<div class="col-md-4 bodyer_sider">
			<?php $this->need('sidebar.php'); ?>
		</div>
	</div>
</div>
<!--end #bodyer-->
<?php $this->need('footer.php'); ?>
