<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss | About Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: black;
        }
        .container {
            margin: 0 auto;
            padding: 20px;
            /* background-color: #fff; */
            background-color: rgba(114, 208, 144, 0.722);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: black;
            text-align: center;
        }
        p {
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <?php 
        include 'partials/_dbconnect.php';
        include 'partials/_header.php';
    ?>

    <div class="container my-3">
        <h1>About iDiscuss</h1>
        <p><b>Welcome to iDiscuss – Your Exclusive Technology Discussion Platform</b></p>
        
        <p>At iDiscuss, I am dedicated to providing a secure and focused environment for in-depth discussions on a wide array of technology topics. As a curated platform, we believe in fostering a community of knowledgeable individuals who are passionate about sharing and gaining insights.</p>
        
        <h2>Our Mission</h2>
        <p>My mission is clear: to offer a controlled and valuable space where tech enthusiasts can engage in meaningful conversations, seek answers, and contribute their expertise. iDiscuss aims to empower individuals by connecting them with like-minded peers and experts, fostering growth and learning in the ever-evolving tech landscape.</p>
        
        <h2>What iDiscuss Offer</h2>
        <ul>
            <li>Private Discussions: iDiscuss is a members-only platform, ensuring that discussions, questions, and answers are provided by genuine individuals invested in technology.</li>
            <li>Secure Networking: Connect with professionals, hobbyists, and experts in a secure setting. Build your network, exchange ideas, and enhance your understanding of various technologies.</li>
            <li>Ask and Answer: As a registered member, you have the privilege to both ask questions and provide answers. This reciprocal relationship is at the core of our community, enabling mutual growth and knowledge sharing.</li>
            <li>Focused Conversations: Our platform is designed for focused interactions. Without the distractions of general social media, you can dive deep into tech subjects that matter most to you.</li>
        </ul>
        
        <h2>Join Our Community</h2>
        <p>To join the discussions, gain insights, and contribute to our technology-focused community, simply register for an account. As a member of iDiscuss, you'll have access to a wealth of knowledge and a network of passionate individuals eager to exchange ideas.</p>
        
        <h2>Contact Us</h2>
        <p>If you have any inquiries or suggestions, please don't hesitate to reach out. Contact our team at <a href="mailto:contact@idiscuss.com">contact@idiscuss.com</a>, and we'll be happy to assist you.</p>
        
        <p>Thank you for choosing iDiscuss as your exclusive technology discussion platform. Let's learn, share, and grow together in the world of technology.</p>
    </div>
    <?php 
        include 'partials/_footer.php';    
    ?>

    <!-- Bootstrap-5 script link's -->
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