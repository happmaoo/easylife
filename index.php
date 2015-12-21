<?php
/**
 * easylife 极简生活
 * 
 * @package easylife
 * @author happmaoo
 * @version 1.0
 * @link http://blog.codeinto.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<!--#bodyer-->
<div id="bodyer" class="container">
	<div class="row">
			<div class="col-md-8 bodyer_list">
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
				<?php $this->need('pagebar.php'); ?>
			</div>
		<div class="col-md-4 bodyer_sider">
			<?php $this->need('sidebar.php'); ?>
		</div>
	</div>
</div>
<!--end #bodyer-->
<?php $this->need('footer.php'); ?>
