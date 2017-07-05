<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no" />
<?php echo GetHeader(); ?>
<link rel="shortcut icon" id="favicon" href="/favicon.png" />
<link rel="stylesheet" href="css/home.css" /> 
<link rel="stylesheet" href="css/main.css?v=17.24" /> 
<link rel="stylesheet" href="css/animation.css" /> 
<style type="text/css">#intro{padding:0;margin:0;height:0 !important;width:0;overflow:hidden !important;}#intro .logo{float:left;margin:0 10px 10px 0;}
h1, h2 , h3, h4, p, li{ font-family:Arial}
@media screen and (min-width:600px){
<?php
$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=6 or id=7 or id=8 or id=9)");
$i=1;
		while($row = $dosql->GetArray())
		{
		?>
	.slide<?php echo $i; ?>{background-image:url(<?php echo $row['picurl']; ?>);}
	<?php
	$i++;
		}
		?>
		}
		
		@media screen and (max-width:600px){
<?php
$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=46 or id=47 or id=48 or id=49)");
$i=1;
		while($row = $dosql->GetArray())
		{
		?>
	.slide<?php echo $i; ?>{background-image:url(<?php echo $row['picurl']; ?>);}
	<?php
	$i++;
		}
		?>
		}
		
		@media screen and (min-width:600px){
		<?php
$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=11 or id=12 or id=14 or id=16 or id=17 or id=44 or id=45)");
$i=2;
		while($row = $dosql->GetArray())
		{
		?>
	.page<?php echo $i; ?>{background-image:url(<?php echo $row['picurl']; ?>);}
		<?php
	$i++;
		}
		?>
		}
		@media screen and (max-width:600px){
		<?php
$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=50 or id=51 or id=52 or id=53 or id=54 or id=55 or id=56)");
$i=2;
		while($row = $dosql->GetArray())
		{
		?>
	.page<?php echo $i; ?>{background-image:url(<?php echo $row['picurl']; ?>);}
		<?php
	$i++;
		}
		?>
		}
		@media screen and (min-width:1050px){
		#index_x{ display:none}
		}
</style>
</head> 
<script src="js/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function(){
  $("#index_x").click(function(){
    $("#menu").hide();
  });
  $("#index_xs").click(function(){
    $("#menu").show();
  });
});
</script>
<body> 
<header id="header">
		<div class="container clearfix">
			<h1 id="logo"> <?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=1");
		while($row = $dosql->GetArray())
		{
		?><a href="indexen.php"><img alt="logo图片" src="<?php echo $row['picurl']; ?>" /></a><?php
		}
		?></h1>
			<nav>
				<a class="icon_menu" id="index_xs"><img src="img/caidan.png"></a>
				<ul id="menu">

				<li data-menuanchor="page1" class="active"><a data-name="home" href="#page1"><span>Home</span></a></li>
				<?php echo GetNav2(); ?>

				<li style=" width:100%;float:right" id="index_x"><img src="img/close.png" style="padding-right:15px; float:right; margin-top:10px"></li>
				</ul> 
			</nav>
			<div class="nav-tel" style="font-size:16px"><a style="color:#fff" href="index.php">简体中文 </a> | <a href="indexen.php">English</a></div>
		</div>
	</header>
<div class="page-container">
		<section class="section page1">
			<div class="rbslider-container">
				<div class="home-news">
					<span>NEWS:</span>
					<ul>
					<?php
			$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=2 OR parentstr LIKE '%,2,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
		    $dopage->GetPage($sql,5);
				while($row = $dosql->GetArray())
				{
				$clid=$row['classid'];
			if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl2'];
			?>
						<li onclick="location='<?php echo $gourl; ?>'&lang=1"><a href="<?php echo $gourl; ?>&lang=1"><?php echo ReStrLen($row['title2'],20); ?></a></li>
			<?php
			}
			?>
										</ul>
					<a onclick="location='news.php?lang=1'" href="news.php" class="more">more</a>
				</div>
				<div class="rbslider-wrapper">
					<div class="rbslider-slide slide1">
						<div class="slide-content slide-content-1">
							 <?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=2");
		while($row = $dosql->GetArray())
		{
		?>
								<h2><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title11']; ?><b><?php echo $row['title22']; ?></b></a></h2> 
								<p class="intro"><?php echo $row['content2']; ?></p>
								<p class="img"><img alt="<?php echo $row['title11']; ?>" src="<?php echo $row['picurl']; ?>" /></p>
			<?php
			}
			?>
						</div>
					</div>
					<div class="rbslider-slide slide2">
						<div class="slide-content slide-content-2">
						<?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=3");
		while($row = $dosql->GetArray())
		{
		?>
							<h2><?php echo $row['title11']; ?></h2> 
							<h3><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title22']; ?></a></h3>
							<p class="intro"><?php echo $row['content2']; ?></p> 
			<?php
			}
			?>
						</div>
					</div> 
					<div class="rbslider-slide slide3">
						<div class="slide-content slide-content-3">
							<div class="content-box">
							<?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=4");
		while($row = $dosql->GetArray())
		{
		?>
								<h2><?php echo $row['title11']; ?><b><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title22']; ?></a></b></h2> 
								<p class="intro"><?php echo $row['title33']; ?><br /><?php echo $row['content2']; ?></p>
		 <?php
			}
			?>
							</div> 
						</div>
						<div class="background-box"></div> 
					</div>
					<div class="rbslider-slide slide4">
						<div class="slide-content slide-content-4">
						<?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=5");
		while($row = $dosql->GetArray())
		{
		?>
							<h2><?php echo $row['title11']; ?></h2> 
							<h3><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title22']; ?></a></h3>
							<p class="intro"><?php echo $row['content2']; ?></p> 
			<?php
			}
			?>
						</div> 
					</div>					
				</div> 
				<a class="move-down"></a> 
				<div class="rbslider-pagination"></div> 
			</div>
		</section>
		<section class="section page2">
			<div class="section-content-container">
				<hgroup>
					<?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=18");
		while($row = $dosql->GetArray())
		{
		?>
					<h2><?php echo $row['title11']; ?></h2>
					<h3><?php echo $row['title22']; ?></h3>			
			<?php
			}
			?>
				</hgroup>
				<ul class="section-content service-list">
				<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=19");
		while($row = $dosql->GetArray())
		{
		?>
					<li>
						<div class="top brand">
							<h3><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title11']; ?></a></h3>
							<p><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title22']; ?></a></p>
						</div>
						<div class="intro">
						<p><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['content2']; ?></a></p>
						</div>
					</li>
					<style>
					.brand{background-image:url(<?php echo $row['picurl']; ?>);}
					</style>
			<?php
			}
			?>

					<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=20");
		while($row = $dosql->GetArray())
		{
		?>
					<li>
						<div class="top weixin">
							<h3><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title11']; ?></a></h3>
							<p><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title22']; ?></a></p>
						</div>
						<div class="intro">
						<p><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['content2']; ?></a></p>
						</div>
					</li>
					<style>
					.weixin{background-image:url(<?php echo $row['picurl']; ?>);}
					</style>
			<?php
			}
			?>
			<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=21");
		while($row = $dosql->GetArray())
		{
		?>
					<li>
						<div class="top shop">
							<h3><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title11']; ?></a></h3>
							<p><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title22']; ?></a></p>
						</div>
						<div class="intro">
						<p><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['content2']; ?></a></p>
						</div>
					</li>
					<style>
					.shop{background-image:url(<?php echo $row['picurl']; ?>);}
					</style>
			<?php
			}
			?>
			<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=22");
		while($row = $dosql->GetArray())
		{
		?>
					<li>
						<div class="top app">
							<h3><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title11']; ?></a></h3>
							<p><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title22']; ?></a></p>
						</div>
						<div class="intro">
						<p><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['content2']; ?></a></p>
						</div>
					</li>
				<style>
                   .app{background-image:url(<?php echo $row['picurl']; ?>);}
					</style>
			<?php
			}
			?>
				</ul>
			</div> 
		</section>
		<section class="section page3" style="background-position:center bottom;">
			<div class="section-content-container rbslider-item-list-container">
				<hgroup>
				<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=23");
		while($row = $dosql->GetArray())
		{
		?>
					<h2><?php echo $row['title11']; ?></h2>
					<h3><?php echo $row['title22']; ?></h3>
			<?php
			}
			?>
				</hgroup>
				<div class="section-content rbslider-item-list-wrapper case-list">
				<ul class="rbslider-item-list clearfix">
				 <?php
			$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=1 OR parentstr LIKE '%,1,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
		    $dopage->GetPage($sql,3);
				while($row = $dosql->GetArray())
				{
				$clid=$row['classid'];
			if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'show.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'show-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl2'];
			?>
					<li><a href="<?php echo $gourl; ?>&lang=1">
						<div class="img-box">
							<div class="img"><img src="<?php echo $row['picurl']; ?>" alt="<?php echo $row['title2']; ?>" /></div> 
							<div class="ck"></div>
							<div class="cover"></div>  
						</div>
						<div class="intro">
							<div class="intro-content">
								
								<h3><?php echo $row['title2']; ?></h3>
								<p><?php echo $row['keywords']; ?></p>
							</div>
							<div class="cover"></div>
						</div></a>
					</li>	
			<?php
			}
			?>	
					<a onclick="location='case.php?lang=1'" class="wider-more" href="case.php">MORE</a>				
				</ul>
				 <div class="rbslider-pagination"></div>
				</div>
				<div class="navigation case">
					<a class="prev"></a>
					<a class="next"></a>
				</div>
				<div onclick="location='case.php'" class="rbslider-item-list-more">MORE</div>
			</div> 
		</section>
		<section class="section page4" style="background-position:center bottom;">
			<div class="section-content-container">
				<hgroup>
					<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=67");
		while($row = $dosql->GetArray())
		{
		?>
					<h2><?php echo $row['title11']; ?></h2>
					<h3><?php echo $row['title22']; ?></h3>
			<?php
			}
			?>
				</hgroup>
				<div class="section-content">
					<ul class="partner-list clearfix">
					<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=57 or id=58 or id=59 or id=60 or id=61 or id=62 or id=63 or id=64 or id=65 or id=66)");
		while($row = $dosql->GetArray())
		{
		?>
						<li>
							<div class="con">
								<div class="img"><img alt="<?php echo $row['title11']; ?>" src="<?php echo $row['picurl']; ?>" /></div>
								<h4><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title11']; ?></a></h4>
								<p><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title22']; ?></a></p>
							</div> 
							<div class="ck"></div>
						</li>
			<?php
			}
			?>
					</ul>
				</div>
			</div>
		</section>
		<section class="section page5 white">
			<div class="section-content-container rbslider-item-list-container">
				<hgroup>
					<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=35");
		while($row = $dosql->GetArray())
		{
		?>
					<h2><?php echo $row['title11']; ?></h2>
					<h3><?php echo $row['title22']; ?></h3>
			<?php
			}
			?>
				</hgroup>
				<div class="section-content rbslider-item-list-wrapper equipment-list">
					<ul class="rbslider-item-list clearfix">
					<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=36 or id=37 or id=38)");
		while($row = $dosql->GetArray())
		{
		?>
						<li>
							<p><a href="<?php echo $row['linkurl']; ?>"><img alt="<?php echo $row['title11']; ?>" src="<?php echo $row['picurl']; ?>" /></a></p>
							<p class="text">
							<a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title11']; ?><br /><?php echo $row['title22']; ?><br /><?php echo $row['title33']; ?></a>
							</p>
						</li>
			<?php
			}
			?>
					</ul>
				</div>
				<div class="navigation equipment">
					<a class="prev"></a>
					<a class="next"></a>
				</div>
			
			</div>
		</section>
		
		<section class="section page6">
			<div class="section-content-container marketing-content">
				<hgroup>
					<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=68");
		while($row = $dosql->GetArray())
		{
		?>
					<h2><?php echo $row['title11']; ?></h2>
					<h3><?php echo $row['title22']; ?></h3>
			<?php
			}
			?>
				</hgroup>
				<div class="section-content">
					<ul class="marketing_list clearfix">
					<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=69 or id=70 or id=71 or id=72 or id=73 or id=74)");
		while($row = $dosql->GetArray())
		{
		?>
						<li>
							<div class="icon">
								<div class="circular l"></div>
								<div class="circular r"></div>
								<span><img style="margin-top:30px" alt="<?php echo $row['title11']; ?>" src="<?php echo $row['picurl']; ?>" /></span>
							</div>
							<h4><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title11']; ?></a></h4>
							<p class="text">
							<a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title22']; ?><br><?php echo $row['title33']; ?></a></p>
						</li>
		<?php
			}
			?>
					</ul>
				</div> 
			</div> 
		</section>
		
		<section class="section page7">
			<ul class="home-about">
			<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=39 or id=40 or id=41)");
		while($row = $dosql->GetArray())
		{
		?>
				<li>
					<h2><?php echo $row['title11']; ?></h2>
					<div class="con">
					<p><?php echo $row['content2']; ?></p>


					</div>
					<h3 class="bot"><?php echo $row['title22']; ?></h3>
				</li>
			<?php
			}
			?>	
			</ul>
			<ul class="home-about-navi"> 
				<li>Vision</li>
				<li>About</li>
				<li>Honor</li> 
				<li class="bg"></li>
			</ul>
			<div class="home-about-bottom">
				<ul class="clearfix">
					 
					 
					<li><em>100%</em>Hard service every customer</li>
					<li><em>98%</em>Design time through the acceptance</li>
					<li><em>95%</em>Customer renewal rate of more than</li>
				</ul>
			</div>
		</section>
		
		<section class="section page8">
			<div class="home-contact">
				<ul class="clearfix">
				<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=42");
		while($row = $dosql->GetArray())
		{
		?>
					<li class="img"><img src="<?php echo $row['picurl']; ?>" align="微信" /></li>
			<?php
			}
			?>	
					<li class="center">
						<h2><a href="tel:<?php echo $cfg_hotline; ?>" class="联系电话"><?php echo $cfg_hotline; ?></a></h2>
						<p>
						<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=43");
		while($row = $dosql->GetArray())
		{
		?>
<?php echo $row['content2']; ?>
			<?php
			}
			?>	
						</p>
					</li>
				
					<li class="line"></li>
				</ul>
				<div class="clear"></div> 
				 <div style="width:100%; float:left; text-align:center; margin-top:10px; font-size:15px;">友情链接： <?php
	$dosql->Execute("SELECT * FROM `#@__weblink` WHERE classid=1 AND checkinfo=true ORDER BY orderid,id DESC");
	while($row = $dosql->GetArray())
	{
	?>
      <a style="font-family:microsoft yahei" target="_blank" href="<?php echo $row['linkurl']; ?>"><?php echo $row['webname']; ?></a> |	
	  <?php
	}
	?>              </div>
				<div class="kh"><h2><?php echo $cfg_copyright; ?></h2><p style="color: #666; font-size:14px"><a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo $cfg_icp; ?></a></p></div>
			</div>
		</section>
		 
	</div>
	<div id="panel">
		<ul class="icons">
			<li class="up" title="上一页"></li>
			<li class="qq"></li>
			<li class="tel"></li>
			<li class="wx"></li>
			<li class="down" title="下一页"></li>
		</ul> 
		<ul class="info"> 
			<li class="qq">
			<p>在线沟通，请点我<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $cfg_qqcode; ?>&site=qq&menu=yes" target="_blank">在线咨询</a></p>
			</li>
			<li class="tel">
			<p>咨询热线：<br><?php echo $cfg_hotline; ?><br>客服qq：<br><?php echo $cfg_qqcode; ?></p>
			</li>
			<li class="wx"> <div class="img"><?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=10");
		while($row = $dosql->GetArray())
		{
		?><img src="<?php echo $row['picurl']; ?>" /><?php
		}
		?></div> </li>
		</ul>
	</div>
	<div class="index_cy"></div>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script> 
<script type="text/javascript"> 
	$("header nav .icon_menu").click(function(){
		$(this).siblings("ul").toggleClass("show");
	});
	$("#panel .icons li").not(".up,.down").mouseenter(function(){
		$("#panel .info").addClass('hover');
		$("#panel .info li").hide();
		$("#panel .info li."+$(this).attr('class')).show();
	});
	$("#panel").mouseleave(function(){
		$("#panel .info").removeClass('hover');
	})
	$(".icons .up").click(function(){
		$.fn.ronbongpage.moveSectionUp(); 
	});
	$(".icons .down").click(function(){
		$.fn.ronbongpage.moveSectionDown(); 
	});
	 $(".index_cy").click(function(){
	    $("#panel").toggle();
		$(".index_cy").addClass('index_cy2');
		$(".index_cy2").removeClass('index_cy');
	});
</script>
<?php echo $cfg_countcode; ?>
<script type="text/javascript" src="js/home.js"></script>
</body>
</html> 