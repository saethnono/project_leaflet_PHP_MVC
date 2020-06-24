<form method="post" class="form-signin">
    <img class="mb-4" src="<?php echo URL; ?>admin/assets/img/saeth.png" alt="" width="85" height="85">
    <h1 class="h3 mb-3 font-weight-normal">Admin-Login</h1>
    <?= $data['pesan']; ?>
    <label class="sr-only">Username</label>
    <input type="text" name="username" id="username" class="form-control" placeholder="Username" autofocus>
    <label class="sr-only">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password"><i class="fa fa-key" aria-hidden="true"></i>
    <input type="submit" name="login" value="Log in" class="btn btn-lg btn-primary btn-block" />
    <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
</form>