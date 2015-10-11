
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <form action='<?php echo base_url ('platform/register_post');?>' method='post'>
      <div class="form-group">
        <label for="name">輸入名稱</label>
        <input type='text' class="form-control" name="name" id="name" placeholder="請輸入名稱.." />
      </div>
      <div class="form-group">
        <label for="account">輸入帳號</label>
        <input type='text' class="form-control" name="account" id="account" placeholder="請輸入帳號.." />
      </div>
      <div class="form-group">
        <label for="password">輸入密碼</label>
        <input type='password' class="form-control" name="password" id="password" placeholder="請輸入密碼.." />
      </div>
      <div class="form-group">
        <label for="re_password">確認密碼</label>
        <input type='password' class="form-control" name="re_password" id="re_password" placeholder="請輸入確認密碼.." />
      </div>

      <hr/>
      
      <div class="form-group text-right">
        <button type="submit" class="btn btn-default">確定</button>  
      </div>
    </form>
  </div>
  <div class="col-md-4"></div>
</div>