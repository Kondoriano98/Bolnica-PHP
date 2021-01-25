 <?php
	session_start();
	$connect = mysqli_connect('localhost','root', '');
	mysqli_select_db($connect, 'bolnica' );

	if(isset($_GET['id'])){
	
		$id=$_GET['id'];
		
		$upit=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM soba WHERE id='$id'"))[0];
		mysqli_query($connect, "DELETE FROM soba
		WHERE id='$id'");
		header("refresh:0;url=pocetna.php");	
		echo '<script language="javascript">';
		echo 'alert("Red je obrisan.")';
		echo '</script>';
		exit;	
}	
?>