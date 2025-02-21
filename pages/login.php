<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concerti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
 
  <?php 
        require_once "../classes/DB.php";
        session_start();
        $db;
        if(!isset($_SESSION["db"])){
            $db = new DB();
            $_SESSION["db"] = $db;
        }else{
            $db = $_SESSION["db"];
        }
        $user = isset($_SESSION["user"]) ? $_SESSION["user"] : null;

  ?>
 
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
        <?php if($user != null) {?>
        <li class="nav-item">
        <a class="nav-link" href="./pages/login.php">
          <?php echo $user["username"]?>
        </a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
<div class="row mt-4">
<?php if($user == null) { ?>
<form method="POST" action="../user/loginaction.php" class="col-4 p-2 mx-auto border rounded">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input require type="text" class="form-control" name="username" id="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input require type="password" class="form-control" name="password" id="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  <?php }else{ ?>
      <div class="col-4 mx-auto rounded p-2 border">
        Sei già loggato
        <form method="POST" action="../user/logoutaction.php">
          <button class="btn btn-danger mt-3">
            Log Out 
          </button>
        </form>
      </div>
        <div class="col-6 border rounded mx-auto">
              <form method="POST" action="../user/insertaction.php">
          <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" name="titolo" class="form-control">
          </div>
          <div class="mb-3">
            <label for="descrizione" class="form-label">Descrizione</label>
            <input type="text" class="form-control" name="descrizione">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">data</label>
            <input type="date" class="form-control" name="data">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <?php } ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>  </body>
</html>