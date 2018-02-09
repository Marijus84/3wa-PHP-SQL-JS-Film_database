
    <!-- <script>
    function myF() {

      $(".comments").empty();

      let length = "<?php Print($count); ?>"
      console.log(length);
      let table = $("<table class = 'commentTable'>");
      for (let i = 0; i < length; i++) {

        let row = $("<tr>");
        let cell = $("<td class = 'white'>");

        cell.text("Name: <?=$comments[i]['name'] ?>");
        row.append(cell);
        cell = $("<td class = 'white'>");
        cell.text("Comment: <?=$comments['comments'] ?>");
        row.append(cell);
        table.append(row);
        $(".comments").append(table);
      }
      return


    }
    </script> -->
