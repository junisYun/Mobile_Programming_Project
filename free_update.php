<? @session_start() ?>
<html>
    <head>
        <meta charset="utf-8" />
        <script>
            alert(5+3);
</script>
    </head>
<?php
	require_once("dbconn.php");

	$bID = $_POST['bID'];
	$bPassword = $_POST['bPassword'];
	$bContent = $_POST['bContent'];

	$date = date('Y-m-d H:i:s');

	$sql = "insert into free (f_no, f_content, f_date, f_viewcount, f_id, f_password)";
	$sql .= "values(null, '$bContent','$date', 0,'$bID ', password('$bPassword'))";
	$result = mysql_query($sql, $connect);

	if($result) {
		$msg = "complete.";
		$bNo = $db->insert_id;
		$replaceURL = 'free.html';
	}
	else {
		$msg = "fail.";
?>
		<script>
			alert("<?php echo $msg?>");

			history.back();
		</script>
<?php
	}
?>
<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>

<body></body>
</html>