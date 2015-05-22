<?php

////[ Dependencies ]////////
// - laporan.js           //
// - css/laporanstyle.css //
////////////////////////////

$DBServer = 'localhost';
$DBUser   = 'root';
$DBPass   = '';
$DBName   = 'halaldb';

$db = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

///////////////////////////////////////
// [UPDATE: 23/4/2015]
// - Dah selaraskan nama variables dalam DB dengan client side
//
// [UPDATE: 24/4/2015]
// - Dah siap buat loop untuk insert data
//
// [UPDATE: 26/4/2015]
// - Dah buat loop untuk papar kesalahan
// - Tapi masalah sekarang ni, dia ikut nama dalam DB. Tapi hal kecik je tu.
// - Dah asingkan stylesheet
// - Buat loop untuk insert dalam Checklist. Tapi rasanya Checklist macam takde fungsi
//
// [TO-DO]
// - Buang requests yang bertindan. Request siap-siap dan simpan dalam variable.
//   Nanti cuma guna variable tu instead of making another request.
//
// [BUG #1]
// - Bila tekan back lepas dah submit, markah jadi 0 semula walaupun dah tick
// - Possible solution: Buat semua calculation dekat server side;
//

$keys = array_keys($_POST);

// Array untuk simpan jumlah field untuk setiap kategori
$categories = array(
    'Documentation' => 8,
    'RawMaterial' => 6,
    'Process' => 5,
    'Packaging' =>5,
    'Equipment' => 8,
    'Transport' => 2,
    'Workforce' => 5,
    'Cleanliness' => 5
);
$cat_keys = array_keys($categories);

$sizeof_categories = count($categories);

// Loop untuk insert semua data dari audit
for ($i = 0, $j = 6; $i < $sizeof_categories; $i++) {
    $sql = "INSERT INTO " . $cat_keys[$i] . " (";
    
    $temp = $j;
    
    for ($j = $temp; $j < $temp + $categories[$cat_keys[$i]]; $j++) {
        $sql .= $keys[$j] . ",";
    }
    
    $sql .= $keys[$i * 2 + 52] . ", " . $keys[$i * 2 + 53] . " ) VALUES (";
    
    for ($j = $temp; $j < $temp + $categories[$cat_keys[$i]]; $j++) {
        $sql .= "'" . $_POST[$keys[$j]] . "' ,";
    }
    
    $sql .= "'" . $_POST[$keys[$i * 2 + 52]] . "', '" . $_POST[$keys[$i * 2 + 53]] . "')";
    
    if(!$result = $db->query($sql)){
        die('There was an error running the query [' . $db->error . ']');
    }
}

///////////////////////////////////////
// Array untuk simpan semua requests
// Ni assuming takkan ada masalah dengan requests
$halaldb = [
    $db->query("SELECT * FROM Documentation"),
    $db->query("SELECT * FROM RawMaterial"),
    $db->query("SELECT * FROM Equipment"),
    $db->query("SELECT * FROM Process"),
    $db->query("SELECT * FROM Transport"),
    $db->query("SELECT * FROM Workforce"),
    $db->query("SELECT * FROM Packaging"),
    $db->query("SELECT * FROM Cleanliness")
];
///////////////////////////////////////
for ($i = 0; $i < $sizeof_categories; $i++) {
    $rows_returned = $halaldb[$i]->num_rows;
    $halaldb[$i]->data_seek($rows_returned - 1);
    $row = mysqli_fetch_row($halaldb[$i]);
    $asd[] = $row[0];
}

$sql = "INSERT INTO Checklist (
        doc_id,
        raw_material_id,
        equipment_id,
        process_id,
        transport_id,
        work_id,
        packaging_id,
        cleanliness_id
    ) VALUES (
        '" . $asd[0] . "',
        '" . $asd[1] . "',
        '" . $asd[2] . "',
        '" . $asd[3] . "',
        '" . $asd[4] . "',
        '" . $asd[5] . "',
        '" . $asd[6] . "',
        '" . $asd[7] . "'
    )";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

///////////////////////////////////////
$res9 = $db->query("SELECT checklist_id FROM Checklist");
$rows_returned = $res9->num_rows;
$res9->data_seek($rows_returned - 1);
$row9 = mysqli_fetch_row($res9);
$asd9 = $row9[0];

$auditor_name = $_POST["juruaudit"];

$sql = "INSERT INTO Auditor (
        auditor_name,
        checklist_id
    ) VALUES (
        '$auditor_name',
        '$asd9'
    )";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

///////////////////////////////////////
$company_name = $_POST["namapremis"];
$address = $_POST["alamatpremis"];
$postcode = $_POST["poskod"];
$state_id = $_POST["negeri"];

$sql = "INSERT INTO Company (
        company_name,
        address,
        postcode,
        state_id
    ) VALUES (
        '$company_name',
        '$address',
        '$postcode',
        '$state_id'
    )";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

///////////////////////////////////////
$total_mark =
    $_POST['t_dokumentasi_mark']
  + $_POST['t_bahan_mark']
  + $_POST['t_alat_mark']
  + $_POST['t_proses_mark']
  + $_POST['t_angkut_mark']
  + $_POST['t_pekerja_mark']
  + $_POST['t_bungkus_mark']
  + $_POST['t_sanitasi_mark'];

$total_fullmark =
    $_POST['t_dokumentasi_fullmark']
  + $_POST['t_bahan_fullmark']
  + $_POST['t_alat_fullmark']
  + $_POST['t_proses_fullmark']
  + $_POST['t_angkut_fullmark']
  + $_POST['t_pekerja_fullmark']
  + $_POST['t_bungkus_fullmark']
  + $_POST['t_sanitasi_fullmark'];

$res10 = $db->query("SELECT company_id FROM Company");
$rows_returned = $res10->num_rows;
$res10->data_seek($rows_returned - 1);
$row10 = mysqli_fetch_row($res10);
$asd10 = $row10[0];

$res11 = $db->query("SELECT auditor_id FROM Auditor");
$rows_returned = $res11->num_rows;
$res11->data_seek($rows_returned - 1);
$row11 = mysqli_fetch_row($res11);
$asd11 = $row11[0];

$date = $_POST["tarikh"];
$mark = round($total_mark / $total_fullmark * 100);

if ($mark > 59) {
    $grade = "LULUS";
} else {
    $grade = "GAGAL";
}

$auditor_comment = $_POST["ulasan_keseluruhan"];

$sql = "INSERT INTO Audit (
        company_id,
        auditor_id,
        date,
        mark,
        grade,
        auditor_comment
    ) VALUES (
        '$asd10',
        '$asd11',
        '$date',
        '$mark',
        '$grade',
        '$auditor_comment'
    )";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
///////////////////////////////////////
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width">
    <title>Laporan</title>
    <link href="css/laporanstyle.css" rel="stylesheet" />
    <script src="laporan.js"></script>
</head>
<body>
    <div id="laporan" style="margin-top: 50px;">
        <header>Laporan</header>
        Keputusan: <span style="color: #8EC600;"><?php echo $grade; echo $total_mark; echo "/"; echo $total_fullmark; ?></span>
        <div style="text-align: center; font-size: 72px; color: #8EC600;"><?php echo $mark; ?>%</div>
        
        <canvas id="cvs"></canvas>
        
        <?php
            $sql='SELECT * FROM Audit';
            
            $rs = $db->query($sql);
            
            if ($rs === false) {
              trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
            } else {
              $rows_returned = $rs->num_rows;
            }
            
            $rs->data_seek(0);
            $i = 1;
            $markoh;
            while($row = $rs->fetch_assoc()){
                //echo '<div id=audit'.$i.'>'.$row['date'] . $row['mark'] . $row['grade'] . '</div>';
                echo '<div id=audit'.$i.'>'.$i.": ".$row['date']." (".$row['mark'].'%)</div>';
                $markoh[] = $row['mark'];
                $i++;
            }
        ?>
        
        <script type="text/javascript">
            function papar(tekkusu, dv) {
                var kesalahan = document.createElement('li'),
                    tikas = document.createTextNode(tekkusu);
                
                kesalahan.appendChild(tikas);
                dv.appendChild(kesalahan);
            }
            
            function lekat(tekkusu, dv) {
                var zxc = document.createElement('b'),
                    tikas = document.createTextNode(tekkusu);
                
                zxc.appendChild(tikas);
                dv.appendChild(zxc);
            }
            
            var markoh = [];
            
        <?php
            // Loop untuk papar kesalahan
            for ($i = 0, $j = 6; $i < $sizeof_categories; $i++) {
                $sql='SELECT * FROM ' . $cat_keys[$i];
                
                $rs = $db->query($sql);
                
                if($rs === false) {
                  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
                } else {
                  $rows_returned = $rs->num_rows;
                }
                
                $rs->data_seek(0);
                $j = 1; // Ni sebab nak skip ID
                while($row = $rs->fetch_assoc()) {
                    echo "var salah" . $j . " = document.createElement('div');";
                    $baki = "\(-" . strval($row[$keys[$i * 2 + 53]] - $row[$keys[$i * 2 + 52]]) . "\)";
                    
                    if ($row[$keys[$i * 2 + 53]] - $row[$keys[$i * 2 + 52]] != 0) {
                        echo "lekat('".$cat_keys[$i]." ".$baki."', salah".$j.");";
                    } else {
                        echo "lekat('".$cat_keys[$i]."', salah".$j.");";
                    }
                    
                    $row_keys = array_keys($row);
                    $sizeof_row = count($row);
                    
                    for ($k = 0; $k < $sizeof_row - 2; $k++) {
                        if ($k < $sizeof_row - 3 && $row[$row_keys[$k]] === 'fail') {
                            echo "papar(".$cat_keys[$i].".".$row_keys[$k].", salah" . $j . ");";
                        }
                        
                        if ($k == $sizeof_row - 3 && $row[$row_keys[$k]] !== '') {
                            echo "papar('Ulasan: ' + '".$row[$row_keys[$k]]."', salah" . $j . ");";
                        }
                    }
                    
                    echo 'if (salah'.$j.'.childElementCount > 1) audit'.$j.'.appendChild(salah'.$j.');';
                    
                    $j++;
                }
            }
            
            //////////////////////////////////////
            
            for ($i = 0; $i < $rows_returned; $i++) {
                echo 'markoh[' . $i . '] = ' . $markoh[$i] . ';';
            }
        ?>
        
            //cvs.width = 250;
            cvs.width = markoh.length * 32 + 32;
            cvs.height = 130;
            
            var ctx = cvs.getContext('2d'),
                offsetX = 0,
                offsetY = 10;
            
            ctx.beginPath();
            
            ctx.strokeStyle = '#0000FF';
            ctx.moveTo(32 + offsetX, 100 + offsetY);
            
            // Plot each result
            for (var i = 0; i < markoh.length; i++) {
                ctx.lineTo(52 + 32 * i + offsetX, 100 - markoh[i] + offsetY);
            }
            ctx.stroke();
            
            // Draw the axes
            ctx.strokeStyle = '#BABABA';
            ctx.moveTo(32 + offsetX, 0 + offsetY);
            ctx.lineTo(32 + offsetX, 100 + offsetY);
            //ctx.lineTo(250 + offsetX, 100 + offsetY);
            ctx.lineTo(markoh.length * 32 + 32 + offsetX, 100 + offsetY);
            
            ctx.textAlign = 'right';
            
            // Senggat kat Y-axis
            for (i = 0; i < 100; i += 20) {
                ctx.fillText(100 - i, 25 + offsetX, i + 3 + offsetY);
                
                ctx.moveTo(30 + offsetX, i + offsetY);
                ctx.lineTo(34 + offsetX, i + offsetY);
            }
            
            // Senggat kat X-axis
            for (i = 0; i < markoh.length; i++) {
                ctx.moveTo(52 + 32 * i + offsetX, 98 + offsetY);
                ctx.lineTo(52 + 32 * i + offsetX, 102 + offsetY);
                
                ctx.fillText(i + 1, 55 + 32 * i + offsetX, 98 + 15 + offsetY);
            }
            
            ctx.stroke();
        </script>
    </div>
</body>
</html>

<?php $db->close(); ?>