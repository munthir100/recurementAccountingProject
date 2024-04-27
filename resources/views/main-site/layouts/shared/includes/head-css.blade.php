<!-- favicon icon -->
<link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
<link rel="apple-touch-icon" href="{{asset('images/apple-touch-icon-57x57.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/apple-touch-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/apple-touch-icon-114x114.png')}}">
<!-- google fonts preconnect -->
<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- style sheets and font icons  -->
<link rel="stylesheet" href="{{asset('css/vendors.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/icon.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
<link rel="stylesheet" href="{{asset('demos/accounting/accounting.css')}}" />
@if(app()->isLocale('ar'))
<link rel="stylesheet" href="{{asset('css/style-rtl.css')}}" />
@endif
