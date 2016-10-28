<?php
include("include/header.php");
?>
<div class="title">
    <h3><i class="fa fa-futbol-o" aria-hidden="true"></i> Add Teams </h3>
</div>
<br/>
<div class="row">
    <div class="result col-md-10"></div>
    <form id="DoAddTeam" role="form" class="col-md-6" method="post" action="do-add-proudct.php"  enctype="multipart/form-data">
        <div class="form-group">
            <label for="team_name">Team name:</label>
            <input type="text" name="name" class="form-control" >
        </div>
        <div class="form-group">
            <label for="team_name">Team logo:</label>
            <input type="file" name="image" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
$("#DoAddTeam").on('submit',(function(e){
    e.preventDefault();
    $.ajax({
        url: "ajax/do-add-team.php",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            if(data == "1"){
              window.location = "index.php";
            }else { 
                   $('.result').html(data);
               }
          },
           error: function(){
             $('.result').html("<p class='alert alert-danger'>Something went wrong!!</p>");
         } 	        
    });
  }));



</script>
<?php
include("include/footer.php");
?>
