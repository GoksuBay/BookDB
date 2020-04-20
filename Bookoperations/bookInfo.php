<?php require_once 'connect.php'; ?>

<?php 
$dbQuery=$db->prepare("SELECT * FROM book WHERE id=:id");
$dbQuery->execute(array(
  'id' => $_GET['id']));
$dbPull=$dbQuery->fetch(PDO::FETCH_ASSOC);
?>

<html>
<head>
	<h1><b> BOOKS</b></h1>
</head>

<body>
</br>	
<img src="Cover.png"> <h1><?php echo $dbPull['bookName']; ?></h1></img>

<hr color="black" /> 
<p><h1> Summary: <br> <?php echo $dbPull['bookSummary']; ?> </h1>  </p>            
<hr color="black" />
<h1>
 <ul>
  <!-- List for book informations  -->
  <a href="">              <li> Author:<?php echo $dbPull['bookAuthor']; ?> </li>         </a>
                           <li> ISBN:<?php echo $dbPull['id']; ?> </li>
                           <li> Number of pages:  <?php echo $dbPull['bookPagenumber']; ?> </li>
                           <li> Score:   <?php echo $dbPull['bookScore']; ?></li>
                           <li> Category</li>
                           <li> Release Date:  <?php echo $dbPull['bookPhoto']; ?></li>
                           <li> Comment area: </li>

</h1>
</ul>
</body>


</html>