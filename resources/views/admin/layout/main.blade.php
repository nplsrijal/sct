<!DOCTYPE html>
<html lang="en">
 <head>
   @include('admin.layout.partials.head')
 </head>
 <body>
@if(Auth::guard('admin')->check())
@include('admin.layout.partials.header')
@endif
@yield('content')
@if(Auth::guard('admin')->check())
@include('admin.layout.partials.footer')
@endif
@include('admin.layout.partials.footer-scripts')
 </body>
</html>