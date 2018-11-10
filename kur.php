<?php
echo '<html>
<head>
		          <style type=\'text/css\'>
		          	
		          	BODY		          	
		          	{
		          		font-size: 11px;
		          		font-family: Verdana, Arial;
		          		color: #000;
		          		margin: 0px;
		          		padding: 0px;
		          		background-repeat: no-repeat;
		          		background-position: right bottom;
		          	}
		          	
		          	TABLE, TR, TD     { font-family:Verdana, Arial;font-size: 11px; color:#000 }
					
					a:link, a:visited, a:active  { color:#000055 }
					a:hover                      { color:#333377;text-decoration:underline }
					
					.centerbox { margin-right:10%;margin-left:10%;text-align:left }
					
					.warnbox {
							   border:1px solid #F00;
							   background: #FFE0E0;
							   padding:6px;
							   margin-right:10%;margin-left:10%;text-align:left;
							 }
					
					.tablepad    { background-color:#F5F9FD;padding:6px }
				    .description { color:gray;font-size:10px }
					.pformstrip { background-color: #D1DCEB; color:#3A4F6C;font-weight:bold;padding:7px;margin-top:1px;text-align:left }
					.pformleftw { background-color: #F5F9FD; padding:6px; margin-top:1px;width:50%; border-top:1px solid #C2CFDF; border-right:1px solid #C2CFDF; }
					.pformright { background-color: #F5F9FD; padding:6px; margin-top:1px;border-top:1px solid #C2CFDF; }

					.tableborder { border:1px solid #345487;background-color:#FFF; padding:0px; margin:0px; width:100% }

					.maintitle { text-align:left;vertical-align:middle;font-weight:bold; color:#FFF; letter-spacing:1px; padding:8px 0px 8px 5px;  }
					.maintitle a:link, .maintitle  a:visited, .maintitle  a:active { text-decoration: none; color: #FFF }
					.maintitle a:hover { text-decoration: underline }
					
					#copy { font-size:10px }
										
					#button   { background-color: #4C77B6; color: #FFFFFF; font-family:Verdana, Arial; font-size:11px }
					
					#textinput { background-color: #EEEEEE; color:Ê#000000; font-family:Verdana, Arial; font-size:11px; width:100% }
					
					#dropdown { background-color: #EEEEEE; color:Ê#000000; font-family:Verdana, Arial; font-size:10px }
					
					#multitext { background-color: #EEEEEE; color:Ê#000000; font-family:Courier, Verdana, Arial; font-size:10px }
					
					#logostrip {
								 padding: 0px;
								 margin: 0px;
								 background: #7AA3D0;
							   }
							   
					.fade					
					{
						background-repeat: repeat-x;
					}
					
				  </style>
</head>
<body marginheight=\'0\' marginwidth=\'0\' leftmargin=\'0\' topmargin=\'0\' bgcolor=\'#FFFFFF\'>
<br />';
$sayfa = $_SERVER['QUERY_STRING'];
$sayfa=ereg_replace("%26","&",$sayfa);
$sayfa = explode('&',$sayfa);
$sayfa1 = array_shift($sayfa);
if(@$sayfa1 == "2") {
//kurulum asamasi 2
$host=$_SERVER['HTTP_HOST'];
$klasor=$_SERVER['REQUEST_URI'];
$klasor=ereg_replace("kur.php\?2","",$klasor);
$adres="http://$host$klasor";
echo "	<form action='?3' method='POST'>
	<div class='centerbox'>
	
	<div class='tableborder'>
	<div class='maintitle'>Sunucu Ayarlari</div>
	<div class='pformstrip'>Bu b&ouml;l&uuml;m, dosya klas&ouml;r&uuml; ve dosya ad&#305; ayarlar&#305;n&#305; i&ccedil;erir. </div>
	<table width='100%' cellspacing='1'>

	<tr>
	  <td class='pformleftw'><strong>frozLog'un kurulaca&#287;&#305; adres </strong>
	    <div class='description'>Bu adres bir URL olmak zorundad&#305;r(http:// ile ba&#351;lamal&#305;)<br />
	      &Ouml;rne&#287;in: <b>http://frozlog.dlisozluk.com</b></div></td>
	  <td class='pformright'><input type='text' id='textinput' name='adres' value='$adres'></td>
	</tr>
		<tr>
	  <td class='pformleftw'><b>frozLog'un &ccedil;al&#305;&#351;aca&#287;&#305; dosyan&#305;n ad&#305; </b>
	    <div class='description'>Bu dosya standart olarak index.php'dir. De&#287;i&#351;tirdiyseniz o &#351;ekilde yaz&#305;n. <b>Dosya uzant&#305;s&#305;n&#305; yazmay&#305; unutmay&#305;n. </b></div></td>
	  <td class='pformright'><input type='text' id='textinput' name='dosyaadi' value='index.php'></td>
	</tr>
	<tr>
	  <td class='pformleftw'><b>Sifre kodu </b>
	    <div class='description'>Sifrelerin md5 disinda sifrelenecegi 2. kodu girin<br /><b>Bu kod ekstra güvenlik saglamak amaciyla kullanilmaktadir.</b></div></td>
	  <td class='pformright'><input type='text' id='textinput' name='sifrekodu' value=''></td>
	</tr>
	<tr>
	  <td class='pformleftw'><b>Site Adi </b>
	    <div class='description'>Sitenin adini yazin. <br /><b>Bu ad, baslikta yazacaktir.</b></div></td>
	  <td class='pformright'><input type='text' id='textinput' name='siteadi' value='frozLog'></td>
	</tr>
		<tr>
	  <td class='pformleftw'><b>Özet harf sayisi </b>
	    <div class='description'>Anasayfada yayimlanan yazilarin özetinin kaç harf olacagini girin.</div></td>
	  <td class='pformright'><input type='text' id='textinput' name='ozetharf' value='1000'></td>
	</tr>
	</table>
	</div>
	<div class='fade'>&nbsp;</div>

	
	<br />
	
	<div class='tableborder'>
	<div class='maintitle'>mySQL Ayarlari</div>
	<div class='pformstrip'>Bu k&#305;s&#305;m veritaban&#305;na ba&#287;lanmak i&ccedil;in gereken bilgileri i&ccedil;erir. </div>
	<table width='100%' cellspacing='1'>
	<tr>
	  <td class='pformleftw'><strong>mySQL adresi </strong>
	    <div class='description'>(genellikle localhost'tur.)</div></td>
	  <td class='pformright'><input type='text' id='textinput' name='sql_adres' value='localhost'></td>
	</tr>
	
	<tr>

	  <td class='pformleftw'><b>mySQL veritaban&#305; ad&#305; </b></td>
	  <td class='pformright'><input type='text' id='textinput' name='sql_veritabani' value=''></td>
	</tr>
	
	<tr>
	  <td class='pformleftw'><b>mySQL kullan&#305;c&#305; ad&#305; </b></td>
	  <td class='pformright'><input type='text' id='textinput' name='sql_kullanici' value=''></td>
	</tr>
	
	<tr>

	  <td class='pformleftw'><b>mySQL &#351;ifresi </b></td>
	  <td class='pformright'><input type='text' id='textinput' name='sql_sifre' value=''></td>
	</tr>
	</table>
	</div>
	<div class='fade'>&nbsp;</div>

	
	<br />
	
	<div class='tableborder'>
	<div class='maintitle'>Yönetici Hesap Ayarlari</div>
	<div class='pformstrip'>Bu k&#305;s&#305;m y&ouml;netici olan kullan&#305;c&#305;n&#305;n bilgilerini i&ccedil;erir. Bilgileri girerken dikkat edin, geri d&ouml;n&uuml;&#351;&uuml; i&ccedil;in yeniden kurulum gerekebilir. </div>
	<table width='100%' cellspacing='1'>
	<tr>
	  <td class='pformleftw'><b>Kullan&#305;c&#305; ad&#305; </b></td>

	  <td class='pformright'><input type='text' id='textinput' name='yonetici_kullanici' value=''></td>
	</tr>
	
	<tr>
	  <td class='pformleftw'><b>&#350;ifre</b></td>
	  <td class='pformright'><input type='text' id='textinput' name='yonetici_sifre' value=''></td>
	</tr>
	
	<tr>
	  <td class='pformleftw'><b>&#350;ifre</b></td>

	  <td class='pformright'><input type='text' id='textinput' name='yonetici_sifre_2' value=''></td>
	</tr>
	
	<tr>
	  <td class='pformleftw'><b>E-mail adresi </b></td>
	  <td class='pformright'><input type='text' id='textinput' name='yonetici_email' value=''></td>
	</tr>
	</table>
	<div align='center' class='pformstrip'  style='text-align:center'><input type='submit' value='ileri'></div>

	</div>
	<div class='fade'>&nbsp;</div>
	</div>
	</form>   ";
}
elseif(@$sayfa1 == "3") {
$klasor=$_POST['adres'];
$dosyaadi=$_POST['dosyaadi'];
$sifrekodu=$_POST['sifrekodu'];
$sql_adres=$_POST['sql_adres'];
$sql_veritabani=$_POST['sql_veritabani'];
$sql_kullanici=$_POST['sql_kullanici'];
$sql_sifre=$_POST['sql_sifre'];
$yonetici_kullanici=strtolower($_POST['yonetici_kullanici']);
$yonetici_sifre=$_POST['yonetici_sifre'];
$yonetici_sifre_2=$_POST['yonetici_sifre_2'];
$yonetici_email=$_POST['yonetici_email'];
$ozetharf=$_POST['ozetharf'];
$siteadi=$_POST['siteadi'];
if(!$_POST['adres'] || !$_POST['sql_adres'] || !$_POST['sql_veritabani'] || !$_POST['sql_kullanici'] || !$_POST['sifrekodu'] || !$_POST['ozetharf'] || !$_POST['siteadi'] || !$_POST['yonetici_kullanici'] || !$_POST['yonetici_sifre'] || !$_POST['yonetici_sifre_2'] || !$_POST['yonetici_email']) { 
echo 'eksik veri var';
}
else {
//veritabanina kaydedelim
if($yonetici_sifre != $yonetici_sifre_2) {
echo 'sifreler uyusmadi';
}
else {
//kaydedelim artik dimi
$con = @mysql_connect("$sql_adres","$sql_kullanici","$sql_sifre");
if (!$con)
  {
  die('Veritabani sunucusuna baglanilamadi. Lütfen geri dönüp tekrar deneyin.');
  }
mysql_select_db("$sql_veritabani")or die('Veritabanina erisilemedi. Veritabanini olusturdugunuzdan emin olun.'); 
mysql_query("SET NAMES 'latin5'");
mysql_query("SET CHARACTER SET latin5");
mysql_query("SET COLLATION_CONNECTION = 'latin5_turkish_ci'"); 
		if($yonetici_sifre != $yonetici_sifre_2){
        echo "sifreler uyusmadi";
    }
	else {
mysql_query("CREATE TABLE `ayarlar` (
  `no` int(11) NOT NULL auto_increment,
  `siteadi` text NOT NULL,
  `siteadresi` text NOT NULL,
  `yoneticimail` text NOT NULL,
  `dosyaadi` text NOT NULL,
  `ozetharf` text NOT NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=0 ;");
mysql_query("CREATE TABLE `gunluk` (
  `no` int(11) NOT NULL auto_increment,
  `baslik` text NOT NULL,
  `kategori` varchar(25) NOT NULL default '',
  `yazi` text NOT NULL,
  `yazar` varchar(25) NOT NULL default '',
  `tarih` varchar(25) NOT NULL default '',
  `saat` varchar(25) NOT NULL default '',
  `yayimda` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=0 ;");
mysql_query("CREATE TABLE `kategori` (
  `no` int(11) NOT NULL auto_increment,
  `isim` varchar(40) NOT NULL default '',
  `aciklama` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=0 ;");
mysql_query("CREATE TABLE `kategori_sayfa` (
  `no` int(11) NOT NULL auto_increment,
  `isim` varchar(40) NOT NULL default '',
  `aciklama` varchar(250) NOT NULL default '',
  `sira` text NOT NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=0 ;");
mysql_query("CREATE TABLE `sayfa` (
  `no` int(11) NOT NULL auto_increment,
  `baslik` text NOT NULL,
  `kategori` text NOT NULL,
  `yazi` text NOT NULL,
  `yazar` varchar(25) NOT NULL default '',
  `tarih` varchar(25) NOT NULL default '',
  `saat` varchar(25) NOT NULL default '',
  `yayimda` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=0 ;");
mysql_query("CREATE TABLE `uyeler` (
  `no` int(11) NOT NULL auto_increment,
  `nick` varchar(35) NOT NULL default '',
  `sifre` varchar(250) NOT NULL default '',
  `e_mail` varchar(250) NOT NULL default '',
  `kayit_tarihi` varchar(250) NOT NULL default '',
  `aktif` char(1) NOT NULL default '0',
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=0 ;");
mysql_query("CREATE TABLE `yorum` (
  `no` int(11) NOT NULL auto_increment,
  `yorumlayan` varchar(25) NOT NULL default '',
  `yazino` varchar(25) NOT NULL default '',
  `yorum` text NOT NULL,
  `tarih` varchar(250) NOT NULL default '',
  `saat` varchar(250) NOT NULL default '',
  KEY `no` (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=0 ;");
	$date=date("mdY");
	$sifre=md5(md5($yonetici_sifre.$sifrekodu).$date);
        $sql=mysql_query("INSERT into `uyeler` VALUES ('','$yonetici_kullanici','$sifre','$yonetici_email','$date','1')");
		$sql2=mysql_query("INSERT into `ayarlar` VALUES ('', '$siteadi', '$klasor', '$yonetici_email', '$dosyaadi', '$ozetharf')");
	}
$search = array ('vtsunucu','vtkadi','vtsifre','vtadi','sifrekoduuu','yoneticibirnumara');
$replace = array ($_POST['sql_adres'],$_POST['sql_kullanici'],$_POST['sql_sifre'],$_POST['sql_veritabani'],$_POST['sifrekodu'],strtolower($_POST['yonetici_kullanici']));
$new = str_replace($search,$replace,file_get_contents($dosyaadi));
$fh = fopen($dosyaadi, 'w');
fwrite($fh, $new);
fclose($fh); 
echo "				 <meta http-equiv='refresh' content='30; url=$dosyaadi' />
									  <div class='centerbox'>
									  <div class='tableborder'>
									  <div class='maintitle'>Ba&#351;ar&#305;l&#305;</div>
									  <div class='tablepad'>
									    <p><b>frozLog ba&#351;ar&#305;yla y&uuml;klendi. </b><br><br>
									  Y&uuml;kleme i&#351;lemi ba&#351;ar&#305;yla tamamland&#305;.<br>
									  Güvenliginiz için bu dosyayi silin.<br>
									  Giri&#351; yapmak i&ccedil;in a&#351;a&#287;&#305;daki linki kullanabilirsiniz. <br>
									  <br>
									      </p>
									    <center>
									      <b><a href='$dosyaadi'>frozLog anasayfa </a>
									    </center>
									  </div>
									  </div>
									  </div> ";
$fh = fopen('kur.php', 'w');
fwrite($fh, 'kurulum koduna erisim engellenmistir.');
fclose($fh); 
}
}
}
else {
echo '<title>frozLog v&szlig;etha1 Kurulum &#304;&#351;lemi :: A&#351;ama 1</title>				 <table width=\'80%\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' align=\'center\'>
							<tr>
							 <td valign=\'top\'>&nbsp;</td>
							 <td><br />
							   <br />
							   Kuruluma ba&#351;lamadan &ouml;nce yap&#305;lmas&#305; gereken bir i&#351;lem bulunmakta. frozLog\'un &ccedil;al&#305;&#351;aca&#287;&#305; dosyay&#305;(standart olarak index.php) CHMOD 0666 yapman&#305;z gerekmektedir. <br />
							   <br />
							   <b>frozLog v&szlig;etha1 minimum olarak PHP 4 ve mySQL 4 gerektirir. </b><br />
							   <br />

							   Kurulumu yapabilmek i&ccedil;in &#351;u bilgilere ihtiyac&#305;n&#305;z olacak;
							   <ul>
							   <li>mySQL veritaban&#305; ad&#305; </li>
							   <li>mySQL veritaban&#305; kullan&#305;c&#305; ad&#305; </li>
							   <li>mySQL veritaban&#305;n &#351;ifresi </li>
							   <li>mySQL adresi(genellikle localhost\'tur.) </li>
							   </ul>

							   <p><br />
							   &#304;leri tu&#351;una bast&#305;ktan sonra bu bilgileri ve y&ouml;netici bilgisi gibi baz&#305; bilgileri girmeniz gereken bir form ekrana gelecektir. </p>
							   <p><br />
						       </p>
						      <div align=\'center\'>						       <form name="kur" method="post" action="?2"><input type="submit" value="ileri">
                               </form></div> </td>
				   </tr>
</table>   ';
}
//genel copyright
echo '<br><br><br><br><center>
				   <span id=\'copy\'>frozsgy yaz&#305;l&#305;m geli&#351;tirme &copy; 2007 frozLog v&szlig;etha1 </span>
				 </center>

				 
</body>
				 </html>';
?>