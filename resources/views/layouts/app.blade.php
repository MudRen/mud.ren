<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - MUD.REN | MUD游戏玩家社区</title>
    <meta name="description" content="mud.Ren社区专注于lpmud游戏、mudlib开发、lpc学习、fluffos编译等MUD游戏的技术交流和分享，爱mud,爱生活。">
    <meta name="keywords" content="mud,mud.ren,mudlib,lpc,fluffos,mud游戏,泥潭mud,mudos,lpmud">

    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-4ZPLezkTZTsojWFhpdFembdzFudphhoOzIunR1wH6g1WQDzCAiPvDyitaK67mp0+" crossorigin="anonymous">

    @livewireStyles
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    @livewireScripts
</body>
</html>
