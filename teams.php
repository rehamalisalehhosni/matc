<?php
require_once __DIR__."/include/header.php" ;
  $result=$team->select_team_All();
?>
<div class="title">
    <h3><i class="fa fa-futbol-o" aria-hidden="true"></i>  Teams </h3>
</div>
<br/>
<div class="row tables">

    <table class="table-striped table table-bordered width">
        <tr>
            <th>logo</th>
            <th>Team Name</th>
        </tr>
        <?php 
        foreach ($result as $team) {?>
            <tr>
                <td><?php echo "<img src='uploads/{$team['logo']}' class='img img-rounded' />";?></td>
                <td><?php echo $team['name'] ;?></td>
            </tr>
       <?php }
        
        ?>

    </table>

</div>

<?php
include("include/footer.php");
?>
