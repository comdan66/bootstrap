<?php
if (!user ()) { ?>
  <div class="alert alert-danger" role="alert">請先登入！</div>
<?php 
  return;
}?>

<form action='<?php echo base_url ('messages/message_post');?>' method='post'>
  <div class="form-group">
    <label for="content">輸入動態吧！</label>
    <textarea class="form-control" rows="3" name="content" id="content" placeholder="在想些什麼？"></textarea>
  </div>

  <div class="form-group text-right">
    <button type="submit" class="btn btn-default">確定</button>  
  </div>
</form>

<hr/>

<?php
  if ($messages) {
    foreach ($messages as $message) { ?>
      <div class="panel panel-default">
        <div class="panel-heading"><?php echo $message->name;?>：</div>
        <div class="panel-body">
          <?php echo $message->content;?>
        </div>
        <div class="panel-footer text-right"><?php echo $message->created_at;?></div>
      </div>
<?php
    }
  } else { ?>
    <div class="alert alert-warning" role="alert">沒有任何動態</div>
<?php
  } ?>



<nav>
  <?php echo $pagination;?>
</nav>