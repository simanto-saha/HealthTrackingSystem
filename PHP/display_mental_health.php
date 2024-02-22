<?php
// first of all, we need to connect to the database
require_once('DBconnect.php');

$sql = "SELECT * FROM mental_health";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>

    <html>
        <head>
        </head>
        <body>

        <table>
            <tr>
            <!--<th>H_record_Id</th>-->
            <th>Stress Level</th>
                <th>Anxiety Level</th>
               
                
            </tr>

            <?php
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    
                  <!--<td><?= $row['H_record_Id '] ?></td>-->
                    <td><?= $row['stress_level'] ?></td>
                    <td><?= $row['anxiety_level'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    } else {
        echo "No mental health records found";
    }

    $conn->close();
    ?>
</body>
</html>