<div class="clear"></div><div class="w990 clear">
<div style="padding-top: 0;" id="main" class="mt10">
<div style="width:990px;" class="main_l" id="promotions">
<div class="pros_l">
<div class="title">商城促销活动</div>
<ul>
    <li <?php if($cat==0){?> class="sel"<?php } ?>><span class="cate_all"></span><b><a href="?r=promotion/index">全部</a></b></li>
<?php foreach($cate as $v){?>
<li <?php if($cat==$v['id']){?> class="sel"<?php } ?> ><span class="cate_jiadian"></span><a href="?r=promotion/search&cate_id=<?php echo $v['id']?>"><?php echo $v['name']?></a></li>
<?php } ?>
</ul>
</div>

<div class="pros_r">
	    <ol>
        	<?php foreach ($pro as $v){?>	
                <li>
		<div>
		<a target="_blank" class="picborder" href="/end/tp-coupon/index.php?a=out&m=promotion&id=1">
		<img width="318" height="158" border="0" align="right" src="../../backend/web/<?php echo $v['logo']?>" style="max-width:320px; max-height:160px;vertical-align:middle;"></a> 
        <h3><a target="_blank" href="/end/tp-coupon/index.php?a=out&m=promotion&id=1"><?php echo $v['title']?></a></h3>
     
        <p style="font-size:12px;color:#666;"><?php echo $v['description']?></p>
    
        <span class="time-range">所属商家： <a style="font-size:12px;color: #BD0000;text-decoration: underline;" target="_blank" href="/end/tp-coupon/index.php?a=view&m=mall&id=1"><?php echo $v['m_name']?></a></span>   
				
		<span style="margin-left:30px;">截止日期： <?php echo date('Y-m-d ',$v['expiry'])?></span> <span style="margin-left:30px;">详情请<a target="_blank" href="/end/tp-coupon/index.php?a=out&m=promotion&id=1">点击这里</a></span>
        <div style="height:38px;" id="operate">
		<span style="float:left"></span>
		<span style="padding-left:10px;"></span>
		<div style="clear:both"></div>
		</div>
    </div>
<div style="clear:both"></div>
</li> 
                <?php }?>
  
   </ol>
	<ul class="pager"><span class="page_left_1_1">首页</span> <span class="page_left_2_2">上一页</span>  <span class="page_now">1</span> <span class="page_right_2_2">下一页</span> <span class="page_right_1_1">尾页</span></ul>
    </div>

<div class="clear"></div>
</div>
</div>
</div>
