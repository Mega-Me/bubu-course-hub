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

    <link rel="stylesheet" href="index.css" />
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


<div class="search" style="color:white;" >
          <input type="submit" value="search" name="search"/>


        
        <a href="loginpage/loginform.php" style="color:red; font-weight:800px; margin-left:150px; ">logout</a>
          </div>
        </div>
        
      </div>
      <div class="cont1">
        <div class="file1">
          <!-- <img src="assets/pngwing.com.png" /> -->
        </div>
        <form method="post" enctype="multipart/form-data">
          <?php
                        // If submit button is clicked
                        if (isset($_POST['submit']))
                        {
                          // get name from the form when submitted
                          $name = $_POST['name'];
                                             

                                            
 
                          if (isset($_FILES['pdf_file']['name']))
                          {  
                          // If the ‘pdf_file’ field has an attachment
                            $file_name = $_FILES['pdf_file']['name'];
                            $file_tmp = $_FILES['pdf_file']['tmp_name'];
                            $description = $_POST['desc']; 
                            // Move the uploaded pdf file into the pdf folder
                            move_uploaded_file($file_tmp,".//".$file_name);
                            // Insert the submitted data from the form into the table
                            $insertquery =
                            "INSERT INTO pdf_data(name,filename,description) VALUES('$name','$file_name','$description')";
                             
                            // Execute insert query
                            $iquery = mysqli_query($conn, $insertquery);     
 
                                if ($iquery)
                               {                            
                    ?>
          
          <?php
                                }
                                else
                                {
                                ?>
         
          <?php
                                }
                            }
                            else
                            {
                              ?>
          <div
            class="alert alert-danger alert-dismissible fade show text-center"
          >
            <a class="close" data-dismiss="alert" aria-label="close"> × </a>
            <strong>Failed!</strong> File must be uploaded in PDF format!
          </div>
          <?php
                            }// end if
                        }// end if
                    ?>

          <center>
            <div class="form-input">
              <h2>Upload your file</h2>
              <div class="form-group">
                <p>please enter your topic name below :</p>
                <input
                  type="text"
                  class="form-control"
                  placeholder="topic"
                  name="name"
                  autocomplete="off"
                  required
                />
              </div>
              <div id="description">
                <p>please enter a brief description below :</p>
                <input
                  type="text"
                  name="desc"
                  placeholder=" Description"
                  autocomplete="off"
                  id="n2"
                  required
                />
              </div>
              <div class="form-file">
                <input
                  type="file"
                  name="pdf_file"
                  class="form-control"
                  accept=".pdf"
                  required
                />
              </div>
              <div class="form-submit">
                <input
                  type="submit"
                  class="btnRegister"
                  name="submit"
                  value="post"
                />
                <button type="button" id="cancel">cancel</button>
              </div>
            </div>
          </center>
        </form>

        <div class="file2">
          <!-- <img src="assets/pngwing2.com (1).png" /> -->
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
            </span>
          </div>
          <?php
                               }
                          ?>
        </tbody>
      </div>

      <div class="footer">
        <div class="about">
          <a href="about us/about.html">about us</a>
        </div>
        <div class="contact">
          <a href="about us/contact.php"> contact us</a>
        </div>
        <div class="feed">
          <a href="feedback">feedback</a>
        </div>
      </div>
    </div>

    <script src="script.js"></script>
  </body>
</html>
