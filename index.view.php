<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <section>
        <h1>Filmai</h1>
        <div class="row">

            <?php foreach($movies as $movie): ?>

              <div class="col-lg-4 col-md-4 col-sm-6 ">
                <article class="card">
                <div class="card-block text-center shadow">
                  <header class="title-header">
                    <h3><?= $movie['title'] ?></h3>
                  </header>
                    <div class="img-card ">
                        <a href="#"><img src="<?= $movie['image'] ?>" alt="" class=" img-responsive " style="height: 250px; margin: 10 auto" /></a>
                    </div>
                    <p class="tagline card-text text-xs-center"><?= $movie['year'] ?> </p>
                    <p class="tagline card-text text-xs-center">Trukmė:<?= $movie['duration'] ?> min </p>
                    <p class="tagline card-text text-xs-center">Kokybe:<?= $movie['quality'] ?></p>
                    <a href="<?= $movie['trailer'] ?>"type = "button" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> Preview </a>
                    <a href="edit.php?id=<?= $movie['id']?>"><button type="button" class="btn btn-success">Edit</button></a>
                    <a href="delete.php?id=<?= $movie['id']?>"><button type="button" onclick="return myF();" class="btn btn-danger">Delete</button></a>
                </div>
            </article>
        </div>
        <?php endforeach ?>
        <a href="new.php"><button type="button" class="bot btn btn-primary">Add New</button></a>
      </div>
    </section>

    </div>
    <script>
      function myF() {
        var x = confirm("Do you wanr Really do it?");
          if (x) {
            return true;
          }
          else {
            return false;
          }
      }
    </script>
</body>
</html>
