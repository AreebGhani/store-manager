<?php
session_start();
if (!isset($_SESSION['Name'])) {
?>
    <script>
        history.back();
    </script>
<?php
}
include "../dbconnect.php";
extract($_POST);

if (isset($_POST["submit"])) {

    if (isset($_POST['Star1'])) {
        $id = $_POST['Star1'];
        $query = "UPDATE users SET Star1 = 1 WHERE id = $id";
        $insert = mysqli_query($connect, $query);
        if ($insert) {
            if(isset($_GET['pg'])){
                echo "<script>window.location.replace('../additional/users.php');</script>";
            }else{
                echo "<script>window.location.replace('../dashboard.php#team');</script>";
            }
        } else {
            if(isset($_GET['pg'])){
                echo "<script>window.location.replace('../additional/users.php');</script>";
            }else{
                echo "<script>window.location.replace('../dashboard.php#team');</script>";
            }
        }
    } else {
        if (isset($_POST['Star2'])) {
            $id = $_POST['Star2'];
            $query = "UPDATE users SET Star2 = 1 WHERE id = $id";
            $insert = mysqli_query($connect, $query);
            if ($insert) {
                if(isset($_GET['pg'])){
                    echo "<script>window.location.replace('../additional/users.php');</script>";
                }else{
                    echo "<script>window.location.replace('../dashboard.php#team');</script>";
                }
            } else {
                if(isset($_GET['pg'])){
                    echo "<script>window.location.replace('../additional/users.php');</script>";
                }else{
                    echo "<script>window.location.replace('../dashboard.php#team');</script>";
                }
            }
        } else {
            if (isset($_POST['Star3'])) {
                $id = $_POST['Star3'];
                $query = "UPDATE users SET Star3 = 1 WHERE id = $id";
                $insert = mysqli_query($connect, $query);
                if ($insert) {
                    if(isset($_GET['pg'])){
                        echo "<script>window.location.replace('../additional/users.php');</script>";
                    }else{
                        echo "<script>window.location.replace('../dashboard.php#team');</script>";
                    }
                } else {
                    if(isset($_GET['pg'])){
                        echo "<script>window.location.replace('../additional/users.php');</script>";
                    }else{
                        echo "<script>window.location.replace('../dashboard.php#team');</script>";
                    }
                }
            } else {
                if (isset($_POST['Star4'])) {
                    $id = $_POST['Star4'];
                    $query = "UPDATE users SET Star4 = 1 WHERE id = $id";
                    $insert = mysqli_query($connect, $query);
                    if ($insert) {
                        if(isset($_GET['pg'])){
                            echo "<script>window.location.replace('../additional/users.php');</script>";
                        }else{
                            echo "<script>window.location.replace('../dashboard.php#team');</script>";
                        }
                    } else {
                        if(isset($_GET['pg'])){
                            echo "<script>window.location.replace('../additional/users.php');</script>";
                        }else{
                            echo "<script>window.location.replace('../dashboard.php#team');</script>";
                        }
                    }
                } else {
                    if (isset($_POST['Star5'])) {
                        $id = $_POST['Star5'];
                        $query = "UPDATE users SET Star5 = 1 WHERE id = $id";
                        $insert = mysqli_query($connect, $query);
                        if ($insert) {
                            if(isset($_GET['pg'])){
                                echo "<script>window.location.replace('../additional/users.php');</script>";
                            }else{
                                echo "<script>window.location.replace('../dashboard.php#team');</script>";
                            }
                        } else {
                            if(isset($_GET['pg'])){
                                echo "<script>window.location.replace('../additional/users.php');</script>";
                            }else{
                                echo "<script>window.location.replace('../dashboard.php#team');</script>";
                            }
                        }
                    }
                }
            }
        }
    }
}
?>