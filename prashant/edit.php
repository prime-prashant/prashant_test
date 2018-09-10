<?php
include 'config.php';


if(@$_SESSION['status'] != true ) {
    echo'<script>window.location="index.php"</script>';
}
    $act = @$_REQUEST['act'];
    $id = @$_REQUEST['id'];
$us=@$_GET['us'];
    if ($act == 'edit') {
        $query = mysql_query("select * from registration where id ='" . $id . "' ");
        $row = mysql_fetch_array($query);

        ?>
        <form action="#" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>User name:</td>
                    <td><input type="text" name="uname" value="<?php echo $row['uname']; ?>"></td>
                </tr>
                <tr>
                    <td>First name:</td>
                    <td><input type="text" name="fname" value="<?php echo $row['fname']; ?>"></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="lname" value="<?php echo $row['lname']; ?>"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" value="<?php echo $row['email']; ?>"></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" name="dob" value="<?php echo $row['dob']; ?>"></td>
                </tr>
                <tr>
                    <td>Profile Pic:</td>
                    <td><input type="file" name="image" id="image" value="<?php echo $row['image']; ?>"><p id="error"></p></td>
                </tr>
                <tr>

                    <td>
                        <?php if($us =='user') {  ?>
                            <input type="hidden" name="user" value="user">
                        <?php } ?>
                        <input type="hidden" name="id1" value="<?php echo $row['id']; ?>">
                        <input type="submit" name="submit" value="Update Info"></td>

                </tr>
            </table>
        </form>
        <?php
    }

    else if ($act == 'delete')
    {
        $id2 = $_POST['id'];

        mysql_query("DELETE FROM registration WHERE id ='" . $id2 . "';");
        echo 'DELETED Successfully';
        echo '<script>window.location="index.php"</script>';
    }
    else if ($act == 'logout')
    {

        unset($_SESSION['status']);
        unset($_SESSION['user']);
        session_destroy();
        echo '<script>window.location="index.php" </script>';

    }

?>


<?php
if(@$_POST['submit'] == 'Update Info') {
    /*Image Upload Started*/
    $uname1 = @$_POST['uname'];
    $fname1 = @$_POST['fname'];
    $lname1 = @$_POST['lname'];
    $email1 = @$_POST['email'];
    $dob1 = @$_POST['dob'];
    $id1 = @$_POST['id1'];
    $user = @$_POST['user'];
    if (!empty($_FILES['image']['name'])) {
        $imgExt = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        $image = time() . ".jpg";

        if (in_array($imgExt, $valid_extensions)) {
            move_uploaded_file($_FILES["image"]["tmp_name"], 'images/' . $image);
            mysql_query("update registration set uname='" . $uname1 . "' , fname='" . $fname1 . "' , lname='" . $lname1 . "' , email='" . $email1 . "',dob = '" . $dob1 . "',image ='" . $image . "' where id='" . $id1 . "'");
            if ($user == 'user') {
                $_SESSION['user'] = $uname1;
                $_SESSION['imagename'] = $image;
            }
            echo '<script>window.location="index.php"</script>';
        }
        else {
            echo '<a href="index.php">Go To Home Page</a>';
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

    }
    else {
        mysql_query("update registration set uname='" . $uname1 . "' , fname='" . $fname1 . "' , lname='" . $lname1 . "' , email='" . $email1 . "',dob = '" . $dob1 . "' where id='" . $id1 . "'");
        if ($user == 'user') {
            $_SESSION['user'] = $uname1;
        }
        echo '<script>window.location="index.php"</script>';
    }
    /*image update ended*/
}
?>