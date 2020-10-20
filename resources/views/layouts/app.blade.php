<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - MUD.REN | MUD游戏玩家社区</title>
    <meta name="description" content="mud.Ren社区专注于lpmud游戏、mudlib开发、lpc学习、fluffos编译等MUD游戏的技术交流和分享，爱mud,爱生活。">
    <meta name="keywords" content="mud,mud.ren,mudlib,lpc,fluffos,mud游戏,泥潭mud,mudos,lpmud">

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    @livewireStyles
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <div class="bg-dark shadow-6 py-2">
        <div class="container text-center text-white-60">
            <a href="http://beian.miit.gov.cn" class="text-light" target="_blank">京ICP备13031296号-4</a>
        </div>
    </div>
    @livewireScripts
</body>
</html>
