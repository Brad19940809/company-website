<?php require_once(dirname(__FILE__).'/include/config.inc.php'); 
$cid = empty($cid) ? 1 : intval($cid);
$lang = empty($lang) ? '0' : intval($lang);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no" />
<?php echo GetHeader(1,$cid); ?>
<link rel="shortcut icon" id="favicon" href="/favicon.png" />
  
<link rel="stylesheet" href="css/main.css?v=17.24" /> 
<link rel="stylesheet" href="css/animation.css" /> 
</head> 
<body class="case-page open">
	 
<div id="main-container">
	<div class="inner-wrap">
	  <ul class="cases">
	  <?php
			$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
		    $dopage->GetPage($sql,9);
				while($row = $dosql->GetArray())
				{
				$clid=$row['classid'];
			if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'show.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'show-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
			?>
			<?php if($lang=='0'){ ?>
			<li>
				<div class="case-img">
					<div class="img-box"> 
					<img src="<?php echo $row['picurl']; ?>" alt="<?php echo $row['title']; ?>" />					</div>
					<a class="cover" href="<?php echo $gourl; ?>"></a>
					<div class="ck"></div>
				</div>
				<div class="intro">
					<h2><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?></a></h2> 
					<p><?php echo $row['keywords']; ?></p>
					<a class="cover"></a>
				</div>
			</li>
			<?php }else{ ?>
			<li>
				<div class="case-img">
					<div class="img-box"> 
					<img src="<?php echo $row['picurl']; ?>" alt="<?php echo $row['title2']; ?>" />					</div>
					<a class="cover" href="<?php echo $gourl; ?>&lang=1"></a>
					<div class="ck"></div>
				</div>
				<div class="intro">
					<h2><a href="<?php echo $gourl; ?>&lang=1"><?php echo $row['title2']; ?></a></h2> 
					<p><?php echo $row['keywords']; ?></p>
					<a class="cover"></a>
				</div>
			</li>
			<?php
			}}
			?>
			</ul>
				<?php echo $dopage->GetList(); ?>
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
<?php if($lang=='0'){ ?>
	<div class="news-cate"> 
		<a <?php if($cid==1){ ?>class="cur"<?php }?> href="case.php">全部</a>
		 <?php 
	$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=1 ORDER BY orderid ASC");
	while($row = $dosql->GetArray())
	{
	    $id=$row['id'];
		$classname = $row['classname'];
			 ?>
		<a <?php if($cid==$id){ ?>class="cur"<?php }?> href="case.php?cid=<?php echo $row['id']?>" ><?php echo  $classname; ?></a>
		<?php } ?>
	</div>
	<div class="news-cate-dropdown">
		<button><?php if($cid==1){ ?>全部<?php }else{ ?><?php echo GetCatName($cid); ?><?php } ?> V</button>
		<ul>
			<li><a href="case.php">全部</a></li>
			 <?php 
	$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=1 ORDER BY orderid ASC");
	while($row = $dosql->GetArray())
	{
	    $id=$row['id'];
		$classname = $row['classname'];
			 ?>
			<li><a href="case.php?cid=<?php echo $row['id']?>"><?php echo  $classname; ?></a></li>
			<?php } ?>
				</ul>
	</div>
<?php }else{ ?>
	<div class="news-cate"> 
		<a <?php if($cid==1){ ?>class="cur"<?php }?> href="case.php?lang=1">All</a>
		 <?php 
	$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=1 ORDER BY orderid ASC");
	while($row = $dosql->GetArray())
	{
	    $id=$row['id'];
		$classname2 = $row['classname2'];
			 ?>
		<a <?php if($cid==$id){ ?>class="cur"<?php }?> href="case.php?cid=<?php echo $row['id']?>&lang=1" ><?php echo  $classname2; ?></a>
		<?php } ?>
	</div>
	<div class="news-cate-dropdown">
		<button><?php if($cid==1){ ?>All<?php }else{ ?><?php echo GetCatName2($cid); ?><?php } ?> V</button>
		<ul>
			<li><a href="case.php?lang=1">All</a></li>
			 <?php 
	$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=1 ORDER BY orderid ASC");
	while($row = $dosql->GetArray())
	{
	    $id=$row['id'];
		$classname = $row['classname'];
			 ?>
			<li><a href="case.php?cid=<?php echo $row['id']?>&lang=1"><?php echo  $classname2; ?></a></li>
			<?php } ?>
				</ul>
	</div>
	<?php } ?>
</div>

<aside class="main">
<h1><?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=1");
		while($row = $dosql->GetArray())
		{
		?><?php if($lang=='0'){ ?><a href="index.php"><?php }else{ ?><a href="indexen.php"><?php } ?><img alt="logo图片" src="<?php echo $row['picurl']; ?>" width="100%" /></a><?php
		}
		?></h1>
		<div style="width:100%; text-align:center; font-weight:bold"><a  <?php if($lang=='0'){ ?>style="color:#009900"<?php } ?> href="?lang=0">简体中文</a> | <a <?php if($lang=='1'){ ?>style="color:#009900"<?php } ?> href="?lang=1">English</a></div>
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
		<li><a class="cur" href="case.php"><?php echo GetCatName(1); ?></a></li>
		<li><a href="news.php"><?php echo GetCatName(2); ?></a></li>
	</ul>
	<?php }else{ ?>
	<ul>
		<li><a href="indexen.php">Home page</a></li>
		<li><a class="cur" href="case.php?lang=1"><?php echo GetCatName2(1); ?></a></li>
		<li><a href="news.php?lang=1"><?php echo GetCatName2(2); ?></a></li>
	</ul>
	<?php } ?>
</nav>
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