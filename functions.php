<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array(
    'ShowCategory' => _t('显示分类'),
    'ShowTags' => _t('显示Tags'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowCategory','ShowTags', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
    
    $ac = new Typecho_Widget_Helper_Form_Element_Textarea('ac', NULL, "Codeinto,发现代码的乐趣。", _t('站点公告'), _t('支持HTML代码。'));
    $form->addInput($ac);


    //-------------------------- ads -----------------------------------------
    $ad_txt_1 = <<<EOF
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- contentPage -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9592953235994353"
     data-ad-slot="5589186549"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
EOF;
	$ad_1 = new Typecho_Widget_Helper_Form_Element_Textarea('ad_1', NULL, $ad_txt_1, _t('ad_1'), _t('调用方法:echo ($this->options->ad_1) 下同'));
	$form->addInput($ad_1);
	
    $ad_txt_2 = <<<EOF
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- contentPage -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9592953235994353"
     data-ad-slot="5589186549"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
EOF;
	$ad_2 = new Typecho_Widget_Helper_Form_Element_Textarea('ad_2', NULL, $ad_txt_1, _t('ad_2'), _t(''));
	$form->addInput($ad_2);
}



//--获取主题目录--
global $themeDir;
$themeDir = dirname(__FILE__);
$themeDir = preg_replace("/\\\/i", "/",dirname(__FILE__));
preg_match_all('/\/usr.*/im', $themeDir, $m);
$themeDir = $m[0][0];




//---例如24小时内发布的贴，需要一个标志来完成。这里是用判断输入特殊字符，再用CSS判断完成的。此代码由羽飞儿老师编写，案例可参考：
//------------------------------------------------------------------

function isNewPost($a){
$now = new Typecho_Date(Typecho_Date::gmtTime());
if($now->timeStamp-$a->date->timeStamp < 24*60*60){
	echo '<span class="new"></span>';
}
}
/*以上代码，加入到 functions.php 中，然后，在 index.php 中使用：<?php isNewPost($this);?>


注：这样就会输出一个new的文字，可应用于class里，然后，自定义输出背景图片等。*/






//----文章摘要-----------------
function summary($txt){
//去除图片防止和缩略图重复显示。
$html = preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/im',"", $txt->content);
preg_match_all('/<p>.*?<\/p>/im', $html, $m);

//print_r ($m[0]);

//如果有一个以上的p
if(count($m[0])>0){
//echo('-第一个P字符串长度-'.strlen($m[0][0]).'<hr>');
	
	//如果第一个p字数小于200
	if(strlen($m[0][0])<200){
	//则输出第一个p+第二个p  (如果没有第二个p php好像会自动忽略)
	echo($m[0][0].$m[0][1]);
	}
	else{
	//输出第一个p
	echo($m[0][0]);
	}

}
else{
//echo('没有找到p，输出摘要：<hr>');
$txt->excerpt(300, '...');
}
//echo('<hr>-数量'.count($m[0]));



}

//-------提取第一幅图片作为缩略图--------
function thumbnail($img){

$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
$content = $img->content;
preg_match_all($pattern,$content,$matchContent);
if(isset($matchContent[1][0]))
$temp=$matchContent[1][0];
else
$temp="/usr/themes/easylife/style/nothumb.png";
echo $temp;
}
/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/
