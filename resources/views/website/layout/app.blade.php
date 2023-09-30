<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    {{-- <link rel = "icon" class="img-fluid" href ="" type = "image/x-icon"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @include('website.layout.style')
    @stack('styles')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="skin-blue sidebar-mini">
@include('website.layout.header')
<!-- BEGIN CONTAINER -->
{{-- @include('layout.flash-message') --}}

@yield('content')
<!-- END CONTAINER -->
@include('website.layout.footer')
@include('website.layout.script')
@stack('scripts')

<script type="text/javascript" src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<!-- <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> -->
	<script type="text/javascript">
		$(document).ready(function($) {
			$('.stellarnav').stellarNav({
				theme: 'dark',
				breakpoint: 960,
				position: 'right',
				phoneBtn: '18009997788',
				locationBtn: 'https://www.google.com/maps'
			});
		});
	</script>
</body>
</html>
