<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $english_title = $_POST['english_title'];
        $season= $_POST['season'];
        $episode = $_POST['episode'];
        $status = $_POST['status'];
        $rating = $_POST['rating'];
        $date_start = $_POST['date_start'];
        $date_finish = $_POST['date_finish'];

        $sql = "insert into anime (id,title,english_title,season,episode,status,rating,date_start,date_finish)
        values('$id','$title','$english_title','$season','$episode','$status','$rating','$date_start','$date_finish')";
        $result = mysqli_query($con,$sql);
        if(!$result){
            die(mysqli_error($con));
        }
    }
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
        <button class="btn-add" id="btn-add" onclick="form_open()">ADD RECORD</button>
        <div class="container-form" id="container-form">
            <h1>ADD RECORD</h1>
            <hr>
            <form method="post" class="form">
                <div class="form-group">
                    <label for="ID">ID</label><br>
                    <input type="text" placeholder="ID" name="id" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="TITLE">TITLE</label><br>
                    <input type="text" placeholder="TITLE"name="title"autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="ENGLISH_TITLE">ENGLISH TITLE</label><br>
                    <input type="text" placeholder="ENGLISH TITLE"name="english_title"autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="SEASON">SEASON</label><br>
                    <input type="number" placeholder="SEASON"name="season"autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="EPISODE">EPISODE</label><br>
                    <input type="number" placeholder="EPISODE" name="episode"autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="STATUS">STATUS</label><br>
                    <input type="text" placeholder="STATUS"name="status"autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="RATING">RATING</label><br>
                    <input type="number" placeholder="RATING"name="rating"autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="DATE_START">DATE START</label><br>
                    <input type="date" placeholder="DATE START"name="date_start"autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="DATE_FINISH">DATE FINISH</label><br>
                    <input type="date" placeholder="DATE FINISH"name="date_finish"autocomplete="off">
                </div>
                <button type="submut" id="btn-submit" class="btn-submit" name="submit">SUBMIT</button>
                <button id="btn-cancel" class="btn-cancel"onclick="form_close()">CANCEL</button>
               
            </form>
        </div>
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
                         <button class="btn-delete" id="btn-delete"><a href="delete.php?
                         deleteid='.$id.'">DELETE</a></button>
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
<script src="js/display.js"></script>
</html>