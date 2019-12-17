<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script language='javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script language='javascript' src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script language='javascript' src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<?php

include_once('./setting.php');

$sql = "select * from system order by num desc limit 50";

$result = mysqli_query($con, $sql);

echo '<div class="container m-0 p-0" style="width:100%">';
echo '<table class="table table-bordered m-1">';
echo '<thead class="thead-dark text-center">
      <tr>
        <th>#</th>
        <th>date</th>
        <th>user</th>
        <th>요청</th>
        <th>응답</th>
        <th>url</th>
        <th>type</th>
        <th>file</th>
      </tr>
      </thead>';
foreach($result as $res){
    echo '<tr>';
    echo '<td>'.$res['num'].'</td>';
    echo '<td>'.$res['date'].'</td>';
    echo '<td>'.$res['user'].'</td>';
    echo '<td>'.$res['request'].'</td>';
    echo '<td>'.$res['response'].'</td>';
    echo '<td>'.$res['url'].'</td>';
    echo '<td>'.$res['type'].'</td>';
    echo '<td>'.$res['file'].'</td>';
    echo '</tr>';
}
echo '</table>';
echo '</div>';

echo '<style>
        body { max-width: 100% !important; }
      </style>'
?>

<script language='javascript'>
window.setTimeout('window.location.reload()',800); //60초마다 새로고침
</script>