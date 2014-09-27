@include('layouts.partials.header')
 <style>
        body { background-color: #EEE; }
        .maincontent {
            background-color: #FFF;
            margin: auto;
            padding: 20px;
            width: 300px;
            box-shadow: 0 0 20px #AAA;
        }
</style>
@include('flash::message')
@yield('main-content','')
@include('layouts.partials.footer')