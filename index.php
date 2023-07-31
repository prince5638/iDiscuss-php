<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head> 

<body>
    <?php 
        include 'partials/_dbconnect.php';
        include 'partials/_header.php';
    ?>

    <!-- Carousel(Slider) code from Bootstrap -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2400x700/?apple,code" class="d-block w-100"
                    alt="image could not load!">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x700/?programmers,microsoft" class="d-block w-100"
                    alt="image could not load!">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x700/?coding,apple" class="d-block w-100"
                    alt="image could not load!">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Category container starts here -->
    <div class="container my-3">
        <h2 class="text-center">iDiscuss - Browse Categories</h2>
        <div class="row">

            <!-- Fetch all the categories -->
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);

            // card code starts here.
            while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['category_id'];
                $cat = $row['category_name'];
                $desc = $row['category_description'];

                echo '
                        <div class="col-md-4 my-2">
                            <div class="card" style="width: 18rem;">
                                <img src="img/c'.$id.'.jpg" class="card-img-top" alt="image for '.$cat.' category!">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h5>
                                    <p class="card-text text-center">'.substr($desc,0,100).'...</p>
                                    <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                                </div>
                            </div>
                        </div>
                     '; 
            }
            ?>
        </div>
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