<?php
// first of all, we need to connect to the database
require_once('DBconnect.php');

$sql = "SELECT * FROM physical_health";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>

    <html>
        <head>
        </head>
        <body>

        <table>
            <tr>
                
               <!-- <th>H_record_Id </th>-->
                <th>cholesterol</th>
                <th>blood_pressure</th>
            </tr>

            <?php
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    
                    <!--<td><?= $row['H_record_Id '] ?></td>-->
                    <td><?= $row['cholesterol'] ?></td>
                    <td><?= $row['blood_pressure'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    } else {
       # echo "No mental health records found";
    }

    $conn->close();
    ?>
</body>
</html>