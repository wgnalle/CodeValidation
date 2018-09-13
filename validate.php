<?php
require 'XmlIsValid.php';

$val = $_POST['val'];
$code = $_POST['code1'];

function catchErrors($code, $message, $file, $line) {
	echo "Error detected";
}

if (!strcmp($val, 'XML')) {
	if (XmlIsValid($code)) {
		echo "";
	} else {
		echo "Code is invalid";
	}
} else {
	$tmpfile = "tmp/temp_". rand();
	$handle = fopen($tmpfile, "w+");
	fwrite($handle, "<?php\n" . $code . "\n?>");
	fclose($handle);
	
	echo exec('php -l ' . $tmpfile, $output, $return_var);

	unlink($tmpfile);

}

?>
