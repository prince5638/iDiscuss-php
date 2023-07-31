<?php
session_start();

echo '
    <nav class="navbar navbar-expand-lg text-light bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/forum">iDiscuss</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/forum">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                    
                    $sql = "SELECT * FROM `categories` LIMIT 3";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '
                            <a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a>
                        ';
                    }
                    
                    echo '</div>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>';

            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
            {
                echo '
                    <form class="d-flex" role="search" action="search.php" method="GET">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>        
                    <p class="my-0 mx-2">Welcome '.$_SESSION['useremail'].'</p>
                    <a href="partials/_logout.php" class="btn btn-outline-success ml-2" >Logout</a>
                ';
            }
            else{
                echo '
                    <form class="d-flex" role="search" action="search.php" method="GET">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                    <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
                ';
            }

            echo '</div>
        </div>
    </nav>
    ';

    include 'partials/_loginModal.php';
    include 'partials/_signupModal.php';

    // alerts showing related to SignUp.
    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true")
    {
        echo '
            <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> You can now login!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
    if(isset($_GET['signuperror']))
    {
        echo '
            <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error! </strong> '.$_GET['signuperror'].'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }

    // alerts showing related to Login.
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true")
    {
        echo '
            <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> You logged in successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
    if(isset($_GET['loginerror']))
    {
        echo '
            <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error! </strong>'.$_GET['loginerror'].'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
?>