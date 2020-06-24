<!doctype html>
<html lang="en">
<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form.password.focus();
    return (false);
  }
  return (true);
}
</script>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Login form untuk adminusers">
  <meta name="author" content="Jose Saethnono">
  <title><?= $data['judul']; ?></title>
  <link href="<?php echo URL; ?>admin/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo URL; ?>admin/assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">