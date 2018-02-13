<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'functions.php';
$film = getOne($_GET['id']);
//$comments = getComments($_GET['id']);
$count = count(getAll());

//dd($comments);
?>



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
        <h1><?= $film['title'];?></h1>
        <div class="row">
      </div>
      <div class="row">
        <img src="<?= $film['image'] ?>" alt="" class=" img-responsive " style="height: 400px; margin: 10 auto" />
      </div>
      <p><strong>About:</strong> <?= $film['description'];?></p>
      <p><strong>Release year:</strong> <?= $film['year'];?></p>
      <p><strong>Duration:</strong>  <?= $film['duration'];?> min</p>
      <p><strong>Quality:</strong>  <?= $film['quality'];?></p>

      <div class="row">
        <iframe width="600px" height= "400px" src="<?= $film['trailer'] ?>?autoplay=1"></iframe>
      </div>
      <div class="comments">
      <button type="button" onclick = "myF();" class="bot btn btn-info">View/Hide comments</button>
      </div>
      <div class="tbl show">

      </div>
      <p>

        <div class="comments">
        <button type="button" onclick = "show();" class="bot btn btn-info">Add comment</button>
        </div>
        <p>

        <form action="addComment.php?id=<?= $film['id']?>" class = "hidden2 show" method="POST">
          <div class="form-group" >
          <label>Name</label>
          <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
          <label>Comment</label>
          <textarea type="text" rows = "3" name="comment" class="form-control"></textarea>
          </div>
          <div class="form-group">
          <button class="btn btn-primary" type="submit">Save</button>
          </div>
        </form>


      <a href="index.php"><button type="button" class="bot btn btn-info">Return</button></a>
      </p>
      <a href="Login/logout.php"><button type="button" class="bot btn btn-info">Logout</button></a>
    </section>
    </div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>

    function show(){

      $( ".hidden2" ).toggleClass( "show" );

    }

    function myF() {
    let id =  <?=$_GET['id'];?>;
    $( ".tbl" ).toggleClass( "show" );
        $.ajax({
          type:"GET",
          url:"comment.php",
          contentType:"application/json",
          dataType: "json",
          data: "id=" + id,
          success: function(data){

          console.log(data);
          $(".tbl").empty();


          let table = $("<table class = 'commentTable'>");
          for (let i = 0; i < data.length; i++) {
            let row = $("<tr>");
            let cell = $("<td class = 'white'>");
            cell.text("Name: " + data[i].name);
            row.append(cell);
            cell = $("<td class = 'whites'>");
            cell.text("Comment: " + data[i].comments);
            row.append(cell);
            table.append(row);
          }
          $(".tbl").append(table);

          },
          error: function(response){
            alert("Error:" + response);
          }
        });


      }
    </script>

  </body>
</html>
