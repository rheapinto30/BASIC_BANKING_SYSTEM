<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!--CSS-->
    <link rel="stylesheet" href="css/index.css">

    <title>Banking</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container-fluid p-0">

        <!--Brand Page Section 1-->
        <section id="section1">
            <div class="main-header mx-auto text-center">
                <img src="img/bank.png" alt="Bank_Image" height="300px" width="300px">
                <!--/banking/new/bank1.png-->
                <h1 class="d-flex justify-content-center maintext">THE SPARKS BANK</h1>
                <p class="d-flex justify-content-center subtext">Make it happen.</p>
                <!--<p class="d-flex justify-content-center subtext">Not Your Typical Bank</p>-->
            </div>
        </section>

        <!--Brand Page Section 2-->
        <section id="section2">
            <div class="container-fluid py-3">
                <div class="row align-items-center text-center justify-content-center g-2 g-lg-2 g-md-1 my-2">
                    <div class="col-12 col-md-6 col-lg-4 mx-auto">
                        <div class="card rounded-4">
                            <div class="card-body m-auto py-5">
                                <h5 class="card-title">ALL CUSTOMERS</h5>
                                <p class="card-content"><img class="services-img1" src="img/customer.jpg"></p>
                                <a href="allusers.php" class="btn">View all customers <i class="fa-solid fa-user"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mx-auto">
                        <div class="card rounded-4">
                            <div class="card-body m-auto py-5">
                                <h5 class="card-title">TRANSACTION HISTORY</h5>
                                <p class="card-content"><img class=" services-img2" src="img/transactions.jpg"></p>
                                <a href="allusers.php" class="btn">View all transactions <i class="fa-solid fa-file-invoice"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--Footer-->
    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>