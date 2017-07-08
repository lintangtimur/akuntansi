<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>LOGIN</title>
  <?php require "partials/header.php"; ?>
<a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
<div class="" id="content">
  <div class="section">
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title"><b>LOGIN</b></span>
            <div class="row">
              <form action="loginproses" method="post">
              <div class="input-field col s6">
                <i class="material-icons prefix">verified_user</i>
                <input id="icon_prefix" type="text" name="username" placeholder="username" class="validate">
                <label for="icon_prefix"></label>
              </div>
              <div class="input-field col s6">
                <i class="material-icons prefix">vpn_key</i>
                <input id="icon_telephone" type="password" name="password" placeholder="password" class="validate">
                <label for="icon_prefix"></label>
              </div>
              <div class="input-field col s6">
                <button type="submit" class="btn green darken-1 waves-effect waves-light" name="button">LOGIN</button>
              </div>
            </form>
            </div> <!-- End Row -->
          </div> <!-- End card -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php require "partials/footer.php"; ?>
  </body>
</html>
