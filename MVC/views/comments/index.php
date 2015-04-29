<?php var_dump($comments); ?>

<ul>
<?php foreach($comments as $comment): ?>

    <li><?php echo $comment['id'] . " ( " . $comment['content'] . " ) "; ?> <a href="#" >edit</a> <a href="#" >delete</a></li>

<?php endforeach; ?>
</ul>
