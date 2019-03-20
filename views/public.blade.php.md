```php
@extends('layouts.master')
@section('wapper')
  {{$pid_catname}}
  {{$pid_catname2}}
  {!! $daohang->erji_nav() !!}

  <?=$system_address?>
  <?=$system_tel?>
  <?=$system_fax?>
  <?=$system_email?>
  {{$ty_catname}}
  {!! pc_bread() !!}
@yield('right')

@stop
```
