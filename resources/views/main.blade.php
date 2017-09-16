<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('partials._head')

<body class="nav-md">

    <div class="container body">
        <div class="main_container">

		@include('partials._sidebar')  

		@include('partials._topnav')

		@yield('content') 

		@include('partials._footer')     
        
        </div>
    </div>

@include('partials._script')

</body>

</html>
