<?php

error_reporting(0);
ini_set('display_errors', 1);
include __DIR__ . "/../include/classes_header.php";
$name = "";
$Filename = "";
$error = '';

if (!isset($_POST['name']) || empty($_POST['name'])) {
    $error.="Please Enter team Name <br/>";
} else {
    $data = array("name" => "{$_POST['name']}");
    $results = $team->check_team($data);
    if(count($results)>0){
           $error.= 'name already exist';
    }else{
       $name = $_POST['name'];
    }
}
$accepted_image_types = array("image/gif", "image/jpg", "image/jpeg", "image/pjpeg", "image/png", "image/x-png");
if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    if (!empty($_FILES['image']['tmp_name'])) {
        if ($_FILES['image']['error'] > 0) {
            switch ($_FILES['image']['error']) {
                case 1: $error.= 'File exceeded upload_max_filesize';
                    break;
                case 2: $error.= 'File exceeded max_file_size';
                    break;
                case 3: $error.= 'File only partially uploaded';
                    break;
                case 4: $error.= 'No file uploaded';
                    break;
                case 6: $error.= 'Cannot upload file: No temp directory specified';
                    break;
                case 7: $error.= 'Upload failed: Cannot write to disk';
                    break;
            }
        } elseif (!in_array($_FILES['image']['type'], $accepted_image_types)) {
            $error.= 'Problem: file is not image';
            #exit;
        }
    } else {
        $error.="Please Add Image...";
    }
} else {
    $error.="Please Add Image...";
}

if (!empty($error)) {
    echo '<div class="alert alert-danger"><strong>Error!</strong>';
    echo $error;
    echo '</div>';
} else {
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $nameimg = time() . $_FILES['image']['name'];
        $Filename = '../uploads/' . $nameimg;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $Filename)) {
            // echo "$Filename";
            echo '<div class="alert alert-danger"><strong>Error!</strong>';
            echo 'Problem: Could not move file to destination directory';
            echo '</div>';
            exit;
        }
    }
    $data = array("name" => "{$name}", "logo" => "{$nameimg}");

    $result = false;
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $result = $team->team_update($data, $_POST['id']);
    } else {
        $result = $team->insert_team($data);

        $scores = array("team_id" => "{$result}");
        $result2 = $score->insert_score($scores);
    }
    if ($result != false) {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            echo '<div class="alert alert-success"><strong>Success!</strong> Team had been Edited...</div>';
        } else {
            echo '<div class="alert alert-success"><strong>Success!</strong> Team had been added...</div>';
        }
    } else {
        echo '<div class="alert alert-danger"><strong>Error!</strong>';
        echo"Can't add this team...";
        echo '</div>';
        array_map('unlink', glob($Filename));
    }
}
?>
