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
        require_once "./classes/DB.php";
        session_start();
        $db;
        if(!isset($_SESSION["db"])){
            $db = new DB();
            $_SESSION["db"] = $db;
        }else{
            $db = $_SESSION["db"];
        }
        $user = isset($_SESSION["user"]) ? $_SESSION["user"] : null;

        $concs = $db->getConcerts();
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./pages/orchestre.php">orchestre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./pages/login.php">Login</a>
        </li>
        <?php if($user != null) {?>
        <li class="nav-link">
        <a class="nav-link" href="./pages/login.php">
          <?php echo $user["username"]?>
        </a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

    <div class="row">
    <div class="col-6 mx-auto border rounded mt-2 shadow">
      <input type="text" name="search" class="form-control w-25 m-2 border-black" id="search">
      <!-- table with search -->
    <table id="searchConc" class="table">
        <tr>
            <th>Titolo</th>
            <th>Descrizione</th>
            <th>Data</th>
        </tr>
        <?php 
            for($i = 0; $i<count($concs) ; $i++){?>
                <tr>
                <td>
                <?php echo $concs[$i]["titolo"] ?>
            </td>
            <td>
                <?php echo $concs[$i]["descrizione"]?>
            </td>
            <td>
                <?php echo $concs[$i]["data"]?>
            </td>
                </tr>
        <?php } ?>
    </table>

    </div>
</div>

    <script src="./js/search.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>  </body>
</html>