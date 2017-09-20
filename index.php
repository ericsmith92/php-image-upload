<?php
    require_once "includes/header.php";
?>

<div id="form-container">
    <form action="includes/upload.php" method="post" enctype="multipart/form-data">
        <!--MAX_FILE_SIZE hidden input field-->
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <input type="file" name="file" id="file">
        <div id="form-container--submit">
            <input type="submit" value="Upload File" name="submit">
        </div>
    </form>
    <?php
        if(isset($response)){
            echo $response;
        }
    ?>
</div>
<?php
    require_once "includes/footer.php";
?>
