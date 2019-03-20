## 轮播
```
{!! vv(7, 15, '<li><a title="@$title@" href="@$linkurl@" target="_blank"><img src="__IMG__"></a></li>'); !!}
{!! vv_data($ktv->getQuYu(), '<a href="/web/ktv/quyu/@$title@">@$title@</a>') !!}
```
# # 标签切换
```
@foreach(M('news')->field('id,title,ftitle,img1')->where('id in('.$view->relative.')')->order(config('other.order'))->select() as $row)
<li>
    <a class="organise-img" href="{{v_url($row['id'], 'cases')}}">
        <img src="{{src($row['img1'])}}" />
        <div class="case-cover"></div>
    </a>
    <div class="organise-mess">
        <p>{{$row['title']}}</p>
        <span>{{$row['ftitle']}}</span>
    </div>
</li>
@endforeach
```
单一内容
```
{{cutstr($data['content'], 250)}}
{!! $data['content'] !!}
```
友情链接
```
{!! vv(5, 13, '<p><a style="color:rgb(133, 145, 147)" title="@$title@" href="@$linkurl@" target="_blank">@$title@</a></p>') !!}
```
常用变量
```
{{$system_sitename}}
{{$system_logo1}}
{{$system_img1}}
{{$system_phone}}
{{$system_email}}
{{$system_img1}}
{{$system_address}}
{{$system_sitename}}
{{$system_link1}}
{{$system_link2}}
{{$system_copyright}} {!!$system_copyright!!}


{!! htmlspecialchars_decode($data['content']) !!}

```
首页
```
列表第一个 多个情况
@foreach(v_data(3,13,'id,img1,title,content', 8) as $key=>$row)
@if($key==0)
<div class="pic">
	<a href="{{v_url($row['id'])}}" style="background-image: url({{src($row['img1'])}});">
		<img width="368px" height="199px" src="{{src($row['img1'])}}" alt="">
	</a>
</div>
@elseif($key==1)
<ul class="m-list2">
@elseif($loop->last)
</ul>
@else
	<li><a href="{{v_url($row['id'])}}">{{cutstr($row['title'], 50)}}</a></li>
@endif
@endforeach

    @foreach(v_data(30,31,'id,img1,sendtime,title,content,introduce', 4) as $key=>$row)
    @if($key==0)
    <div class="left-box fl">
        <div class="news-img"><a href="javascript:;"><img src="{{src(v_news(6,-32,'img1'))}}"></a> </div>
        <div class="news-title"><a href="/web/detail?id=<?=$row['id']?>"><?=cutstr($row['title'], 50)?></a></div>
        <div class="first-list">
            <div class="date">
                <span class="year"><?=date('Y', $row['sendtime'])?></span>
                <span class="month"><?=date('m-d', $row['sendtime'])?></span>
            </div>
            <p><?=$row['introduce'] ? $row['introduce'] : cutstr($row['content'], 50)?></p>
        </div>
    </div>
    <div class="right-box fr">
        <ul>
    @else
        <li>
            <a href="/web/detail?id=<?=$row['id']?>">
                <div class="date">
                    <span class="year"><?=date('Y', $row['sendtime'])?></span>
                    <span class="month"><?=date('m-d', $row['sendtime'])?></span>
                </div>
                <p class="title"><?=cutstr($row['title'], 50)?></p>
                <p class="intro"><?=$row['introduce'] ? $row['introduce'] : cutstr($row['content'], 50)?></p>
            </a>
        </li>
    @endif
@endforeach
轮播
vv(6, 13, '<li><a title="@$title@" href="@$linkurl@" target="_blank"><img src="__IMG__"></a></li>');
```
详情
```
1
{!! htmlspecialchars_decode($data['content']) !!}
2
{{cutstr(v_news(4, -15, 'content'), 250)}}
{!! pc_lefts() !!}
{!! $view->content !!}
{{$view->title}}
```
常用循环 单纯的循环
```
 @foreach(v_data(1,14,'img1,title,content') as $row)@endforeach
 变量 
 {{$row['title']}}
 {{$row['ftitle']}}
 {{src($row['img1'])}}
 {{v_url($row['id'])}}
 {{cutstr($row['content'], 200)}}
```
列表
```
@foreach(v_data(3,15,'img1,title,ftitle,introduce,content') as $key=>$row)
<div class="xint3a">
	<div class="xint3aL" {!! $key%2 == 1 ? ' style="float: right;"' : '' !!}>
		<h2>{{$row['title']}}</h2>
		<h3>{{$row['ftitle']}}</h3>
		<p class="p1">{{$row['introduce']}}</p>
		<p class="shouqi zhank"></p>
	</div>
	<div class="xint3aR" {!! $key%2 == 0 ? ' style="float: right;"' : '' !!}>
		<a href="">
			<img src="{{src($row['img1'])}}"/>
		</a>
	</div>
</div>
<div class="xiala">
{!! htmlspecialchars_decode($row['content']) !!}
</div>
@endforeach
```
    相册列表
```
@foreach(M('pic')->field('title,img1')->where('ti='.$view->id.' and ci=4')->order('disorder desc, id asc')->select() as $row)
<div class="carousel-feature">
    <a href="javascript:;" title="{{$row['title']}}"><img class="carousel-image" src="{{src($row['img1'])}}" alt="{{$row['title']}}"></a>
</div>
@endforeach
```
```
@foreach(v_data(3,9,'img1,title,ftitle') as $row)
<li>
	<div class="jinq1">
		<a href="{{m_url(3)}}" style="background: #e0e0e0 url({{src($row['img1'])}}) no-repeat center center;">
			<p>{{$row['title']}}</p>
		</a>
	</div>
	<div class="jinq2">
		<a href="{{m_url(3)}}" style="background: #b2b2b2 url({{src($row['img1'])}}) no-repeat center 30px;">
			<p class="p1">{{$row['title']}}</p>
			<p class="p2">{{$row['ftitle']}}</p>
		</a>
	</div>
</li>
@endforeach
```
判断是否是最后一个
```
@foreach($product as $row)
<li {!! $loop->last? 'class="last"' : '' !!} style="background: #e0e0e0 url({{src($row['img1'])}}) no-repeat center center;">
	<a href="#a{{$row['id']}}">
		<p>{{$row['title']}}</p>
	</a>
</li>
@endforeach
```
打开连接
```
function oopen(u) {return window.open(u,'','left=150,top=150,width=550,height=300');}
```
导航
```
<ul>
    <li><a<?=IS_INDEX?' class="curn-btn"':''?> href="/">首页</a></li>
    @foreach($daohang->data as $key => $vas)
    <li><a<?=$vas['id']==$pid?' class="curn-btn"':''?> title="<?=$vas['catname']?>" href="/web/index?pid=<?=$vas['id']?>"><?=$vas['catname']?></a></li>
    @endforeach
</ul>
========================================================================
    
<li class="nav_li on">
    <a href="#" class="nav_li_a">走进御融堂</a>
    <div class="ej clr">
        <ul>
            <li><a href="#">公司简介</a></li>
            <li><a href="#">创始人故事</a></li>
            <li><a href="#">团队介绍</a></li>
        </ul>
    </div>
 </li>
 
 {!! nav_danceng('<dd class="dd_title%s"> <a title="@$catname@" href="__URL__">@$catname@</a> </dd>') !!}
 
 {!! vv_data($daohang->data, '
  <li class="autoplay">
    <a href="javascript:void(0);">
      <i class="i1 autoplay">@$catname@</i>
      <i class="i2 autoplay">@$catname2@</i>
    </a>
  </li>
  ') !!}
  
  @foreach(array(1,2,3,4) as $value)
        <dl>
          {!! vv_data($daohang->sub_nav($value), '
          <dd class="autoplay">
            <a href="/web/index?pid=@$pid@&ty=@$id@">@$catname@</a>
          </dd>
          ') !!}
        </dl>
        @endforeach

```
navigation
```
@if(IS_INDEX)
<!-- banner轮播 -->
<div class="banner">
     <div class="flexslider">
        <ul class="slides">
            {!! vv(8, 17, '<li><a title="@$title@" href="@$linkurl@" target="_blank"><img src="__IMG__"></a></li>'); !!}
        </ul>
    </div>
</div>
<!-- banner轮播结束 -->
@else
<div class="page_banner"><img src="{{$pid_img1}}"></div>
<div class="bg_e1">
    <div class="wd addr_nav">当前位置:{!! pc_bread() !!} </div>
</div>
@endif
```
模板
```
@if($ty==9)
@elseif($ty==26)
@endif
```
json代码
```
<?php
    $json_channels = $channels ? json_decode(htmlspecialchars_decode($channels), true) : [];
    foreach ($json_channels as $channel_name => $channel_url) {
    
    	$ucfirt_channel_name = ucfirst($channel_name);
    	echo '<a href="'.$channel_url.'" target="_blank"><img src="picture/'.$channel_name.'-icon.png" class="social-icon" alt="Primalbase On '.$ucfirt_channel_name.'" title="'.$name.' '.$channel_url.'"></a>';
    }
    unset($json_channels, $channel_name, $channel_url, $ucfirt_channel_name);
?>
```
