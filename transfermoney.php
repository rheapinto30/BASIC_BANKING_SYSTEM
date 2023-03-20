<?php
include 'connect.php';
$sid = $_GET['id'];

if (isset($_POST['submit'])) {
    $from = $sid; //$from = $_GET['id'];
    $to = $_POST['pay-to'];
    $amount = $_POST['amount'];

    $send = "SELECT * from customers where uid=$from";
    $query1 = mysqli_query($conn, $send);
    $sql1 = mysqli_fetch_array($query1);

    $rec = "SELECT * from customers where uid=$to";
    $query2 = mysqli_query($conn, $rec);
    $sql2 = mysqli_fetch_array($query2);

    if ($amount == 0) {
        echo '<script type="text/javascript">alert("Zero value cannot be transferred!")</script>';
    } else if ($amount > $sql1['balance']) {
        echo '<script type="text/javascript">alert("Insufficient Balance!")</script>';
    } else if (($amount) < 0) {
        echo '<script type="text/javascript">alert("Negative values cannot be transferred!")</script>';
    } else {
        $snewbal = $sql1['balance'] - $amount;
        $qs = "UPDATE customers set balance=$snewbal where uid=$from";
        mysqli_query($conn, $qs);

        $rnewbal = $sql2['balance'] + $amount;
        $qr = "UPDATE customers set balance=$rnewbal where uid=$to";
        mysqli_query($conn, $qr);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $transfer = "INSERT INTO transactions (`sender`,`receiver`,`amount`) VALUES('$sender','$receiver','$amount')";
        $t = mysqli_query($conn, $transfer);

        if ($t) {
            echo '<script type="text/javascript">alert("Transaction Successful");window.location.href = "./transactionhist.php";</script>';
        }
        $snewbal = $rnewbal = 0;
        $amount = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!--CSS-->
    <link rel="stylesheet" href="css/transfermoney.css">

    <title>Document</title>
</head>

<body>
    <?php
    include 'navbar.php'
    ?>
    <div class="container-fluid p-4 bg-1">
        <div class="container-fluid py-3 px-4 bg-2">
            <div class="row align-items-center text-center justify-content-center g-2 g-lg-2 g-md-1 my-2 ">
                <div class="card-header text-center border-2 rounded-3 p-3 m-2">
                    <p class="heading-content m-0">Transfer Money</p>
                </div>
            </div>
            <div class="row g-2 g-lg-2 g-md-1 my-2 mx-0">
                <div class="col-lg-7 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title pb-2">Transfer To:</h5>
                            <div class="card-content">
                                <form method="post" name="tcredit">
                                    <div class="row g-3">
                                        <div class="col-lg-12 col-md-6">
                                            <label for="pay-to" class="form-label">Pay to: </label>
                                            <div class="input-group">
                                                <select class="form-select" name="pay-to" id="pay-to" required="">
                                                    <option disabled="" selected="">Select Name...</option>
                                                    <option>Option 1</option>
                                                    <?php
                                                    $sel = "SELECT * FROM customers where uid!=$sid";
                                                    $selres = mysqli_query($conn, $sel);
                                                    if (!$result) {
                                                        echo "Error " . $sql . "<br>" . mysqli_error($conn);
                                                    }
                                                    while ($opt = mysqli_fetch_assoc($selres)) {
                                                    ?>
                                                        <option value="<?php echo $opt['uid']; ?>">
                                                            <?php echo $opt['name']; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-6">
                                            <label for="amount" class="form-label">Amount: </label>
                                            <div class="input-group mb-1">
                                                <label for="amount"></label>
                                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-evenly mt-4 mb-2">
                                        <button class="btn form-btn btn-mg" name="submit" type="submit" id="myBtn">Transfer</button>
                                        <a href="allusers.php" class="btn form-btn" name="reset" type="reset" id="rcBtn">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <?php
                    $sinfo = "SELECT * FROM  customers where uid=$sid";
                    $result = mysqli_query($conn, $sinfo);
                    if (!$result) {
                        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $details = mysqli_fetch_assoc($result);
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title pb-1">Sender Details:</h5>
                            <div class="card card-content p-2 d-flex flex-column justify-content-center ">
                                Sender ID:
                                <?php echo $details['uid'] ?>
                                <hr>
                                Sender Name:
                                <?php echo $details['name'] ?>
                                <hr>
                                Sender Email:
                                <?php echo $details['email'] ?>
                                <hr>
                                Sender Balance: Rs.
                                <?php echo $details['balance'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>