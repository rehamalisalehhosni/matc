<?php
include("include/header.php");
$teams = $team->select_team_All();
?>
<div class="title">
    <h3><i class="fa fa-futbol-o" aria-hidden="true"></i> Add Match </h3>
</div>
<br/>
<div class="row">
    <div class="result col-md-10"></div>
    <form id="DoAddscore" role="form" class="col-md-6" method="post" action="do-add-proudct.php"  enctype="multipart/form-data">
        <div class="form-group">
            <label for="team_name">Team 1:</label>
            <select  name="team1" class="form-control" >
                <?php
                foreach ($teams as $team) {
                    echo"<option value='{$team['id']}'>{$team['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="team_name">score 1:</label>
            <input type="number" name="score1" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="team_name">Team 2:</label>
            <select  name="team2" class="form-control" >
                <?php
                foreach ($teams as $team) {
                    echo"<option value='{$team['id']}'>{$team['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="team_name">score 2:</label>
            <input type="number" name="score2"  class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    $("#DoAddscore").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            url: "ajax/do-add-score.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == "1") {
                    window.location = "index.php";
                } else {
                    $('.result').html(data);
                }
            },
            error: function () {
                $('.result').html("<p class='alert alert-danger'>Something went wrong!!</p>");
            }
        });
    }));

</script>
<?php
include("include/footer.php");
?>
