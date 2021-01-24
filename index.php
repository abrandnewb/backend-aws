<?php
    require("classes/db.php");
    require("classes/preacher.php");
    $p = new Preacher();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    <meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
  
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <strong>Preachers</strong>
      </a>
    </div>
  </div>
</header>
<main>
  <div class="container mt-3">
     <form class="row g-3" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <div class="col-md-8">
            <label for="validationDefault01" class="form-label">Full name</label>
            <input type="text" class="form-control" name="fullname" id="validationDefault01" required>
        </div>
        <div class="col-md-8">
            <label for="validationDefault02" class="form-label">Tel.</label>
            <input type="tel" class="form-control" name="tel" id="validationDefault02" required>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit" name="submit_form">Submit</button>
        </div>
    </form>
  </div>

  <div class="container mt-3">
  <?php
   //submit form
    if(isset($_POST['submit_form'])) {
        $result = $p->store($_POST['fullname'],$_POST['tel']);
    }
    
    //show records
    if($result = $p->showAll()) {       
        if($result->num_rows > 0) {
            $preachers = $result->fetch_all(MYSQLI_ASSOC);
            echo '<table class="table table-striped"><th scope="row">#</th><th scope="row">Name</th><th scope="row">Tel.</th><th scope="row"></th>';
            foreach($preachers as $preacher) {
                echo "<tr>";
                echo "<td>".$preacher["id"]."</td>";
                echo "<td>".$preacher["name"]."</td>";
                echo "<td>".$preacher["tel"]."</td>";
                echo '<td><a href="'.$_SERVER['PHP_SELF']."?del_id=".$preacher["id"].'">delete</a></td>';
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    //delete record
    if(isset($_GET['del_id'])) {
        $result = $p->delete($_GET['del_id']);
        if($result) {
            echo "deleted a record";
            header('Location:'.$_SERVER['PHP_SELF']);
        }
    }
    ?>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
      
  </body>
</html>