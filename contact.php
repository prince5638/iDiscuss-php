<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss | Contact Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .container{
            min-height: 83vh;
            background-color: rgba(114, 208, 144, 0.722);
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <?php 
        include 'partials/_dbconnect.php';
        include 'partials/_header.php';
    ?>
    <div class="container my-3">
        <h1 class="text-center mb-3">Contact Us</h1>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4">
            </div>

            <div class="col-md-6">
                <label for="contact" class="form-label">Conatct Number</label>
                <input type="number" class="form-control" id="contact">
            </div>

            <label for="customRange1" class="form-label">How much you rate us out of 10</label>
            <input type="range" class="form-range" id="customRange1">

            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>

            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" class="form-select">
                    <option selected>Ahmedabad</option>
                    <option>Jamnagar</option>
                    <option>Rajkot</option>
                    <option>Amreli</option>
                    <option>surat</option>
                    <option>Out of India</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>

            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Any Suggestion for us!</label>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
    <?php 
        include 'partials/_footer.php';    
    ?>


    <!-- Bootstrap-5 scipt link here -->
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