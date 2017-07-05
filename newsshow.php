<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 2 : intval($cid);
$id  = empty($id)  ? 0 : intval($id);
$lang = empty($lang) ? '0' : intval($lang);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no" />
<?php echo GetHeader(1,$cid,$id); ?>
<link rel="shortcut icon" id="favicon" href="/favicon.png" />
  
<link rel="stylesheet" href="css/main.css?v=17.24" /> 
<link rel="stylesheet" href="css/animation.css" /> 
</head> 
<body class="details-page open">
	  <?php

			//检测文档正确性
			$r = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=$id");
			if(@$r)
			{
			//增加一次点击量
			$dosql->ExecNoneQuery("UPDATE `#@__infoimg` SET hits=hits+1 WHERE id=$id");
			$row = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=$id");
			?>
<div id="main-container">
	<div class="inner-wrap">
		<article>
		<?php if($lang=='0'){ ?>
			<h1><?php echo $row['title']; ?></h1>
			<?php $row2 = $dosql->GetOne("SELECT * FROM `#@__infoclass` WHERE id=$cid"); ?>
			<p class="info">更新时间：<?php echo GetDateTime($row['posttime']); ?><u>•</u>点击：<?php echo $row['hits']; ?> <u>•</u> <?php echo $row2['classname']; ?></p>
			<div class="content"><?php
				if($row['content'] != '')
					echo GetContPage($row['content']);
				else
					echo '网站资料更新中...';
				?></div>
				<?php }else{ ?>
						<h1><?php echo $row['title2']; ?></h1>
			<?php $row2 = $dosql->GetOne("SELECT * FROM `#@__infoclass` WHERE id=$cid"); ?>
			<p class="info">更新时间：<?php echo GetDateTime($row['posttime']); ?><u>•</u>点击：<?php echo $row['hits']; ?> <u>•</u> <?php echo $row2['classname2']; ?></p>
			<div class="content"><?php
				if($row['content'] != '')
					echo GetContPage($row['content2']);
				else
					echo '网站资料更新中...';
				?></div>
				<?php } ?>
			<div class="recommend-news">
				<div class="caption">
					<?php if($lang=='0'){ ?><h3>推荐阅读</h3><?php }else{ ?><h3>Recommended Reading</h3><?php } ?>
				</div> 
				<ul class="items">
				<?php
			$sql2 = "SELECT * FROM `#@__infoimg` WHERE (classid=2 OR parentstr LIKE '%,2,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
		    $dopage->GetPage($sql2,4);
				while($row2 = $dosql->GetArray())
				{
				$clid=$row2['classid'];
			if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row2['classid'].'&id='.$row2['id'];
					else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row2['classid'].'-'.$row2['id'].'-1.html';
					else $gourl = $row2['linkurl'];
			?>
			<?php if($lang=='0'){ ?>
					<li class="clearfix">
						<div class="img">
							<a href="<?php echo $gourl; ?>">
																<img src="<?php echo $row2['picurl']; ?>" alt="<?php echo $row2['title']; ?>" />							</a> 
							<div class="bl"></div>
						</div>  
						 
							<h2><a href="<?php echo $gourl; ?>"><?php echo $row2['title']; ?></a></h2>  
							<p><?php echo GetDateTime($row2['posttime']); ?><u>•</u><i class="icon_lightbulb_alt"></i><?php echo $row2['hits']; ?>  次</p> 
					</li>
					<?php }else{ ?>
								<li class="clearfix">
						<div class="img">
							<a href="<?php echo $gourl; ?>&lang=1">
																<img src="<?php echo $row2['picurl']; ?>" alt="<?php echo $row2['title2']; ?>" />							</a> 
							<div class="bl"></div>
						</div>  
						 
							<h2><a href="<?php echo $gourl; ?>&lang=1"><?php echo $row2['title2']; ?></a></h2>  
							<p><?php echo GetDateTime($row2['posttime']); ?><u>•</u><i class="icon_lightbulb_alt"></i><?php echo $row2['hits']; ?>  次</p> 
					</li>
			<?php
			}}
			?>
					</ul>
			</div>
		</article> 
	</div>
	<ul class="btns">
		<li><a class="up"></a></li>
		<li><a class="tel" href="tel:<?php echo $cfg_hotline; ?>"></a>
			<div class="info"><p>咨询热线<br /><?php echo $cfg_hotline; ?></p></div>
		</li> 
		<li><a class="qq" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $cfg_qqcode; ?>&site=qq&menu=yes" target="_blank"></a>
			<div class="info"><p class="qq">点击我，在线咨询</p></div>
		</li>
	</ul>
</div>
<div class="sub-nav">
	<ul class="btn">
	<?php if($lang=='0'){ ?>
		<li><a href="news.php"><img src="img/home.png"></span><span style="margin-left:5px" class="yc"><?php echo GetCatName(2); ?></span></a></li>
		<?php }else{ ?>
			<li><a href="news.php?lang=1"><img src="img/home.png"></span><span style="margin-left:5px" class="yc"><?php echo GetCatName2(2); ?></span></a></li>
			<?php } ?>
		<?php
	
				//获取上一篇信息
				$r = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE classid=".$row['classid']." AND orderid<".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
				if($r < 1)
				{
				echo '<li>
        	    <a href="#"><span><img src="img/preno.png"></span></a></li>';
				}
				else
				{
					if($cfg_isreurl != 'Y')
						$gourl = 'newsshow.php?cid='.$r['classid'].'&id='.$r['id'];
					else
						$gourl = 'newsshow-'.$r['classid'].'-'.$r['id'].'-1.html';
						if($lang=='0'){
echo ' <li><a href="'.$gourl.'"><span><img src="img/pre.png"></span></span></a></li>';
}else{
echo ' <li><a href="'.$gourl.'&lang=1"><span><img src="img/pre.png"></span></span></a></li>';
}
				}

				//获取下一篇信息
				$r = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE classid=".$row['classid']." AND orderid>".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid ASC");
				if($r < 1)
				{
				echo '<li>
        	    <a href="#"><span><img src="img/nextno.png"></span></a></li>';
				}
				else
				{
					if($cfg_isreurl != 'Y')
						$gourl = 'newsshow.php?cid='.$r['classid'].'&id='.$r['id'];
					else
						$gourl = 'newsshow-'.$r['classid'].'-'.$r['id'].'-1.html';
if($lang=='0'){
					echo ' <li><a href="'.$gourl.'"><span><img src="img/next.png"></span></span></a></li>';
					}else{
					echo ' <li><a href="'.$gourl.'&lang=1"><span><img src="img/next.png"></span></span></a></li>';
					}
				}
				?>
	</ul>
	</div>
<aside class="main">
<h1><?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=1");
		while($row = $dosql->GetArray())
		{
		?><?php if($lang=='0'){ ?><a href="index.php"><?php }else{ ?><a href="indexen.php"><?php } ?><img alt="logo图片" src="<?php echo $row['picurl']; ?>" width="100%" /></a><?php
		}
		?></h1>
		<div style="width:100%; text-align:center; font-weight:bold;"><a  <?php if($lang=='0'){ ?>style="color:#009900"<?php } ?> href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"]; ?>&lang=0">简体中文</a> | <a <?php if($lang=='1'){ ?>style="color:#009900"<?php } ?> href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"]; ?>&lang=1">English</a></div>
<div class="qrcode aside-container"><?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=10");
		while($row = $dosql->GetArray())
		{
		?><img src="<?php echo $row['picurl']; ?>" /><?php
		}
		?>
<p>扫一扫微信二维码<i></i></p>
</div>
<nav class="aside-container">
	<?php if($lang=='0'){ ?>
	<ul>
		<li><a href="index.php">网站首页</a></li>
		<li><a href="case.php"><?php echo GetCatName(1); ?></a></li>
		<li><a class="cur" href="news.php"><?php echo GetCatName(2); ?></a></li>
	</ul>
	<?php }else{ ?>
	<ul>
		<li><a href="indexen.php">Home page</a></li>
		<li><a href="case.php?lang=1"><?php echo GetCatName2(1); ?></a></li>
		<li><a class="cur" href="news.php?lang=1"><?php echo GetCatName2(2); ?></a></li>
	</ul>
	<?php } ?>
</nav>
   	<?php
			}
			?> 
<footer>
<?php echo $cfg_author; ?><br />
<?php echo $cfg_copyright; ?>
</footer>
</aside>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript">
	$(".sub-nav .switch").click(function(){ 
		if($('body').hasClass('open')){
			$(this).attr('data-icon',9);		
			$('body').removeClass('open').addClass('close');
		}else{
			$(this).attr('data-icon',8);
			$('body').removeClass('close').addClass('open');
		}
		
	});
	$(".btns .up").click(function(){ 
		$("html,body").animate({scrollTop:0},600);
	});
	$(".news-cate-dropdown button").click(function(){
		var box=$(".news-cate-dropdown");
		if(box.hasClass("active")){
			box.removeClass("active");
		}else{
			box.addClass('active');
		}
	})
</script>
</body>
</html> 