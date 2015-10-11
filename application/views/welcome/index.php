<div class="page-header">
  <h1>首頁<small>動態練習</small></h1>
</div>

<?php
if (user ()) {
  echo "Hi, " . user ()->name . "(" . user ()->account . ")!";
} else {
  echo "您尚未登入！";
}?>