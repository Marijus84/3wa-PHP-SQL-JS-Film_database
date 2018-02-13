<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

  <div class="container">
    <section>
        <h1>Filmai</h1>
        <div class="row">
          <div class="col-md-4">
            <div class="input-group">
              <input type="text" id = "search" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary go"  type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
        <div class="results">
        </div>


        </div>

        </div>
        <div class="col-md-4">
          <form action="index.php?psl=1" id = "selection" method="GET">
            <div class="form-group">
              <label>Filter by year</label>
              <select class="form-control" name = "year" onchange="selection.submit()" id="yearFilter">
                <?php for ($i=2018; $i > 1900 ; $i--): ?>
                  <option value="<?=$i?>"><?=$i?></option>
                <?php endfor?>
              </select>
            </div>
          </form>
        </div>
        <div class="row">

            <?php foreach($movies[0] as $movie): ?>
              <div class="col-lg-4 col-md-6 col-sm-12 ">
                <article class="card">
                <div class="card-block text-center shadow">
                  <header class="title-header">
                    <h3><?= $movie['title'] ?></h3>
                  </header>
                    <div class="img-card ">
                        <a href="detailed_view.php?id=<?= $movie['id']?>"><img src="<?= $movie['image'] ?>" alt="" class=" img-responsive " style="height: 250px; margin: 10 auto" /></a>
                    </div>
                    <p class="tagline card-text text-xs-center"><?= $movie['year'] ?> </p>
                    <p class="tagline card-text text-xs-center">Trukmė:<?= $movie['duration'] ?> min </p>
                    <p class="tagline card-text text-xs-center">Kokybe:<?= $movie['quality'] ?></p>
                    <a href="<?= $movie['trailer'] ?>"><iframe width="250px" src="<?= $movie['trailer'] ?>"></iframe></a>
                    <a href="edit.php?id=<?= $movie['id']?>"><button type="button" class="btn btn-success">Edit</button></a>
                    <a href="delete.php?id=<?= $movie['id']?>"><button type="button" onclick="return myF();" class="btn btn-danger">Delete</button></a>
                </div>
            </article>
        </div>
        <?php endforeach ?>
      </div>
      <ul class="pagination justify-content-center">
        <?php if (array_key_exists("year",$_GET)){
          $year = $_GET['year'];
          for ($i=1; $i <=$pageCount ; $i++): ?>
          <li class="page-item"><a class="page-link" href="index.php?psl=<?= $i?>&year=<?=$year?>"><?php echo $i ?></a></li>
        <?php endfor;

        }
        else {

          for ($i=1; $i <=$pageCount ; $i++): ?>
          <li class="page-item"><a class="page-link" href="index.php?psl=<?php echo $i?>"><?php echo $i ?></a></li>
        <?php endfor;
        }?>

      </ul>
      <a href="new.php"><button type="button" class="bot btn btn-primary">Add New</button></a><p>
      <a href="Login/logout.php"><button type="button" class="bot btn btn-info">Logout</button></a>
    </section>

    </div>




    <script>

    $(".go").click(function(){
      console.log($("#search").val());
      let search = $("#search").val()
      $.ajax ({
        type:"GET",
        url:"get_id.php",
        contentType:"application/json",
        dataType: "json",

        data: {name : search},
        success: function(data){
          console.log(data);
           location.href = 'detailed_view.php?id='+ data.id;
        },
        error: function(data){
          console.log(data);
        }
    })
  })

    $("#search").keyup(function(){

      let search = $(this).val();
      if (search.length == 0) {
        $(".results").empty();
        return;
      }
      setTimeout(function(){
        //your code

        $.ajax ({
          type:"GET",
          url:"live_search.php",
          contentType:"application/json",
          dataType: "json",

          data: {name : search},
          success: function(data){
            console.log(data);
            console.log(search);
            $(".results").empty();
            let diva = $("<div class = 'suggestions' >")
            for (let i = 0; i < data.length; i++) {
              let para = $("<p >");
              let line = $("<a class = 'test'></a>");
              para.append(line);
              line.text(data[i].title);
              diva.append(para);
              //new div
              //new link = a + text + a>
               }
              $(".results").append(diva);
          },
          error: function(data){
            console.log(data);
          }
        })

      },
    1000);
    });

    $('body').on('click', '.test', function (){
      console.log($('#search').val());
      $('#search').val($(this).text());
    });

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
