```
@extends('layouts.master')

@section('css')
@stop
@section('wapper')

<div class="child search"></div>

<div class="line_45 clr"></div>

<div class="wd1008 search_list clr">
	<div class="search_lt clr fl">
    	<form class="clr" action="/web/search">
        	<input type="submit" value="" class="submit">
            <input name="q" value="{{$q}}" type="text" class="txt" placeholder="Search">
        </form>
        <div class="search_lt_top clr">
        	您搜索到了{{$totalPages}}页 / {{$totalrows}}条结果
        </div>

        <ul>
        	{!! $display !!}
        </ul>

        <div class="pages">
            {!! $paging !!}
        </div>
    </div>
    <div class="search_rt clr fr">
        <div class="rt_title">LATEST ACTIVITIES</div>
        <img src="/style/images/img1.png">
        <img src="/style/images/img2.png" class="img2">
        <div class="rt_title">HOT LABEL</div>
        <div class="label clr">
            {!! VV::hotlabels() !!}
        </div>
    </div>

</div>

@stop

```
