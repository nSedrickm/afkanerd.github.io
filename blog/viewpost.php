//controls the way posts are viewed by users
<?php require('includes/config.php');

$stmt = $db -> prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postID = :postID');
$stmt -> execute(array(':postID' => $_GET['id']));
$row = $stmt -> fetch();

//if post does not exist then edirect user
if($row['postID'] == '') {
  header('Location: ./');
  exit;
}

?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog - <?php echo $row['postTitle'];?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
  </head>
  <body>

    <div id="wrapper">

      <h1>Blog</h1>
      <hr />
      <p><a href="./">Blog Index</a></p>
<?php
echo '<div>';
    echo '<h1>'.$row['postTitle'].'</h1>';
    echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
    echo '<p>'.$row['postCont'].'</p>';
echo '</div>';

?>
</div>

  </body>
</html>
