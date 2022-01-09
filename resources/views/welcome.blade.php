<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MUD.REN | MUD游戏玩家社区</title>
        <meta name="description" content="mud.Ren社区专注于lpmud游戏、mudlib开发、lpc学习、fluffos编译等MUD游戏的技术交流和分享，爱mud,爱生活。">
        <meta name="keywords" content="mud,mud.ren,mudlib,lpc,fluffos,mud游戏,泥潭mud,mudos,lpmud">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #fff;
                color: #EC7E34;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #0078FF;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 5vh;
            }
            .m-t-footer {
                margin-top: 30vh;
            }
        </style>
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?5b97c97363890ad3134047bd30955ec5";
          var s = document.getElementsByTagName("script")[0];
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title">
                    MUD.REN
                </div>
                <div class="m-b-md">MUD游戏玩家社区</div>
                <div class="pure-menu pure-menu-horizontal">
                    <ul class="pure-menu-list">
                        <li class="pure-menu-item">
                            <a href="https://bbs.mud.ren" class="pure-menu-link">社区</a>
                        </li>
                        <li class="pure-menu-item">
                            <a href="https://mud.wiki" class="pure-menu-link">百科</a>
                        </li>
                        <li class="pure-menu-item">
                            <a href="{{asset('threads')}}" class="pure-menu-link">索引</a>
                        </li>
                        <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                            <a href="#" id="menuLink1" class="pure-menu-link">游戏</a>
                            <ul class="pure-menu-children">
                                <li class="pure-menu-item">
                                    <a href="https://mud.ren:8888" class="pure-menu-link">炎黄群侠传</a>
                                </li>
                                <li class="pure-menu-item">
                                    <a href="https://mud.ren:8080" class="pure-menu-link">勇者斗恶龙</a>
                                </li>
                                <!-- <li class="pure-menu-item">
                                    <a href="https://mud.ren:8008" class="pure-menu-link">诡秘之主</a>
                                </li> -->
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="m-t-footer links">
                    <a href="http://beian.miit.gov.cn" style="color:#222222;font-size:12px;" target="_blank">京ICP备13031296号-4</a>
                </div>
            </div>
        </div>
    </body>
</html>
