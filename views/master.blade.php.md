```php
<!DOCTYPE html>
<html lang="en">
<head>
	<title>@section('title') {{$system_seotitle}} @show</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<meta name="keywords" content="{{$system_keywords}}">
	<meta name="description" content="{{$system_description}}">
	{{--<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>--}}
	{{-- /style/ --}}

	@yield('css')
	<script type="text/javascript">
        var browser={
            versions:function(){
                var u = navigator.userAgent, app = navigator.appVersion;
                return {//移动终端浏览器版本信息
                    trident: u.indexOf('Trident') > -1, //IE内核
                    presto: u.indexOf('Presto') > -1, //opera内核
                    webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                    gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                    mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
                    ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                    android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
                    iPhone: u.indexOf('iPhone') > -1 , //是否为iPhone或者QQHD浏览器
                    iPad: u.indexOf('iPad') > -1, //是否iPad
                    webApp: u.indexOf('Safari') == -1, //是否web应该程序，没有头部与底部
                    isWeixinBrowser: u.toLowerCase().indexOf('micromessenger') > -1 //是否为微信内置浏览器
                };
            }(),
            language:(navigator.browserLanguage || navigator.language).toLowerCase()
        }

        if(browser.versions.mobile || browser.versions.ios || browser.versions.android ||
            browser.versions.iPhone || browser.versions.iPad){
            {{--window.location = "/m";--}}
        }
	</script>
</head>
	{{-- Navigation bar section --}}
<body>
	@section('navigation')
		@include('partial.navigation')
	@show

	{{-- Breadcrumbs section --}}
	@section('breadcrumbs')
	@show

	{{-- Content page --}}
	@yield('wapper')

	@section('footer') {{-- 底部开始 --}}
	  @include('partial.footer')
	@show {{-- 底部结束 --}}
	{!!$system_header!!}
@section('scripts')

	{{--<script src="/style/js/form.js"></script>--}}
@show
</body>
</html>
```
