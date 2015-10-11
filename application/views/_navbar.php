<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url ();?>">首頁</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $active == 'messages' ? ' active': '';?>"><a href="<?php echo base_url ('messages/');?>">我的動態</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">設定 <span class="caret"></span></a>
          <ul class="dropdown-menu">
      <?php if (user ()) { ?>
              <li class="<?php echo $active == 'personal' ? ' active': '';?>"><a href="#">個人資料</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo base_url ('platform/logout');?>">會員登出</a></li>
      <?php } else { ?>
              <li class="<?php echo $active == 'login' ? ' active': '';?>"><a href="<?php echo base_url ('platform/login');?>">會員登入</a></li>
              <li class="<?php echo $active == 'register' ? ' active': '';?>"><a href="<?php echo base_url ('platform/register');?>">帳號註冊</a></li>
      <?php } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>