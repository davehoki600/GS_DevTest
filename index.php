<!DOCTYPE html>
<html>
<head>
  <script>
    function validateForm(){
      var a = document.forms["data"]["age_of_death_1"].value;
      var b = document.forms["data"]["age_of_death_2"].value;
      var c = document.forms["data"]["year_of_death_1"].value;
      var d = document.forms["data"]["year_of_death_2"].value;
      if (a == null || a == "" || a < 0) {
        alert("Age of death tidak boleh kosong atau negatif");
        return false;
      }
      if (b == null || b == "" || b < 0) {
        alert("Age of death tidak boleh kosong atau negatif");
        return false;
      }
      if (c == null || c == "" || c < 0) {
        alert("Year of death tidak boleh kosong atau negatif");
        return false;
      }
      if (d == null || d == "" || d < 0) {
        alert("Year of death tidak boleh kosong atau negatif");
        return false;
      }
      if (a > c) {
        alert("Year born cannot be negatif");
        return false;
      }
      if (b > d) {
        alert("Year born cannot be negatif");
        return false;
      }
    }



  function addElement() {
    var ni = document.getElementById('myDiv');
    var numi = document.getElementById('theValue');
    var num = (document.getElementById("theValue").value -1)+ 2;
    var add = (document.getElementById("theValue").value -1)+ 3;
    numi.value = num;
    var divIdName = "my"+num+"Div";
    var newdiv = document.createElement('div');
    newdiv.setAttribute("id",divIdName); //  + num + 
    newdiv.innerHTML = "<b>Person : </b><input type=hidden name=\"kode[" + num + "]\" value=\"" + num + "\"><input type=text name=\"age_of_death" + num + "\" placeholder=\"Age of Death\"> <input type=text name=\"year_of_death" + num + "\" placeholder=\"Year of Death\"> <a href=\"javascript:;\" onclick=\"removeElement(\'"+divIdName+"\')\">[- hapus]</a>";
    ni.appendChild(newdiv);
  }
  
  function removeElement(divNum) {
    var d = document.getElementById('myDiv');
    var olddiv = document.getElementById(divNum);
    d.removeChild(olddiv);
  }  
</script>

<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

li {
  float: left;
}

li a {
  display: block;
  padding: 8px;
  background-color: #dddddd;
}
</style>
<title>David Stefanus | GS DevTest</title>
</head>
<body>

<ul>
  <li><a href="index.php">Home</a></li>
  
</ul>
<br>
<?php
function print_deret_fibonacci($jumlah){
  $angka_sebelumnya=0;
  $angka_sekarang=1;
  
  $hasil = "$angka_sekarang";
 
  for ($i=0; $i<$jumlah-1; $i++){
    $output = $angka_sekarang + $angka_sebelumnya;
    $hasil = $hasil + $output;
    
    $angka_sebelumnya = $angka_sekarang;
    $angka_sekarang = $output;
  }
  return $hasil;
}
  
function piramida_fibonacci($tingkat){
  for ($i=1; $i<$tingkat+1; $i++)
  {
    echo print_deret_fibonacci($i);
    echo "<br>";
  }
}
  
?>
<form id="data" name="data" role="form" method="POST" action="" enctype="multipart/form-data" onsubmit="return validateForm()">
<div class="form-group">
  <label for="person_a">Person A: </label>
  <input type="number" class="form-control" id="age_of_death_1" name="age_of_death_1" placeholder="Age of Death">
  <input type="number" class="form-control" id="year_of_death_1" name="year_of_death_1" placeholder="Year of Death">
</div>
<br>
<div class="form-group">
  <label for="person_b">Person B: </label>
  <input type="number" class="form-control" id="age_of_death_2" name="age_of_death_2" placeholder="Age of Death">
  <input type="number" class="form-control" id="year_of_death_2" name="year_of_death_2" placeholder="Year of Death">
</div>
<br><br>

<input type="hidden" value="0" id="theValue" /><a href="javascript:;" onclick="addElement();"><b>&nbsp;+ Add Person</b></a>
<br><br>
<div id="myDiv"></div>
<br><br>

<input type="submit" name="submit" class="btn btn-primary">
</form>
<?php
if (isset($_POST['submit'])) {
  $age_of_death_1 = $_POST['age_of_death_1'];
  $year_of_death_1 = $_POST['year_of_death_1'];
  $age_of_death_2 = $_POST['age_of_death_2'];
  $year_of_death_2 = $_POST['year_of_death_2'];
  $selisih_1 = $year_of_death_1 - $age_of_death_1;
  $selisih_2 = $year_of_death_2 - $age_of_death_2;
  $tahun_1 = array();
  $tahun_2 = array();

  
  for ($i=1; $i<$selisih_1+1; $i++){
    $tahun_1[] = print_deret_fibonacci($i);
  }
  //echo '<br>';
  for ($i=1; $i<$selisih_2+1; $i++){
    $tahun_2[] = print_deret_fibonacci($i);
  }

  
  for ($i=0; $i<count($tahun_1); $i++){
      $killed_1 = $tahun_1[$i];
  }
  for ($i=0; $i<count($tahun_2); $i++){
      $killed_2 = $tahun_2[$i];
  }

  

  echo 'Person A born on Year = ' . $year_of_death_1 .' - '. $age_of_death_1 . ' = ' . $selisih_1 . ',  number of people killed on year ' . $selisih_1 .  ' is ' . $killed_1;
  echo '<br>';
  echo 'Person B born on Year = ' . $year_of_death_2 .' - '. $age_of_death_2 . ' = ' . $selisih_2 . ',  number of people killed on year ' . $selisih_2 .  ' is ' . $killed_2;
  echo '<br>';
  echo 'So the average is (' . $killed_1 . ' + ' . $killed_2 . ') / 2 = '. ( $killed_1 + $killed_2 ) / 2;
  echo '<br><br>';

  //========================Jika ada tambahan person (code ini belum final)===========================
  /*
  $kode = NULL;
  $jumlah_tambahan = array();
  if ($_POST['kode']!=NULL) {
    
    foreach ($_POST['kode'] as $field_arr) {
      $jumlah_tambahan[] = $_POST['kode'];
      $add_age =  $_POST["age_of_death".$field_arr.""];
      $add_year =  $_POST["year_of_death".$field_arr.""];
      $add_selisih = $add_year - $add_age;

      for ($i=1; $i<$add_selisih+1; $i++){
        $add_tahun[] = print_deret_fibonacci($i);
      }

      for ($i=0; $i<count($add_tahun); $i++){
        $add_killed = $add_tahun[$i];
      }

      $all_person = (2 + $jumlah_tambahan);
      //echo 'Additional Person who born on Year = ' . $add_year .' - '. $add_age . ' = ' . $add_selisih . ',  number of people killed on year ' . $add_selisih .  ' is ' . $add_killed;
      //echo '<br>';
      //echo 'So the new average is (' . $killed_1 . ' + ' . $killed_2 . ') /' .$all_person. '  = '. ( $killed_1 + $killed_2 + $add_killed ) / $all_person ;
    }
  }
  //echo count($jumlah_tambahan);
  */
  //===================================================================================================
}
?>
</body>
</html>
