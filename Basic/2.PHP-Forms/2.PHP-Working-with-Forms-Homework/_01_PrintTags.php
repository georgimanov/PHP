<form action="" method="post">
    <p>Enter Tags:</p>
    <input type="text" name="tags">
    <input type="submit"><br/>
</form>

<?php
    if(isset($_POST['tags'])){
       $input = $_POST['tags'];
       $tags = explode(", ", $input);
        foreach ($tags as $key => $value) {
            echo "{$key} : $value<br />\n";
        }
    }
?>