### 框架
```
{{$system_siteurl}}
{{$system_address}}
{{$system_tel}}
{{$view->date}}
{{$view->date}}
{{$view->hits}}
{{$view->title}}
{!! $view->content !!}

<a href="{{$view->previousLink}}" class="fl">上一篇: 
{{$view->previousTitle}}</a>

<a href="{{$view->nextLink}}" class="fr">下一篇: {{$view->nextTitle}}</a>
```
```
{!! VV::relative($view->relative) !!}

#banner图
{{$pid_img1}}
```
