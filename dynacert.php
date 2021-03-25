<?php
	if(isset($_POST['submit'])){
		$font = "BRUSAHSCI.TIF";
		$image = imagecreatefromjpeg("certificate.jpg");
		$color = imagecolorallocate($image, 19, 21, 22);
		$name = "Oyebade Adedoyin";
		$date = time();
		imagettftext($image, 50, 0, 365, 420, $color, $font, $_POST['name']);
		imagettftext($image, 20, 0, 450, 595, $color, "AGENCYR.TIF",$date);
		$file = time();
		$file_path = "certificate/".$file.".jpg";
		$file_path_pdf = "certificate/".$file.".pdf";
		imagejpeg($image, $file_path);
		imagedestroy($image);

		require("fpdf.php");
		$pdf=new FPDF();
		$pdf->AddPage();
		$pdf->Image($file_path, 0, 0, 250, 300);
		$pdf->Output($file_path_pdf,"f")

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<input type="text" name="name">
		<input type="submit" name="submit">
	</form>
</body>
</html>