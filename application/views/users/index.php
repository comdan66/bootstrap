<?php
  if ($users) { ?>
    <div class="row">
<?php foreach ($users as $user) { ?>
          <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
              <img src="<?php echo base_url ('assets/img/default-avatar.png');?>" />
              <div class="caption">
                <p><?php echo $user->name;?> (<?php echo $user->account;?>)</p>
                <hr/>
          <?php if ($user->is_friend) { ?>
                  <p class='text-right'><a href="<?php echo base_url ('users/unbind/' . $user->id);?>" class="btn btn-danger" role="button">刪除好友</a></p>
          <?php } else { ?>
                  <p class='text-right'><a href="<?php echo base_url ('users/bind/' . $user->id);?>" class="btn btn-primary" role="button">加入好友</a></p>
          <?php }?>
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