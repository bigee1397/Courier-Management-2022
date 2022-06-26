<!-- for 'courier' navbar, courier placing page -->
<?php
session_start();
if (isset($_SESSION['uid'])) {
    echo "";
} else {
    header('location: ../index.php');
}

?>
<?php
include('header.php');
$email = $_SESSION['emm'];
$uid = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <style>
        body {
            background-image: url('../images/dd1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <form action="courierMenu.php" method="POST" enctype="multipart/form-data">
        <div style="overflow-x:auto;">
            <table  style="margin: auto;align-items:center; font-weight:bold; border-spacing: 5px 15px;">
                <th colspan="4" style="text-align: center;color:white; width: 140px; height: 50px;">Fill The Details Of Sender & Receiver</th>
                <tr>
                    <td colspan="4" style="text-align: center;">
                        <hr>
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <th colspan="2" style="color:white;">SENDER</th>
                    <th colspan="2" style="color:white;">RECEIVER</th>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th colspan="2"></th>
                    <th colspan="2"></th>
                </tr>
                <tr>
                    <td style="color:white;">Name:</td>
                    <td><input style="color:white;" type="text" name="sname" placeholder="Sender FullName" required></td>

                    <td style="color:white;">Name:</td>
                    <td><input style="color:white;" type="text" name="rname" placeholder="Sender FullName" required></td>
                </tr>
                <tr>
                    <td style="color:white;">Email:</td>
                    <td><input type="text" name="semail" value="<?php echo $email; ?>" readonly></td>

                    <td style="color:white;">Email:</td>
                    <td><input type="text" name="remail" placeholder="Receiver EmailId" required></td>
                </tr>
                <tr>
                    <td style="color:white;">PhoneNo.:</td>
                    <td><input type="number" name="sphone" placeholder="Sender Number" required></td>

                    <td style="color:white;">PhoneNo.:</td>
                    <td><input type="number" name="rphone" placeholder="Receiver Number" required></td>
                </tr>
                <tr>
                    <td style="color:white;">Address:</td>
                    <td><input type="textfield" name="saddress" placeholder="Sender Address" required></td>

                    <td style="color:white;">Address:</td>
                    <td><input type="textfield" name="raddress" placeholder="Receiver Address" required></td>
                </tr>
                <tr>
                    <td colspan="4">✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️</td>
                </tr>
                <tr>
                    <td style="color:white;">Weight:</td>
                    <td><input type="number" name="wgt" placeholder="Weights in kg" required></td>

                    <td style="color:white;">Payment Id:</td>
                    <td><input type="number" name="billno" placeholder="Enter Transaction Number" required></td>
                </tr>
                <tr>
                    <!-- <td>Date:</td><td><input type="date" name="date"></td> -->
                    <td style="color:white;">Date:</td>
                    <td><input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly /></td>
                    <td style="color:white;">Items Image:</td>
                    <td><input type="file" name="simg" ></td>
                </tr>
                <tr>
                    <td colspan="4" align="center"><input type="submit" name="submit" value="Place Order" style="background-color: orange; border-radius: 15px; width: 140px; height: 50px;cursor:pointer;"></td>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>

<?php

if (isset($_POST['submit'])) { //if we'll not give this,it'will submit from with zero values.

    include('../dbconnection.php');

    $sname = $_POST['sname'];
    $rname = $_POST['rname'];
    $semail = $_POST['semail'];
    $remail = $_POST['remail'];
    $sphone = $_POST['sphone'];
    $rphone = $_POST['rphone'];
    $sadd = $_POST['saddress'];
    $radd = $_POST['raddress'];
    $wgt = $_POST['wgt'];
    $billn = $_POST['billno'];
    $originalDate = $_POST['date'];
    $newDate = date("Y-m-d", strtotime($originalDate));
    $imagenam = $_FILES['simg']['name'];
    $tempnam = $_FILES['simg']['tmp_name'];

    move_uploaded_file($tempnam, "../dbimages/$imagenam");

    $qry = "INSERT INTO `courier` (`sname`, `rname`, `semail`, `remail`, `sphone`, `rphone`, `saddress`, `raddress`, `weight`, `billno`, `image`,`date`,`u_id`) VALUES ('$sname', '$rname', '$semail', '$remail', '$sphone', '$rphone', '$sadd', '$radd', '$wgt', '$billn', '$imagenam', '$newDate','$uid');";
    $run = mysqli_query($dbcon, $qry);

    // $trackqry= "INSERT INTO `track` (`u_id`, `c_id`) VALUES ('$uid', 'LAST_INSERT_ID()')";
    //$runtrack = mysqli_query($dbcon, $trackqry);

    if ($run == true) {

    ?> <script>
            alert('Order Placed Successfully :)');
            window.open('courierMenu.php', '_self');
        </script>
    <?php
    }
}

?>