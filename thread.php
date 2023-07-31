<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <?php 
        include 'partials/_dbconnect.php';
        include 'partials/_header.php';
    ?>

    <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result))
        {
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_user_id = $row['thread_user_id'];

            // Query to find the username from user tabel(using thread_user_id).
            $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $posted_by = $row2['user_email'];
        }
    ?>

    <!-- Handaling the incomming POST REQUEST from the html form -->
    <!-- PHP code for inserting comment's -->
    <?php
        // Create a variable to show the alert(i.e Comment is inserted successfully.).
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST")
        {
            $showAlert = true;
            
            // Insert Question into 'comments' table of 'idiscuss' database.
            $comment = $_POST['comment'];
            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace(">", "&gt;", $comment);
            $comment = str_replace("'", "\'", $comment);
            $sno = $_POST['sno'];
            
            $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);

            // showAlert if the record is inserted successfully.
            if($showAlert)
            {
                echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your comment on thread has been added successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
            }
        }
    ?>

    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4 "><?php echo $title; ?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>
                This is peer to peer forum.
                <br>No Spam / Advertising / Self-promote in the forums is not allowed.
                <br>Do not post copyright-infringing material. 
                <br>Do not post “offensive” posts, links or images. 
                <br>Do not cross post questions. 
                <br>Remain respectful of other members at all times.
            </p>
            <p>Posted By: <em><?php echo $posted_by; ?></em></p>
        </div>
    </div>
    
    <!-- Form for responding the questions. -->
    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
        {
            echo '  
                <div class="container">
                    <h1 class="py-2">Post a Comment</h1>
                    <form action="' . $_SERVER['REQUEST_URI'] . '" method="POST">
                        <div class="form-group">
                            <label for="comment" class="fw-bold">Type Your comment</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                            <input type="hidden" name="sno" value="' . $_SESSION['sno'] . '" >
                        </div>
                        <button type="submit" class="btn btn-success">Post Comment</button>
                    </form>
                </div>
                ';
        }
        else{
            echo '
                <div class="container">
                    <h1 class="py-2">Post a Commnet</h1>
                    <p class="bg-secondary text-dark fw-bold fs-5 p-2 text-center rounded-1">You are not loggedin! Please login to be able to post comments.</p>
                </div>
            '; 
        }
    ?>

    <div class="container mb-5">
        <h1 class="py-2">Discussions</h1>
        <!-- Fetch all the comment's related to particular thread -->
        <?php
            $noResult = true;
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result))
            {
                $noResult = false;
                $id = $row['comment_id'];
                $content = $row['comment_content'];
                $comment_time = $row['comment_time'];
                $thread_user_id = $row['comment_by'];

                $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                $user = $row2['user_email'];
                
                echo '  <div class="media my-3">
                <img src="img/userdefault.png" width="54px" class="mr-3" alt="...">
                <div class="media-body">
                    <p class="font-weight-bold my-0">'.$user.' at '.$comment_time.'</p>
                    <p>'.$content.'</p>
                </div>
                </div>
                ';
            }
            if($noResult)
            {
                echo '
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <p class="display-4">No Comments found.</p>
                            <p class="lead">Be the first person to comment on a question.</p>
                        </div>
                    </div>
                    ';
            }
        ?>
    </div>
    <?php 
        include 'partials/_footer.php';    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
</body>

</html>