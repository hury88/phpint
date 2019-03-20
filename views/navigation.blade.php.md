```
{{$system_logo1}}
{{$system_tel}}
{{$system_email}}
```
### 导航菜单1
```
<ul>
	<li @if(IS_INDEX)class="on"@endif><a href="/">Home</a></li>
	{!! $daohang->danceng('<li %s><a href="__URL__">@$catname@</a></li>', 'class="on"') !!}
</ul>
```
### 首页轮播图
```
@if(IS_INDEX)
	{!! vv(4,9, '
    	__IMG__
    	__CONTENT__
    	@$linkurl@
	') !!}
@else
@endif--}}
```
### 面包屑
```
{!! pc_bread() !!}
```
