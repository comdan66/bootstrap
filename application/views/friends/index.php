<?php
if (!user ()) { ?>
  <div class="alert alert-danger" role="alert">請先登入！</div>
<?php 
  return;
}
  if ($friends) { ?>
    <div class="row">
<?php foreach ($friends as $friend) { ?>
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
              <img src="<?php echo base_url ('assets/img/default-avatar.png');?>" />
              <div class="caption">
                <p><?php echo $friend->name;?> (<?php echo $friend->account;?>)</p>
                <hr/>
                <p class='text-right'><a href="<?php echo base_url ('friends/unbind/' . $friend->friend_id);?>" class="btn btn-danger" role="button">刪除好友</a></p>
              </div>
            </div>
          </div>
<?php } ?>
    </div>
<?php
  } else { ?>
    <div class="alert alert-warning" role="alert">沒有任何好友</div>
<?php
  } ?>
  
<nav>
  <?php echo $pagination;?>
</nav>