<?php
function getTitle(){
	global $pageTitle;
	if(isset($pageTitle)){
		echo lang($pageTitle);
	}else{
		echo lang("DEFAULT");
	}
}

function redirectHome($errorMessage,$seconds=5){
	echo "<div class='alert alert-danger'>$errorMessage</div>";
	echo "<div class='alert alert-info'>you will be redirected to home after $seconds seconds</div>";
	header("refresh:$seconds;url=index.php");
}

function checkItem($select,$table,$value){
	global $con;
	$selectStmt=$con->prepare("SELECT $select FROM $table WHERE username=?");
	$selectStmt->execute(array($value));
	return $selectStmt->rowCount();
}