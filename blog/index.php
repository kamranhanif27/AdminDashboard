<?php 
include_once '../includes/dbh.inc.php';
session_start();
if (isset($_SESSION['u_id'])) {
  $id_u = $_SESSION['u_id'];
}


// if (isset($_POST['post'])) {
    
//     $title = mysqli_real_escape_string($conn, $_POST['title']);
//     $tags = mysqli_real_escape_string($conn, $_POST['tags']);
//     $category = mysqli_real_escape_string($conn, $_POST['category']);
//     $content = mysqli_real_escape_string($conn, $_POST['content']);
//             $sql = "INSERT INTO posts (id, title, tag, category, content,user_id) 
//             VALUES (NULL ,'$title', '$tags', '$category', '$content',$id_u)";
//             mysqli_query($conn, $sql);
//             header("Location: ../blog/index.php?post=Posted");
//             exit();
//         }   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Blog</title>
</head>
<body>
    <!-- adding the header image -->
    <img id="headerImg" src="img/header-img.jpg" alt="Header Image">
    <!-- adding the header image bottom line -->
    <div style="height: 5px; background-color:darkslategrey;"></div>
    <!-- adding the navbar -->
    <?php 
    include '../includes/navbar.inc.php';
    
    ?>

    
    <div class="container"><!-- Starting the container div -->
        <div class="row">
           <?php include '../includes/friends.inc.php'; ?>
           <?php include '../includes/recentposts.inc.php'; ?>
            <div class="col-sm-9">
              <div class="card my-4">
                <div class="card-body">
                  <form action="../includes/post.inc.php" method="POST" enctype="multipart/form-data">
                  <h4>New Post:</h4> 
                  <div class="row">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="postTitle">Title:</label>
                        <input name="title" type="text" class="form-control" id="postTitle"  placeholder="Title">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="tags">Tags:</label>
                        <input name="tags" type="text" class="form-control" id="tags"  placeholder="Tags">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="Category">Category:</label>
                        
                        <select name="category" class="form-control" id="category"  placeholder="Category">
                          <option name="cat-1">Web Development</option>
                          <option name="cat-2">Graphic Design</option>
                          <option name="cat-3">Gaming</option>
                          <option name="cat-4">Music</option>
                          <option name="cat-5">Movie</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-12">
                      <label for="postContent">Content:</label>
                      <textarea name="content" rows="10" class="form-control" id="postContent">Content</textarea> 
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="postContent">Images:</label>
                      <input name="image" type="file" class="form-control"> 
                    </div>
                  </div>
                  <button name="post" type="submit" class="btn btn-block btn-success">Posts</button>
                </form>
                </div>
              </div>

                  <?php 

                    $sql = "SELECT * FROM posts INNER JOIN users ON posts.user_id=users.id";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $postPic = $row["image"];
                      echo ' 

                      <!-- Post Card -->
                    <div class="card my-4">
                      <div class="card-body">
                        <h3>', $row["title"], '</h3>
                        <p style="font-size: 80%">
                          Posted on ', $row["publishDate"],' by ', $row["firstName"], '
                        </p>
                        <div class="media">
                          <div class="media-left">
                            <img src="', $postPic, '" class="media-object mr-3" style="width:100px">
                          </div>
                          <div class="media-body">
                            <p>', $row["content"], '</p>
                          </div>
                        </div>
                        
                      </div>
                    </div>

                      ';
                        }
                    }     

                  ?>
                
                    
          
                    <!-- <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                      </ul>
                    </nav> -->
                    
          
          
          
                   
          
                      </div>
                    </div>
            </div>




    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>