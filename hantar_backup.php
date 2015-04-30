<?php
$DBServer = 'localhost';
$DBUser   = 'root';
$DBPass   = '';
$DBName   = 'halaldb';

$db = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

///////////////////////////////////////
$ssm = $_POST["ssm"];
$pbt = $_POST["lesen"];
$full_operation = $_POST["beroperasi"];
$manage_halal_product = $_POST["produk_halal"];
$standard_halal = $_POST["standard_halal"];
$halal_ingredient = $_POST["sumber_halal"];
$supplier_halal = $_POST["pembekal_halal"];
$comment_doc = $_POST["ulasan_dok"];
$doc_mark = $_POST["t_dokumentasi_mark"];
$doc_fullmark = $_POST["t_dokumentasi_fullmark"];

$sql = "INSERT INTO Documentation (
        ssm,
        pbt,
        full_operation,
        manage_halal_product,
        standard_halal,
        halal_ingredient,
        supplier_halal,
        comment_doc,
        doc_mark,
        doc_fullmark
    ) VALUES (
        '$ssm',
        '$pbt',
        '$full_operation',
        '$manage_halal_product',
        '$standard_halal',
        '$halal_ingredient',
        '$supplier_halal',
        '$comment_doc',
        '$doc_mark',
        '$doc_fullmark'
    )";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

///////////////////////////////////////
$halal_material = $_POST["bahan_halal"];
$meat_halal = $_POST["asas_haiwan"];
$import_meat_halal = $_POST["import_halal"];
$product_specs = $_POST["spec_produk"];
$material_list = $_POST["senarai_bahan"];
$comment_rawmaterial = $_POST["ulasan_bahan"];
$raw_mark = $_POST["t_bahan_mark"];
$raw_fullmark = $_POST["t_bahan_fullmark"];

$sql = "INSERT INTO RawMaterial (
        halal_material,
        meat_halal,
        import_meat_halal,
        product_specs,
        material_list,
        comment_rawmaterial,
        raw_mark,
        raw_fullmark
    ) VALUES (
        '$halal_material',
        '$meat_halal',
        '$import_meat_halal',
        '$product_specs',
        '$material_list',
        '$comment_rawmaterial',
        '$raw_mark',
        '$raw_fullmark'
    )";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

///////////////////////////////////////
$halal_notmixed = $_POST["tak_campur"];
$hukum_syarak = $_POST["syarie"];
$gmp_ghp = $_POST["gmp_ghp"];
$clean_process = $_POST["bersih"];
$comment_process = $_POST["ulasan_proses"];
$process_mark = $_POST["t_proses_mark"];
$process_fullmark = $_POST["t_proses_fullmark"];

$sql = "INSERT INTO Process (
        halal_notmixed,
        hukum_syarak,
        gmp_ghp,
        clean_process,
        comment_process,
        process_mark,
        process_fullmark
    ) VALUES (
        '$halal_notmixed',
        '$hukum_syarak',
        '$gmp_ghp',
        '$clean_process',
        '$comment_process',
        '$process_mark',
        '$process_fullmark'
    )";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

///////////////////////////////////////
$clear_label = $_POST["cetak_jelas"];
$label_akta = $_POST["ikut_akta"];
$label_syarak = $_POST["patuh_syarak"];
$packaging_material = $_POST["tak_najis"];
$comment_packaging = $_POST["ulasan_bungkus"];

$sql = "INSERT INTO Packaging (
        clear_label,
        label_akta,
        label_syarak,
        packaging_material,
        
        comment_packaging,
        packaging_mark,
        packaging_fullmark
    ) VALUES (
        '$clear_label',
        '$label_akta',
        '$label_syarak',
        '$packaging_material',
        
        '$comment_packaging',
        '$packaging_mark',
        '$packaging_fullmark'
    )";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

///////////////////////////////////////
$equip_clean = $_POST["suci"];
$free = $_POST["bebas_najis"];
$effect_material = $_POST["tak_mudarat"];
$samak = $_POST["telah_samak"];
$arrangement = $_POST["susun_kemas"];
$pray_material = $_POST["alat_sembah"];
$comment_equipment = $_POST["ulasan_alat"];
$equipment_mark = $_POST["t_alat_mark"];
$equipment_fullmark = $_POST["t_alat_fullmark"];

$sql = "INSERT INTO Equipment (
        equip_clean,
        free,
        effect_material,
        samak,
        arrangement,
        pray_material,
        comment_equipment,
        equipment_mark,
        equipment_fullmark
    ) VALUES (
        '$equip_clean',
        '$free',
        '$effect_material',
        '$samak',
        '$arrangement',
        '$pray_material',
        '$comment_equipment',
        '$equipment_mark',
        '$equipment_fullmark'
    )";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

///////////////////////////////////////
$transport_halal = $_POST["bawa_halal"];
$comment_transport = $_POST["ulasan_angkut"];
$transport_mark = $_POST["t_angkut_mark"];
$transport_fullmark = $_POST["t_angkut_fullmark"];

$sql = "INSERT INTO Transport (
        transport_halal,
        comment_transport,
        transport_mark,
        transport_fullmark
    ) VALUES (
        '$transport_halal',
        '$comment_transport',
        '$transport_mark',
        '$transport_fullmark'
    )";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

///////////////////////////////////////
$proper_attire = $_POST["pakaian"];
$halal_training = $_POST["terlatih"];
$has_supervisor = $_POST["penyelia_muslim"];
$worker_details = $_POST["maklumat_pekerja"];
$comment_work = $_POST["ulasan_pekerja"];
$work_mark = $_POST["t_pekerja_mark"];
$work_fullmark = $_POST["t_pekerja_fullmark"];

$sql = "INSERT INTO Workforce (
        proper_attire,
        halal_training,
        has_supervisor,
        worker_details,
        comment_work,
        work_mark,
        work_fullmark
    ) VALUES (
        '$proper_attire',
        '$halal_training',
        '$has_supervisor',
        '$worker_details',
        '$comment_work',
        '$work_mark',
        '$work_fullmark'
    )";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

///////////////////////////////////////
$cleaning_schedule = $_POST["ikut_jadual"];
$pollution_free = $_POST["bebas_pencemaran"];
$environment_clean = $_POST["sekitar_bersih"];
$pest_control = $_POST["rekod_sistem"];
$comment_clean = $_POST["ulasan_sanitasi"];
$clean_mark = $_POST["t_sanitasi_mark"];
$clean_fullmark = $_POST["t_sanitasi_fullmark"];

$sql = "INSERT INTO Cleanliness (
        cleaning_schedule,
        pollution_free,
        environment_clean,
        pest_control,
        comment_clean,
        clean_mark,
        clean_fullmark
    ) VALUES (
        '$cleaning_schedule',
        '$pollution_free',
        '$environment_clean',
        '$pest_control',
        '$comment_clean',
        '$clean_mark',
        '$clean_fullmark'
    )";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

///////////////////////////////////////
$res1 = $db->query("SELECT * FROM Documentation");
$row1 = mysqli_fetch_array($res1);
$asd1 = $row1["doc_id"];

$res2 = $db->query("SELECT * FROM RawMaterial");
$row2 = mysqli_fetch_array($res2);
$asd2 = $row2["raw_material_id"];

$res3 = $db->query("SELECT * FROM Equipment");
$row3 = mysqli_fetch_array($res3);
$asd3 = $row3["equipment_id"];

$res4 = $db->query("SELECT * FROM Process");
$row4 = mysqli_fetch_array($res4);
$asd4 = $row4["process_id"];

$res5 = $db->query("SELECT * FROM Transport");
$row5 = mysqli_fetch_array($res5);
$asd5 = $row5["transport_id"];

$res6 = $db->query("SELECT * FROM Workforce");
$row6 = mysqli_fetch_array($res6);
$asd6 = $row6["work_id"];

$res7 = $db->query("SELECT * FROM Packaging");
$row7 = mysqli_fetch_array($res7);
$asd7 = $row7["packaging_id"];

$res8 = $db->query("SELECT * FROM Cleanliness");
$row8 = mysqli_fetch_array($res8);
$asd8 = $row8["cleanliness_id"];

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
        '$asd1',
        '$asd2',
        '$asd3',
        '$asd4',
        '$asd5',
        '$asd6',
        '$asd7',
        '$asd8'
    )";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

///////////////////////////////////////
$res9 = $db->query("SELECT * FROM Checklist");
$row9 = mysqli_fetch_array($res9);
$asd9 = $row9["checklist_id"];

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
$total_mark = $doc_mark + $raw_mark + $equipment_mark + $process_mark + $transport_mark + $work_mark + $packaging_mark + $clean_mark;
$total_fullmark = $doc_fullmark + $raw_fullmark + $equipment_fullmark + $process_fullmark + $transport_fullmark + $work_fullmark + $packaging_fullmark + $clean_fullmark;

$res10 = $db->query("SELECT * FROM Company");
$row10 = mysqli_fetch_array($res10);
$asd10 = $row10["company_id"];

$res11 = $db->query("SELECT * FROM Auditor");
$row11 = mysqli_fetch_array($res11);
$asd11 = $row11["auditor_id"];

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
    <style type="text/css">
        body
        {
            font-family: sans-serif;

            color: #404040;
            background-color: #eee;
        }
        .pertama
        {
            margin-top: 50px;
        }
        div
        {
            margin: 10px;
            padding: 15px;

            border-radius: 3px;
            background-color: white;
            box-shadow: 0 1px 5px;
            
            min-height: 45px;
        }
        header
        {
            font-size: 20px;

            position: fixed;
            top: 0;
            left: 0;

            width: 100%;
            margin: 0;
            padding: 7px 0 7px 0;

            text-align: center;

            background-color: #DBFF57;
            color: #617A00;
            font-weight: bold;
            box-shadow: 0 1px 5px;
        }
        label
        {
            float: right;
        }
        input[type='text'],
        input[type='date'],
        select
        {
            display: block;
        }
        textarea
        {
            display: block;

            width: 100%;
            max-width: 500px;
            height: 70px;
        }
        .back_button
        {
            position: fixed;
            top: 10px;
            left: 20px;
        }



        input[type='radio']
        {
            display: none;
        }
        input[type='radio'] + label span
        {
            display: inline-block;

            width: 38px;
            height: 38px;
            /*margin: -1px 4px 0 0;*/
            margin: 3px 3px 3px 3px;

            cursor: pointer;
            vertical-align: middle;

            background: url(check_radio_sheet.png) top no-repeat;
        }


        input[type='radio'] + label span.pass
        {
            background-position: 0px 0px;
            margin-left: 20px;
        }
        input[type='radio'] + label span.fail
        {
            background-position: 0px -38px;
        }
        input[type='radio'] + label span.na
        {
            background-position: 0px -76px;
        }


        input[type='radio']:checked + label span.pass
        {
            background-position: -38px 0px;
        }
        input[type='radio']:checked + label span.fail
        {
            background-position: -38px -38px;
        }
        input[type='radio']:checked + label span.na
        {
            background-position: -38px -76px;
        }
        
        
        .myButton {
            float: right;
            box-shadow:inset 0px 1px 0px 0px #ffffff;
            background:linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);
            background-color:#ffffff;
            border-radius:6px;
            border:1px solid #dcdcdc;
            display:inline-block;
            cursor:pointer;
            color:#666666;
            font-size:15px;
            font-weight:bold;
            margin: 10px;
            padding:6px 24px;
            text-decoration:none;
            text-shadow:0px 1px 0px #ffffff;
        }
        .myButton:hover {
            background:linear-gradient(to bottom, #f6f6f6 5%, #ffffff 100%);
            background-color:#f6f6f6;
        }
        .myButton:active {
            position:relative;
            top:1px;
        }
    </style>
    
    <script src="laporan.js"></script>
</head>
<body>
    <div id="laporan" style="margin-top: 50px;">
        <header>Laporan</header>
        Keputusan: <span style="color: #8EC600;"><?php echo $grade; ?></span>
        <div style="text-align: center; font-size: 72px; color: #8EC600;"><?php echo $mark; ?>%</div>
        
        <canvas id="cvs"></canvas>
        
        <?php
            $sql='SELECT * FROM Audit';
            
            $rs = $db->query($sql);
            
            if($rs === false) {
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
            $sql='SELECT * FROM Documentation';
            
            $rs = $db->query($sql);
            
            if($rs === false) {
              trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
            } else {
              $rows_returned = $rs->num_rows;
            }
            
            $rs->data_seek(0);
            $i = 1;
            while($row = $rs->fetch_assoc()) {
                echo "var salah" . $i . " = document.createElement('div');";
                $baki = "\(-" . strval($row['doc_fullmark'] - $row['doc_mark']) . "\)";
                
                if ($row['doc_fullmark'] - $row['doc_mark'] != 0) {
                    echo "lekat('Dokumentasi ".$baki."', salah".$i.");";
                } else {
                    echo "lekat('Dokumentasi', salah".$i.");";
                }
                
                if ($row['ssm'] === 'fail') echo "papar(Documentation.ssm, salah" . $i . ");";
                if ($row['pbt'] === 'fail') echo "papar(Documentation.pbt, salah" . $i . ");";
                if ($row['full_operation'] === 'fail') echo "papar(Documentation.full_operation, salah" . $i . ");";
                if ($row['manage_halal_product'] === 'fail') echo "papar(Documentation.manage_halal_product, salah" . $i . ");";
                if ($row['standard_halal'] === 'fail') echo "papar(Documentation.standard_halal, salah" . $i . ");";
                if ($row['halal_ingredient'] === 'fail') echo "papar(Documentation.halal_ingredient, salah" . $i . ");";
                if ($row['supplier_halal'] === 'fail') echo "papar(Documentation.supplier_halal, salah" . $i . ");";
                if ($row['comment_doc'] !== NULL) echo "papar('Ulasan: ' + '" . $row['comment_doc'] . "', salah" . $i . ");";
                
                echo 'if (salah'.$i.'.childElementCount > 1) audit'.$i.'.appendChild(salah'.$i.');';
                
                $i++;
            }
            
            //////////////////////////////////////
            
            $sql='SELECT * FROM RawMaterial';
            
            $rs = $db->query($sql);
            
            if($rs === false) {
              trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
            } else {
              $rows_returned = $rs->num_rows;
            }
            
            $rs->data_seek(0);
            $i = 1;
            while($row = $rs->fetch_assoc()) {
                echo "var salah" . $i . "_2 = document.createElement('div');";
                $baki = "\(-" . strval($row['raw_fullmark'] - $row['raw_mark']) . "\)";
                
                if ($row['raw_fullmark'] - $row['raw_mark'] != 0) {
                    echo "lekat('Bahan mentah ".$baki."', salah".$i."_2);";
                } else {
                    echo "lekat('Bahan mentah', salah".$i."_2);";
                }
                
                if ($row['halal_material'] === 'fail') echo "papar(RawMaterial.halal_material, salah" . $i . "_2);";
                if ($row['meat_halal'] === 'fail') echo "papar(RawMaterial.meat_halal, salah" . $i . "_2);";
                if ($row['import_meat_halal'] === 'fail') echo "papar(RawMaterial.import_meat_halal, salah" . $i . "_2);";
                if ($row['product_specs'] === 'fail') echo "papar(RawMaterial.product_specs, salah" . $i . "_2);";
                if ($row['comment_rawmaterial'] !== '') echo "papar('Ulasan: ' + '" . $row['comment_rawmaterial'] . "', salah" . $i . "_2);";
                
                echo 'if (salah'.$i.'_2.childElementCount > 1) audit'.$i.'.appendChild(salah'.$i.'_2);';
                
                $i++;
            }
            
            //////////////////////////////////////
            
            $sql='SELECT * FROM Process';
            
            $rs = $db->query($sql);
            
            if($rs === false) {
              trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
            } else {
              $rows_returned = $rs->num_rows;
            }
            
            $rs->data_seek(0);
            $i = 1;
            while($row = $rs->fetch_assoc()) {
                echo "var salah" . $i . "_3 = document.createElement('div');";
                $baki = "\(-" . strval($row['process_fullmark'] - $row['process_mark']) . "\)";
                
                if ($row['process_fullmark'] - $row['process_mark'] != 0) {
                    echo "lekat('Proses ".$baki."', salah".$i."_3);";
                } else {
                    echo "lekat('Proses', salah".$i."_3);";
                }
                
                if ($row['halal_notmixed'] === 'fail') echo "papar(Process.halal_notmixed, salah" . $i . "_3);";
                if ($row['hukum_syarak'] === 'fail') echo "papar(Process.hukum_syarak, salah" . $i . "_3);";
                if ($row['gmp_ghp'] === 'fail') echo "papar(Process.gmp_ghp, salah" . $i . "_3);";
                if ($row['clean_process'] === 'fail') echo "papar(Process.clean_process, salah" . $i . "_3);";
                if ($row['comment_process'] !== '') echo "papar('Ulasan: ' + '" . $row['comment_process'] . "', salah" . $i . "_3);";
                
                echo 'if (salah'.$i.'_3.childElementCount > 1) audit'.$i.'.appendChild(salah'.$i.'_3);';
                
                $i++;
            }
            
            //////////////////////////////////////
            
            $sql='SELECT * FROM Packaging';
            
            $rs = $db->query($sql);
            
            if($rs === false) {
              trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
            } else {
              $rows_returned = $rs->num_rows;
            }
            
            $rs->data_seek(0);
            $i = 1;
            while($row = $rs->fetch_assoc()) {
                echo "var salah" . $i . "_4 = document.createElement('div');";
                $baki = "\(-" . strval($row['packaging_fullmark'] - $row['packaging_mark']) . "\)";
                
                if ($row['packaging_fullmark'] - $row['packaging_mark'] != 0) {
                    echo "lekat('Pembungkusan ".$baki."', salah".$i."_4);";
                } else {
                    echo "lekat('Pembungkusan', salah".$i."_4);";
                }
                
                if ($row['clear_label'] === 'fail') echo "papar(Packaging.clear_label, salah" . $i . "_4);";
                if ($row['label_akta'] === 'fail') echo "papar(Packaging.label_akta, salah" . $i . "_4);";
                if ($row['label_syarak'] === 'fail') echo "papar(Packaging.label_syarak, salah" . $i . "_4);";
                if ($row['packaging_material'] === 'fail') echo "papar(Packaging.packaging_material, salah" . $i . "_4);";
                if ($row['comment_packaging'] !== '') echo "papar('Ulasan: ' + '" . $row['comment_packaging'] . "', salah" . $i . "_4);";
                
                echo 'if (salah'.$i.'_4.childElementCount > 1) audit'.$i.'.appendChild(salah'.$i.'_4);';
                
                $i++;
            }
            
            //////////////////////////////////////
            
            $sql='SELECT * FROM Equipment';
            
            $rs = $db->query($sql);
            
            if($rs === false) {
              trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
            } else {
              $rows_returned = $rs->num_rows;
            }
            
            $rs->data_seek(0);
            $i = 1;
            while($row = $rs->fetch_assoc()) {
                echo "var salah" . $i . "_5 = document.createElement('div');";
                $baki = "\(-" . strval($row['equipment_fullmark'] - $row['equipment_mark']) . "\)";
                
                if ($row['equipment_fullmark'] - $row['equipment_mark'] != 0) {
                    echo "lekat('Peralatan ".$baki."', salah".$i."_5);";
                } else {
                    echo "lekat('Peralatan', salah".$i."_5);";
                }
                
                if ($row['equip_clean'] === 'fail') echo "papar(Equipment.equip_clean, salah" . $i . "_5);";
                if ($row['free'] === 'fail') echo "papar(Equipment.free, salah" . $i . "_5);";
                if ($row['effect_material'] === 'fail') echo "papar(Equipment.effect_material, salah" . $i . "_5);";
                if ($row['samak'] === 'fail') echo "papar(Equipment.samak, salah" . $i . "_5);";
                if ($row['arrangement'] === 'fail') echo "papar(Equipment.arrangement, salah" . $i . "_5);";
                if ($row['pray_material'] === 'fail') echo "papar(Equipment.pray_material, salah" . $i . "_5);";
                if ($row['comment_equipment'] !== '') echo "papar('Ulasan: ' + '" . $row['comment_equipment'] . "', salah" . $i . "_5);";
                
                echo 'if (salah'.$i.'_5.childElementCount > 1) audit'.$i.'.appendChild(salah'.$i.'_5);';
                
                $i++;
            }
            
            //////////////////////////////////////
            
            $sql='SELECT * FROM Transport';
            
            $rs = $db->query($sql);
            
            if($rs === false) {
              trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
            } else {
              $rows_returned = $rs->num_rows;
            }
            
            $rs->data_seek(0);
            $i = 1;
            while($row = $rs->fetch_assoc()) {
                echo "var salah" . $i . "_6 = document.createElement('div');";
                $baki = "\(-" . strval($row['transport_fullmark'] - $row['transport_mark']) . "\)";
                
                if ($row['transport_fullmark'] - $row['transport_mark'] != 0) {
                    echo "lekat('Pengangkutan ".$baki."', salah".$i."_6);";
                } else {
                    echo "lekat('Pengangkutan', salah".$i."_6);";
                }
                
                if ($row['transport_halal'] === 'fail') echo "papar(Transport.transport_halal, salah" . $i . "_6);";
                if ($row['comment_transport'] !== '') echo "papar('Ulasan: ' + '" . $row['comment_transport'] . "', salah" . $i . "_6);";
                
                echo 'if (salah'.$i.'_6.childElementCount > 1) audit'.$i.'.appendChild(salah'.$i.'_6);';
                
                $i++;
            }
            
            //////////////////////////////////////
            
            $sql='SELECT * FROM Workforce';
            
            $rs = $db->query($sql);
            
            if($rs === false) {
              trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
            } else {
              $rows_returned = $rs->num_rows;
            }
            
            $rs->data_seek(0);
            $i = 1;
            while($row = $rs->fetch_assoc()) {
                echo "var salah" . $i . "_7 = document.createElement('div');";
                $baki = "\(-" . strval($row['work_fullmark'] - $row['work_mark']) . "\)";
                
                if ($row['work_fullmark'] - $row['work_mark'] != 0) {
                    echo "lekat('Pekerja ".$baki."', salah".$i."_7);";
                } else {
                    echo "lekat('Pekerja', salah".$i."_7);";
                }
                
                if ($row['proper_attire'] === 'fail') echo "papar(Workforce.proper_attire, salah" . $i . "_7);";
                if ($row['halal_training'] === 'fail') echo "papar(Workforce.halal_training, salah" . $i . "_7);";
                if ($row['has_supervisor'] === 'fail') echo "papar(Workforce.has_supervisor, salah" . $i . "_7);";
                if ($row['comment_work'] !== '') echo "papar('Ulasan: ' + '" . $row['comment_work'] . "', salah" . $i . "_7);";
                
                echo 'if (salah'.$i.'_7.childElementCount > 1) audit'.$i.'.appendChild(salah'.$i.'_7);';
                
                $i++;
            }
            
            //////////////////////////////////////
            
            $sql='SELECT * FROM Cleanliness';
            
            $rs = $db->query($sql);
            
            if($rs === false) {
              trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
            } else {
              $rows_returned = $rs->num_rows;
            }
            
            $rs->data_seek(0);
            $i = 1;
            while($row = $rs->fetch_assoc()) {
                echo "var salah" . $i . "_8 = document.createElement('div');";
                $baki = "\(-" . strval($row['clean_fullmark'] - $row['clean_mark']) . "\)";
                
                if ($row['clean_fullmark'] - $row['clean_mark'] != 0) {
                    echo "lekat('Kebersihan ".$baki."', salah".$i."_8);";
                } else {
                    echo "lekat('Kebersihan', salah".$i."_8);";
                }
                
                if ($row['cleaning_schedule'] === 'fail') echo "papar(Cleanliness.cleaning_schedule, salah" . $i . "_8);";
                if ($row['pollution_free'] === 'fail') echo "papar(Cleanliness.pollution_free, salah" . $i . "_8);";
                if ($row['environment_clean'] === 'fail') echo "papar(Cleanliness.environment_clean, salah" . $i . "_8);";
                if ($row['pest_control'] === 'fail') echo "papar(Cleanliness.pest_control, salah" . $i . "_8);";
                if ($row['comment_clean'] !== '') echo "papar('Ulasan: ' + '" . $row['comment_clean'] . "', salah" . $i . "_8);";
                
                echo 'if (salah'.$i.'_8.childElementCount > 1) audit'.$i.'.appendChild(salah'.$i.'_8);';
                
                $i++;
            }
            
            //////////////////////////////////////
            
            for ($i = 0; $i < $rows_returned; $i++) {
                echo 'markoh[' . $i . '] = ' . $markoh[$i] . ';';
            }
        ?>
        
            cvs.width = 250;
            cvs.height = 130;
            
            var ctx = cvs.getContext('2d');
            
            ctx.beginPath();
            
            ctx.strokeStyle = '#0000FF';
            ctx.moveTo(32, 100);
            
            for (var i = 0; i < markoh.length; i++) {
                ctx.lineTo(64 + 32 * i, 100 - markoh[i]);
            }
            ctx.stroke();
            
            ctx.strokeStyle = '#BABABA';
            ctx.moveTo(32, 0);
            ctx.lineTo(32, 100);
            ctx.lineTo(250, 100);
            
            for (i = 0; i < 100; i += 20) {
                ctx.fillText(100 - i, 15, i + 3);
                
                ctx.moveTo(30, i);
                ctx.lineTo(34, i);
            }
            
            for (i = 0; i < markoh.length; i++) {
                ctx.moveTo(64 + 32 * i, 98);
                ctx.lineTo(64 + 32 * i, 102);
                
                ctx.fillText(i + 1, 61 + 32 * i, 98 + 15);
            }
            
            ctx.stroke();
        </script>
    </div>
</body>
</html>

<?php $db->close(); ?>