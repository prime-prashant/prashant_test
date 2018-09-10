<?php
        include 'header.php';


$sess = @$_SESSION['status'];
if($sess == true)
{ ?><div>
    <div  style="float:right; margin-left:70%;margin-right:10%;margin-bottom: 10px   ">
        <table>
            <tr>
            <td>
                <?php echo 'Welcome '.$_SESSION['user'] .' | ';
                    echo '<b><a href="edit.php?act=logout">Logout</a></b>';
                ?>
            </td>
        </tr>
        <tr><td>
                <image style="border-radius: 20px;" src="images/<?php
                echo $_SESSION['imagename'];
                ?>"  height="150px" width="200px"></image>
            </td></tr>
        <tr>
               <td>  <?php
                    echo ' Last Login Time ->'. $_SESSION['lastlogin'];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                    echo 'Joining date ->'. $_SESSION['joindate'];
                echo '<br> Position ->'.$_SESSION['role'];
                ?>
            </td>
        </tr>
        <tr><td><a href="edit.php?id=<?php echo $_SESSION['id'];?>&act=edit&us=user">Update Profile</a></td></tr>
       </table>
    </div>

        <div style="float: left"  ng-app="myApp" ng-controller="recordcontrol">

            <pre> Search : <input type="text" ng-model="query"> <span ng-click="search('')" ng-model="query" >All ({{(names | filter:query).length}})</span> <?php if($_SESSION['role']=='Admin')
    {
                ?>| <span ng-click="search('designer')" ng-model="query">Designer ({{(names | filter: 'Designer' |filter:query ).length}})</span> <span ng-click="search('developer')"  ng-model="query">| Developer ({{(names | filter: 'Developer' |filter: query ).length}})</span> <span ng-click="search('manager')"  ng-model="query">| Manager ({{(names | filter: 'Manager' |filter: query ).length}})</span><?php }
                else if($_SESSION['role']=='Manager')
                {
                    ?>| <span ng-click="search('designer')" ng-model="query">Designer ({{(names | filter: 'Designer' |filter:query ).length}})</span> <span ng-click="search('developer')"  ng-model="query">| Developer ({{(names | filter: 'Developer' |filter: query ).length}})</span><?php } else {?>                               <?php } ?>
                                                                                                     No. of Records per page : <input style="width: 100px;"   type="number" ng-model="item" min="2" max="10" ng-init="item=4"></pre>
                    <div style="float:left;margin-left:10px;margin-top: 10px; " ng-repeat="x in names |filter: query | filter: searchQuery | limitTo : item  : ((bigCurrentPage-1) * item)  ">
                            <image style="border-radius: 20px;" src="images/{{ x.image }}" width="400px" height="300px"></image><br>
                           Name: {{ x.uname }}<br>
                           Date Of Birth: {{ x.dob }}<br>
                           Role : {{ x.role }}<br><?php    if($_SESSION['role']=='Admin' || $_SESSION['role']=='Manager') { ?>

                            <div style="float: left; margin-right: 10px"><form name="foo" action="edit.php" method="post">
                                <input type="hidden" name="act" value="edit">
                                <input type="hidden" name="id" value="{{x.id}}">
                                <input type="submit" class="btn btn-primary " value="Edit"> </form></div>

                             <div style="float: left; margin-left: 10px">   <form name="foo" action="edit.php" method="post">
                                <input type="hidden" name="act" value="delete">
                                <input type="hidden" name="id" value="{{x.id}}">
                                <input type="submit" class="btn btn-primary " value="Delete"> </form></div><?php   }?>
                    </div>
                <div style="width:100% ;float: left;Padding-left:700px; ">
                    <pagination ng-model="bigCurrentPage" force-ellipses="true" total-items="(names | filter:query |filter :searchQuery).length" items-per-page="item" page="bigCurrentPage" max-size="maxSize" class="pagination-small" boundary-links="true"></pagination>
                </div>
        </div>
    </div>
    <?php
}
else
{?>
<button type="button" class="btn btn-primary " onclick="location.href='registration.php'" >Registration</button>
<button type="button" class="btn btn-primary " onclick="location.href='login.php'">login</button>
<?php
}
?>

</body>
</html>