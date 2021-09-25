<?php 
	if( isset($_GET['recipeName'])) $recipeName=trim($_GET['recipeName']); 
	if( isset($_GET['ingredientList'])) $ingredientList=trim($_GET['ingredientList']); 
	if( isset($_GET['course'])) $course=$_GET['course']; 

	if (!empty($recipeName) && !empty($ingredientList) && !empty($course)) {
		$fp = @fopen("students.txt",'a');
		if(!$fp) {
			echo "<strong>Your registration was not processed due to system problem. Please try again later.</strong>";
			exit;
		}
		$out = $recipeName.",".$ingredientList.",".$course."\n";
		fwrite($fp,$out);
		fclose($fp);
		
		header('Location: enrolled13.php');
		exit;
	}
	
	require('header.php');
	
	$incomplete = !empty($recipeName) || !empty($ingredientList) || !empty($course);

	echo $incomplete ? "<p>Please fill in the <font style=\"background-color:Yellow;\">missing</font> information below</p>" 
			: "<p>Please fill in the recipe input form below</p>";
	
	require('page11_functions.php');

	echo "<form action=\"page13.php\">";
	
	p11_form_start();
	p11_textfield('Recipe Name:','recipeName',$incomplete);
	p11_textfield('Ingredient List:','ingredientList',$incomplete);
	p11_course('Course:', 'course', ['','breakfast','lunch','dinner'],
		['Select a course',
		'Breakfast',
		'Lunch',
		'Dinner'],$incomplete);
	p11_form_end();
	echo "</form>";

	require('footer.php');
?>