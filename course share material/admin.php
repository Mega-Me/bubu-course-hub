<?php
include_once("connection.php")

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>COURSE ROOM</title>

    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h1><a href="index.html">Course Room</a></h1>
 
        <div id="input1">
          <div class="input">
          <input
            type="text"
            name="q"
            id="searchbar"
            autocomplete="off"
            placeholder=" search for course materials"
            id="hide"
          />
          </div>


<div class="search" style="color:white">
          <input type="submit" value="search" name="search"/>
          admin
        <a href="loginpage/loginform.php" style="color:red; font-weight:800px; margin-left:10px; ">logout</a>
       
          </div>
        </div>
        
      </div>
      

      <div class="posts">
        <tbody>
          <?php
                              $selectQuery = "select * from pdf_data ORDER BY createdat DESC";
                              $squery = mysqli_query($conn, $selectQuery);
 
                              while (($result = mysqli_fetch_assoc($squery))) {
                          ?>

          <div class="task">
            <span id="topicName">
              <?php echo $result['name']; ?>
            </span>
            <span id="des">
              <?php echo $result['description']; ?>
            </span>
            <span id="file">
              <?php echo $result['filename']; ?>
            </span>
            <span id="file">
              <?php echo $result['createdat']; ?>
              <button type="button" id="download">Download</button>
              
              <button type="button" id="download"><a href="delete-process.php?name=<?php echo $result["name"]; ?>">Delete</a></button>
             <?php

?> 
            </span>
            
          </div>
          <?php
                               }
                          ?>
        </tbody>
      </div>

      

    <script >
    document.querySelector('#searchbar').
    addEventListener('input',filter_list);

    function filter_list(){
      const searchInput =document.querySelector('#searchbar');
      const filter = searchInput.value.tolowercase();
      const listItem=document.querySelectorAll('.posts');

      listItem.forEach((item)=>{
        let text =item.textContent;
        if(text.tolowercase().includes(filter.
        toLowerCase())){
          item.style.display='';
          }else{
            item.style.display='none';
            }

      });
    }
    </script>
  </body>
</html>
