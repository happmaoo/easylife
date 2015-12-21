<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<!--#bodyer-->
<div id="bodyer" class="container">
	<div class="row">
		<div class="col-md-8 bodyer_txt">
			<article class="article_main">
				<div class="article_header">
					<h1><?php $this->title() ?></h1>
					<ul class="article_info">
					<span class="glyphicon glyphicon-time" aria-hidden="true"></span><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d'); ?></time> | 
					<span class="glyphicon glyphicon-comment" aria-hidden="true"></span><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('没有评论', '1 条评论', '%d 条评论'); ?></a>
					</ul>
				</div>
				<div class="article_content txt_content">
					<?php $this->content(); ?>
				</div>
					<ul class="article_info2">
						<li class="tags">
							<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
							<?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?>
						</li>
					</ul>
			<div class="article_tools_share"></div>
			</article>
			<div id="comments">
				<?php $this->need('comments.php'); ?>
			</div>
		</div>
		<div class="col-md-4 bodyer_sider">
			<?php $this->need('sidebar.php'); ?>
		</div>
	</div>
</div>
<!--end #bodyer-->

<?php $this->need('footer.php'); ?>
