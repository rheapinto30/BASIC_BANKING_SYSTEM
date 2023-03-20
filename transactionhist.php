<?php
include 'connect.php';
$query = "SELECT * from transactions";
$result = mysqli_query($conn, $query);
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!--CSS-->
    <link rel="stylesheet" href="css/transacthist.css">

    <title>Transaction History</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php
    include 'navbar.php';
    ?>
    <div class="container-fluid p-4 bg-1" ;>
        <div class="container-fluid p-4 bg-2">
            <div class="card">
                <div class="card-header text-center">
                    <p class="heading-content m-0">All Transactions</p>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <tr class="table-head">
                            <th>Sr. No</th>
                            <th>Sender</th>
                            <th>Receiver</th>
                            <th>Amount</th>
                            <th>Date & Time</th>
                        </tr>
                        <tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <td><?php echo $row['no'] ?></td>
                                <td><?php echo $row['sender'] ?></td>
                                <td><?php echo $row['receiver'] ?></td>
                                <td><?php echo $row['amount'] ?></td>
                                <td><?php echo $row['date&time']; ?></td>
                        </tr>
                    <?php
                            }
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Footer-->
    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>