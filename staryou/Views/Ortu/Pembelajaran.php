
<?php

require_once 'Models/Ortu/Pembelajaran.php';

$pemb = new Pembelajaran();
$result = $pemb->listPembelajaran();


 print_r($result);

$return_arr = [];
foreach($result as $row)
{
    $id_pembelajaran = $row['id_pembelajaran'];
    $nama_pembelajaran = $row['nama_pembelajaran'];
    $is_aktif = $row['is_aktif'];
    $created = $row['created'];
    
    $return_arr[] = array
    (
        "id_pembelajaran" => $id_pembelajaran,
        "nama_pembelajaran" => $nama_pembelajaran,
        "is_aktif" => $is_aktif,
        "created" => $created 
        
    );
}
$data = json_encode( $return_arr );
?>

<h1>Pembelajaran </h1>

<hr>
<br>
<div class="card">
                                <div class="card-header">
                                Pembelajaran
</div>
                                <div class="card-body">

<table id="example2" class="display" style='width: 100%;'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pembelajaran</th>
                <th></th>
            </tr>
        </thead>
        
    </table>

    </div>
</div>

<br>
    <hr>
<div id='jdata'>

</div>

<script>
$(document).ready(function() {


var jjson = <?php 
    echo "'". $data."'" ;
?>; 

$('#example2').DataTable( {
                          "data": JSON.parse(jjson),
                          "columns": [
                              { 'data': 'id_pembelajaran' },
                              { 'data': 'nama_pembelajaran' },
                              {"defaultContent": 
                                  "<button id='tambah' class='btn btn-success'>Add</button>&nbsp;"+
                                  "<button id='edit' class='btn btn-primary'>Edit</button>&nbsp;"+
                                  "<button id='hapus' class='btn btn-danger'>DEL</button>"
                              }
                          ]
                      });
});
</script>