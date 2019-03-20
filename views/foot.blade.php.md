```
{{$system_tel}}
{{$system_fax}}
{{$system_siteurl}}
{!! v_news(4, -15, 'content') !!}
```
### 表单
```
<form class="form" action="/form/index">
  <input name="email" class="txt" placeholder="E-mail">
  <textarea name="message" class="txt2" placeholder="您所关注的内容"></textarea>
  <div class="div_txt clr">
    <input name="code" class="txt" placeholder="验证码">
    <a class="btn" href="javascript:;"><img onclick="this.src='/yzm.php?'+(new Date()).getTime()" id="imgcode" style="width:100%;height:100%;" src="/yzm.php" alt=""></a>
  </div>
  <input type="submit" class="submit model" value="提  交">
</form>
```
### 底部链接
```
<a target="_blank" href="{{$system_link1}}"><span class="span1"></span></a>
<a target="_blank" href="{{$system_link2}}"><span class="span2"></span></a>
<a target="_blank" href="{{$system_link3}}"><span class="span3"></span></a>
<a target="_blank" href="{{$system_link4}}"><span class="span4"></span></a>
```
