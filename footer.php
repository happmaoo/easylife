<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--#footer-->
<div id="footer">
	<div class="footer_content">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<span class="glyphicon glyphicon-th-list"></span><h4>最近文章</h4>
				<ul>
				<?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
				</ul>
			</div>
			<div class="col-md-4">
				<span class="glyphicon glyphicon-comment"></span><h4>最近评论</h4>
		        <ul>
		        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
		        <?php while($comments->next()): ?>
		            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
		        <?php endwhile; ?>
		        </ul>
			</div>
			<div class="col-md-4">
				<span class="glyphicon glyphicon-comment"></span><h4>RSS订阅</h4>
				<ul>
					<li><a class="atom" href="<?php $this->options->siteUrl(); ?>feed">RSS</a></li>
				</ul>
			</div>
		</div>
	</div>
	</div>
	<div class="footer_copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-xs-12">
					<div class="logo_f"></div>
				</div>
				<div class="col-md-4 col-xs-12">
					<div class="f_info"><p>Codeinto，发现代码的乐趣。</p><p>（今天开始，遵循自己的内心，抛开一切，去做自己喜欢的事情，遵循自己的内心，那才是你努力的方向。）</p></div>
				</div>
				<div class="col-md-2 col-xs-6">
					<h4>帮助和支持</h4>
					<ul>
						<li><a href="<?php $this->options->siteUrl(); ?>about.html#aboutme">关于我</a></li>
						<li><a href="<?php $this->options->siteUrl(); ?>about.html#contact">联系我</a></li>
						<li><a href="<?php $this->options->siteUrl(); ?>about.html#donate">赞助我</a></li>
						<li><a href="<?php $this->options->siteUrl(); ?>suggestion.html#">提意见</a></li>
						<li><a href="<?php $this->options->siteUrl(); ?>about.html#advertisement">广告合作</a></li>
					</ul>
				</div>
				<div class="col-md-2 col-xs-6">
					<h4>步行地图</h4>
					<ul>
						<li><a href="#">注册</a></li>
						<li><a href="#">登录</a></li>
						<li><a href="#">分类</a></li>
						<li><a href="#">Tags</a></li>
					</ul>
				</div>
				<div class="col-md-2 follow col-xs-12">
					<h4>关注我们</h4>
					<ul>
						<li class="wb"><a href="http://weibo.com/happmaoo" title="微博">微博</a></li>
						<li class="wx"><a href="javascript:void(0);" title="关注我们的" role="button" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="微信号:happmaoo">微信</a></li>
						<li class="tw"><a href="https://twitter.com/happmaoo" title="Twitter">Twitter</a></li>
					</ul>
				</div>
			</div>
			<div class="copyright">&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>. Theme Easylife By <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>. <?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>.</div>
		</div>
	</div>
</div>
<!--end #footer-->

<script src="<?php $this->options->themeUrl('script/jquery-2.1.3.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('script/m.js'); ?>"></script>
<!--CNZZ--><div style="display:none"><script type="text/javascript" src="http://s4.cnzz.com/stat.php?id=1257007321&web_id=1257007321"></script></div>

<?php $this->footer(); ?>
</body>
</html>
