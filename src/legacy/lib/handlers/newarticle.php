<?php

require('../functions.php');

$editor = $_POST['editor'];
$username = $_SESSION['username'];
$time_posted = time();
$article_id = hash('crc32', $editor . $time_posted . md5($username), FALSE);

//Post article query
$post_query = $conn->prepare("INSERT INTO posts (body, time_posted, article_id) VALUES (':body', ':time_posted', ':article_id');");
/*
Article ID hashing includes a MD5 hashed timestamp, so there is absolutely no need to check if the article ID already exists.
*/

if(strlen($editor) < 4000){
    if($post_query->execute(array(
        ':body' => $editor,
        ':time_posted' => $time_posted,
        ':article_id' => $article_id,
    ))){
        console('Article posted');
    }
} else {
    $_SESSION['error'] = 'The article cannot contain more than 4000 characters.';
}
?>