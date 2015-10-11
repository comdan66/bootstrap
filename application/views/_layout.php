<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/my.css');?>">

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <body>
    <?php echo $navbar;?>
    
    <div class='container'>
  <?php if ($message = $this->session->flashdata ('_message')) { ?>
          <div class="alert alert-info" role="alert"><?php echo $message;?></div>
  <?php } ?>

      <?php echo $content;?>
    </div>
  </body>
</html>