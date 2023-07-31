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
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE category_id=$id";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result))
        {
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];
        }
    ?>

    <!-- Handaling the incomming POST REQUEST from the html form -->
    <?php
        // Create a variable to show the alert(i.e thread is inserted successfully.).
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST")
        {
            $showAlert = true;
            
            // Insert Question into 'threads' table of 'idiscuss' database.
            $th_title = $_POST['title'];
            $th_desc = $_POST['desc'];

            $th_title = str_replace("<", "&lt;", $th_title);
            $th_title = str_replace(">", "&gt;", $th_title);
            $th_title = str_replace("'", "\'", $th_title);
            
            $th_desc = str_replace("<", "&lt;", $th_desc);
            $th_desc = str_replace(">", "&gt;", $th_desc);
            $th_desc = str_replace("'", "\'", $th_desc);
            
            
            $sno = $_POST['sno'];
            
            $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);

        }
        // showAlert if the record is inserted successfully.
        if($showAlert)
        {
        echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your thread has been successfully added! Please wait for community to respond.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }
    ?>

    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> Forum</h1>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>
                This is peer to peer forum.
                <br>No Spam / Advertising / Self-promote in the forums is not allowed.
                <br>Do not post copyright-infringing material.
                <br>Do not post “offensive” posts, links or images.
                <br>Do not cross post questions.
                <br>Remain respectful of other members at all times.
            </p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    
    <!-- Form for asking questions. -->
    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
        {
            echo '  
                <div class="container">
                    <h1 class="py-2">Drop Your Concern Here.</h1>
                    <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label">Problem Title</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                            <div id="emailHelp" class="form-text">Keep your title as short and as crisp as possible.</div>
                        </div>
                        <div class="form-group">
                            <label for="desc">Elaborate Your Question</label>
                            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                        </div>
                        <input type="hidden" name="sno" value="' . $_SESSION['sno'] . '" >
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                ';
        }
        else{
            echo '
                <div class="container">
                    <h1 class="py-2">Drop Your Concern Here.</h1>
                    <p class="bg-secondary text-dark fw-bold fs-5 p-2 text-center rounded-1">You are not loggedin! Please login to be able to start a discussion.</p>
                </div>
            '; 
        }
    ?>

    <div class="container mb-5">
        <h1 class="py-2">Browse Question</h1>
        <?php
            $noResult = true;
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result))
            {
                $noResult = false;
                $id = $row['thread_id'];
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $thread_time = $row['timestamp'];
                $thread_user_id = $row['thread_user_id'];

                $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                $user = $row2['user_email'];
                
                echo '  <div class="media my-3">
                <img src="img/userdefault.png" width="54px" class="mr-3" alt="User logo">
                <div class="media-body">
                    <h5 class="mt-0"><a class="text-info" href="thread.php?threadid='.$id.'" >'.$title.'</a></h5>
                    <p class="mb-0">'.$desc.'</p>
                    <p class="my-0"><b>Asked By</b> : <b>'.$user.'</b> at <b>'.$thread_time.'</b></p>
                </div>
                </div>
                ';
            }
            if($noResult)
            {
                echo '
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <p class="display-4">No Threads found.</p>
                            <p class="lead">Be the first person to ask a question.</p>
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