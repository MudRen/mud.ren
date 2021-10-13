<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-2 mb-3">
<div class="container">
  <a class="navbar-brand" href="{{asset('/')}}"><img src="https://www.mud.ren/logo.png" style="max-width:120px" alt=""><small class="mx-4">MUD游戏玩家社区</small></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="https://bbs.mud.ren/">社区 <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://mud.wiki/" target="_blank">百科</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{asset('threads')}}">索引</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          游戏
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="https://mud.ren:8888" target="_blank">炎黄群侠传</a>
          <!-- <a class="dropdown-item" href="https://mud.ren:8080" target="_blank">勇者斗恶龙</a> -->
          <!-- <a class="dropdown-item" href="https://mud.ren:8008" target="_blank">诡秘之主</a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="https://im-mortal.cn/mudlist" target="_blank">更多……</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{asset('users')}}">炎黄英雄榜</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://mud.ren/websocket.html" target="_blank">WebSocket</a>
      </li>
    </ul>
  </div>
</div>
</nav>
