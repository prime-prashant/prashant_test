<!DOCTYPE html>
<html >
<head>
    <title></title>
</head>
<body>
<form name="login" method="post" action="<?php echo base_url(); ?>index.php/Form_controller/loginprocess">
<table>
        <tr><td>Roll_no:</td><td><input type="text" name="roll_no" id="roll_no"></td></tr>

        <tr><td>Name:</td><td><input type="text" name="name" id="name"></td>
        </tr>
        <tr><td><input type="submit" name="submit" value="Insert"></td><td><a href="<?php echo base_url(); ?>index.php/Form_controller/registration">Registration</a></td></tr>
</table>     </form>   <table border = "1">
         <?php

            $i = 1;
            echo "<tr>";
            echo "<td>Sr#</td>";
            echo "<td>Roll No.</td>";
            echo "<td>Name</td>";
            echo "<td>Edit</td>";
            echo "<td>Delete</td>";
            echo "<tr>";

            foreach($records as $r) {
                echo "<tr>";
                echo "<td>".$i++."</td>";
                echo "<td>".$r->roll_no."</td>";
                echo "<td>".$r->name."</td>";
                echo "<td><a href = '".base_url()."index.php/form/edit/"
                    .$r->roll_no."'>Edit</a></td>";
                echo "<td><a href = '".base_url()."index.php/form/delete/"
                    .$r->roll_no."'>Delete</a></td>";
                echo "<tr>";
            }
         ?>
    </table>





</body>
</html>
