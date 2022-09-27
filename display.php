<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/display.css"/>
    <title>Anilist</title>
</head>
<body>
    <!-- navigation BAr -->
    <nav id="navbar">   
        <h1>ANI<span class="color-1">LIST</span></h1>
    </nav>

    <!--container -1 -->
    <div class="container-background">
        <button class="btn-add" id="btn-add">ADD RECORD</button>
        <div class="container-table">
        <table>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>ENGLISH TITLE</th>
                <th>SEASON</th>
                <th>EPISODE</th>
                <th>STATUS</th>
                <th>RATING</th>
                <th>DATE START</th>
                <th>DATE FINISH</th>
                <th>OPERATION</th>
            </tr>

            <?php
                $sql = "Select * from anime";
                $result = mysqli_query($con,$sql);
                if($result){
                   while($row = mysqli_fetch_assoc($result)){
                    $id = $row['ID'];
                    $title = $row['TITLE'];
                    $english_title = $row['ENGLISH_TITLE'];
                    $season = $row['SEASON'];
                    $episode = $row['EPISODE'];
                    $status = $row['STATUS'];
                    $rating = $row['RATING'];
                    $date_start = $row['DATE_START'];
                    $date_finish = $row['DATE_FINISH'];

                    echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$title.'</td>
                        <td>'.$english_title.'</td>
                        <td>'.$season.'</td>
                        <td>'.$episode.'</td>
                        <td>'.$status.'</td>
                        <td>'.$rating.'</td>
                        <td>'.$date_start.'</td>
                        <td>'.$date_finish.'</td>
                        <td>
                         <button class="btn-update" id="btn-update">UPDATE</button>
                         <button class="btn-delete" id="btn-delete">DELETE</button>
                        </td>   
                    ';
                        
                   }
                }
                else{
                    echo (mysqli_error($con));
                }
            ?>
            <!-- <tr>
                <td>1</td>
                <td>KIMITSU NI INA NYA</td>
                <td>DEMONSLAYER</td>
                <td>1</td>
                <td>15</td>
                <td></td>
                <td>5</td>
                <td>1/1/2022</td>
                <td>1/2/2024</td>
                <td>
                    <button class="btn-update" id="btn-update">UPDATE</button>
                    <button class="btn-delete" id="btn-delete">DELETE</button>
                </td>

            </tr> -->
        </table>
        </div>
      
    </div>
</body>
</html>