<?php
require_once __DIR__."/include/header.php" ;
  $result=$score->select_score_All();
?>
<div class="title">
    <h3><i class="fa fa-futbol-o" aria-hidden="true"></i>  Teams </h3>
</div>
<br/>
<div class="row tables">

    <table class="table-striped table table-bordered width text-center">
        <tr>
            <th>Team</th>
            <th>Points</th>
            <th>Win</th>
            <th>Lose</th>
            <th >Draw</th>
        </tr>
        <?php 
        foreach ($result as $score) {?>
            <tr>
                <td>
                    <?php echo "<img src='uploads/{$score['logo']}' class='img img-rounded' />";?><br/>
                    <?php echo $score['name'] ;?>
                </td>
                <td><?php echo $score['points'] ;?></td>
                <td><?php echo $score['win'] ;?></td>
                <td><?php echo $score['lose'] ;?></td>
                <td><?php echo $score['draw'] ;?></td>
            </tr>
       <?php }
        
        ?>

    </table>

</div>

<?php
include("include/footer.php");
?>
