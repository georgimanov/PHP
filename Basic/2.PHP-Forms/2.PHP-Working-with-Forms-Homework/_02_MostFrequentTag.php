<form action="" method="post">
    <p>Enter Tags:</p>
    <input type="text" name="tags">
    <input type="submit"><br/>
</form>

<?php
if(isset($_POST['tags'])){
    $input = $_POST['tags'];
    $tags = array_count_values(explode(", ", $input));
    arsort($tags);

    foreach ($tags as $key => $value) {
        echo  $key . " : " . $value ." times<br />9\n";
    }

    echo "<br/>" . "Most Frequent Tag is: " . array_search(max($tags),$tags);
    }
?>