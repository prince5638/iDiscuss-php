<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    #maincontainer {
        min-height: 86vh;
    }
    </style>
</head>

<body>
    <?php 
        include 'partials/_dbconnect.php';
        include 'partials/_header.php';
    ?>

    <!-- Search Results  -->
    <div class="container my-3" id="maincontainer">
        <h1 class="py-3">Search results for <em>"<?php echo $_GET['search']; ?>"</em></h1>
        <?php
            $noresults = true;
            $query = $_GET["search"];
            $sql = "select * from threads where match (thread_title, thread_desc) against ('$query')";

            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result))
            {
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $thread_id = $row['thread_id'];
                $url = "thread.php?threadid=".$thread_id;

                // Displaying the search result's
                if($num > 0)
                {
                    $noresults = false;
                    echo '
                        <div class="result">
                            <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
                            <p>
                                '.$desc.'
                            </p>
                        </div>  
                    ';
                }
            }
            if($noresults)
            {
                echo '
                    <div class="jumbotron jumbotron-fluid mb-0 py-3">
                        <div class="container">
                            <p class="display-6">Your search - "'.$query.'" - did not match with any thread.</p>
                            <p class="lead mb-0">Suggestions:
                                <ul>
                                    <li>Make sure that all words are spelled correctly.</li>
                                    <li>Try different keywords.</li>
                                    <li>Try more general keywords.</li>
                                </ul>
                            </p>
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

    <!-- Bootstrap-4 script link's -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>