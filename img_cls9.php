<?php
		include_once "functii.php";
		connect(onc);
		$query="SELECT * FROM rezultate,participanti WHERE rezultate.id_elev=participanti.id AND participanti.cls='IX'";
		$result=mysql_query($query);
		$tot=mysql_num_rows($result);
		$query="SELECT * FROM rezultate,participanti WHERE rezultate.id_elev=participanti.id AND participanti.cls='IX' AND rezultate.premiu='I'";
		$result=mysql_query($query);
		$unu=mysql_num_rows($result);
		$query="SELECT * FROM rezultate,participanti WHERE rezultate.id_elev=participanti.id AND participanti.cls='IX' AND rezultate.premiu='II'";
		$result=mysql_query($query);
		$doi=mysql_num_rows($result);
		$query="SELECT * FROM rezultate,participanti WHERE rezultate.id_elev=participanti.id AND participanti.cls='IX' AND rezultate.premiu='III'";
		$result=mysql_query($query);
		$trei=mysql_num_rows($result);
		$query="SELECT * FROM rezultate,participanti WHERE rezultate.id_elev=participanti.id AND participanti.cls='IX' AND rezultate.premiu='M'";
		$result=mysql_query($query);
		$mentiune=mysql_num_rows($result);
		$inaltime=140;
        $latime=400;
        $img=imagecreate($latime,$inaltime);
		$culoare=imagecolorallocate($img,255,255,255);
		$culoarecerc2=imagecolorallocate($img,0,151,75);
		$culoarecerc4=imagecolorallocate($img,200,0,0);
		$x1=30;
		$y1=100;
		$x2=40;
		$y2=100-(100*$unu/$tot);
		imagefilledrectangle($img, $x1, $y1, $x2, $y2, $culoarecerc4);
		imagestring ($img, 4, $x1, 110,'I', $culoarecerc2);
		$x1+=30;
		$x2+=30;
		$y2=100-(100*$doi/$tot);
		imagefilledrectangle($img, $x1, $y1, $x2, $y2, $culoarecerc4);
		imagestring ($img, 4, $x1-3, 110,'II', $culoarecerc2);
		$x1+=30;
		$x2+=30;
		$y2=100-(100*$trei/$tot);
		imagefilledrectangle($img, $x1, $y1, $x2, $y2, $culoarecerc4);
		imagestring ($img, 4, $x1-7, 110,'III', $culoarecerc2);
		$x1+=30;
		$x2+=30;
		$y2=100-(100*$mentiune/$tot);
		imagefilledrectangle($img, $x1, $y1, $x2, $y2, $culoarecerc4);
		imagestring ($img, 4, $x1, 110,'M', $culoarecerc2);
		$x1+=50;
		$x2+=50;
		$y2=100-(100*($tot-($unu+$doi+$trei+$mentiune))/$tot);
		imagefilledrectangle($img, $x1, $y1, $x2, $y2, $culoarecerc4);
		imagestring ($img, 4, $x1-33, 110,'Participare', $culoarecerc2);
		header("Content-type: image/jpeg");
         		imagejpeg($img);
         		imagedestroy($img);
?>
