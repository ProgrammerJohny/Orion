<meta charset="utf-8">
<?
try {
  $conn = new PDO('mysql:host=localhost;dbname=aplikacja', 'admin', 'Webmaster2017');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->query("set names utf8");
  $stmt = $conn -> query('SELECT * FROM customersInd');
  $headers = array(
  'ID_cus_ind' =>'ID',
  'name_cus_ind'=>'Imię',
  'surname_cus_ind' =>'Nazwisko',
  'pesel_cus_ind'=>'PESEL',
  'number_cus_ind'=>'Numer Klienta',
  'tel_cus_ind'=>'Telefon',
  'email_cus_ind'=>'E-mail',
  'country_reg_cus_ind'=>'Kraj - zameldowanie',
  'code_reg_cus_ind'=>'Kod pocztowy - zameldowanie',
  'city_reg_cus_ind'=>'Miejscowość - zameldowanie',
  'street_reg_cus_ind'=>'Ulica - zameldowanie',
  'numberhouse_reg_cus_ind'=>'Numer budynku - zameldowanie',
  'numberflat_reg_cus_ind'=>'Numer lokalu - zameldowanie',
  'country_corr_cus_ind'=>'Kraj - zamieszkanie',
  'code_corr_cus_ind'=>'Kod pocztowy - zamieszkanie',
  'city_corr_cus_ind'=>'Miejscowość - zamieszkanie',
  'street_corr_cus_ind'=>'Ulica - zamieszkanie',
  'numberhouse_corr_cus_ind'=>'Numer budynku - zamieszkanie',
  'numberflat_corr_cus_ind'=>'Numer lokalu - zamieszkanie',
  'period_cus_ind'=>'Data podpisania umowy',
  'contract_status_cus_ind'=>'Aktualny status umowy');
  $data = date('d.m.Y H:i:s');
$raport = fopen("Raport roczny ilościowy -".date('d.m.Y').' - '.date('d.m.Y',strtotime("-1 year"))."- Klienci Indywidualni.xls","w");

fwrite($raport,"Raport wygenerowano:".date('d.m.Y H:i:s')."\n");
foreach ($headers as $key ) {

  fwrite ($raport,$key."\t");
}
while($row = $stmt->fetch()) {
  fwrite($raport,"\n");
  fwrite($raport,$row['ID_cus_ind']."\t");
  fwrite($raport,$row['name_cus_ind']."\t");
  fwrite($raport,$row['surname_cus_ind']."\t");
  fwrite($raport,$row['pesel_cus_ind']."\t");
  fwrite($raport,$row['number_cus_ind']."\t");
  fwrite($raport,$row['tel_cus_ind']."\t");
  fwrite($raport,$row['email_cus_ind']."\t");
  fwrite($raport,$row['country_reg_cus_ind']."\t");
  fwrite($raport,$row['code_reg_cus_ind']."\t");
  fwrite($raport,$row['city_reg_cus_ind']."\t");
  fwrite($raport,$row['street_reg_cus_ind']."\t");
  fwrite($raport,$row['numberhouse_reg_cus_ind']."\t");
  fwrite($raport,$row['numberflat_reg_cus_ind']."\t");
  fwrite($raport,$row['country_corr_cus_ind']."\t");
  fwrite($raport,$row['code_corr_cus_ind']."\t");
  fwrite($raport,$row['city_corr_cus_ind']."\t");
  fwrite($raport,$row['street_corr_cus_ind']."\t");
  fwrite($raport,$row['numberhouse_corr_cus_ind']."\t");
  fwrite($raport,$row['numberflat_corr_cus_ind']."\t");
  fwrite($raport,$row['period_cus_ind']."\t");
  fwrite($raport,$row['contract_status_cus_ind']."\t");

}
echo "Raport wygenerowany!!<br><a href='index.php'>Powrót</a>";
}
catch(PDOException $e) {
  echo "Błąd !!".$e->getMessage();
}
?>
