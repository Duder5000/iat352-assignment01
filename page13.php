<?php 
	if( isset($_GET['firstname'])) $firstname=trim($_GET['firstname']); 
	if( isset($_GET['lastname'])) $lastname=trim($_GET['lastname']); 
	if( isset($_GET['gender'])) $gender=$_GET['gender']; 
	if( isset($_GET['course'])) $course=$_GET['course']; 

	if (!empty($firstname) && !empty($lastname) && 
		!empty($gender) && !empty($course)) {
		$fp = @fopen("students.txt",'a');
		if(!$fp) {
			echo "<strong>Your registration was not processed due to system problem. Please try again later.</strong>";
			exit;
		}
		$out = $firstname.",".$lastname.",".$gender.",".$course."\n";
		fwrite($fp,$out);
		fclose($fp);
		
		header('Location: enrolled13.php');
		exit;
	}
	
	require('header.php');
	
	echo "<h1>Form input examples:</h1>";

	$incomplete = !empty($firstname) || !empty($lastname) || 
		!empty($gender) || !empty($course);

	echo $incomplete ? "<p>Please fill in the <font style=\"background-color:Yellow;\">missing</font> information below</p>" 
			: "<p>Please fill in the form below</p>";
	
	require('page11_functions.php');

	echo "<form action=\"page13.php\">";
	
	p11_form_start();
	p11_textfield('First name:','firstname',$incomplete);
	p11_textfield('Last name:','lastname',$incomplete);
	p11_gender('Gender:', 'gender', ['male','female','other'],
		['Male','Female','Other'],$incomplete);
	p11_course('Course:', 'course', ['','iat100','iat102','iat103'],
		['Select a course',
		'IAT100 - Digital Image Design',
		'IAT102 - Graphic design',
		'IAT103 - Design Communication and Collaboration'],$incomplete);
	p11_form_end();
	echo "</form>";

	require('footer.php');
?>
