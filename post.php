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
					<span class="glyphicon glyphicon-book" aria-hidden="true"></span><?php $this->category(','); ?> | 
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
				<div class="article_copyright alert alert-success" role="alert">本文由 <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a> 创作，若无特别说明，本博客文章均为原创，原则上这些文章不允许转载，但是如果阁下是出于研究学习目的可以转载到阁下的个人博客或者主页，转载请遵循<a rel="nofollow" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.zh">创作共同性“署名-非商业性使用-相同方式共享”原则</a>，请转载时<strong>注明</strong><dfn title="<?php $this->author(); ?>">作者</dfn>和<dfn title="<?php $this->permalink(); ?>">出处</dfn>，<strong>谢绝</strong>商业性、非署名、采集站、垃圾站或者纯粹为了流量的转载。谢谢合作！</div>
				<div class="article_tools_share"></div>
				<?php $this->related(5)->to($relatedPosts); ?>
				<?php if ($relatedPosts->have()): ?>
				<div class="article_tools_xg panel panel-primary">
					<h5 class="panel-heading">相关文章</h5>
					<ul class="panel-body widget_list">
				<?php while ($relatedPosts->next()): ?>
					<li><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
				<?php endwhile; ?>
					</ul>
				</div>
				<?php else : ?>
				<?php endif; ?>
				<nav class="article_nav">
					<p class="">
							<i class="glyphicon glyphicon-chevron-up">上一篇文章:</i><?php $this->thePrev('%s','没有了'); ?>
					</p>
					<p class="">
							<i class="glyphicon glyphicon-chevron-down">下一篇文章:</i><?php $this->theNext('%s','没有了'); ?>
					</p>
				</nav>
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
