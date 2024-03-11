<?php
include('dbconfig.php');
?>

<table cellspacing="0" class="table">
    <tr>
        <th class="table-width">Name</th>
        <th class="table-width">Gender</th>
        <th class="table-width">DOB</th>
        <th class="table-width">Contact</th>
        <th class="table-width">Email</th>
        <th class="table-width">Password</th>
        <th>Action</th>
    <tr>
        <!-- fetching search rows -->
        <?php

        $email = $_POST['email'];
        $query = "SELECT *from patient WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td class='table-width'>" . $row['name'] . "</td>";
            echo "<td class='table-width'>" . $row['gender'] . "</td>";
            echo "<td class='table-width'>" . $row['dob'] . "</td>";
            echo "<td class='table-width'>" . $row['cont'] . "</td>";
            echo "<td class='table-width'>" . $row['email'] . "</td>";
            echo "<td class='table-width'>" . $row['password'] . "</td>";
            echo "<td> <a href='patient_delete.php?id=" . $row['pid'] . "' class='button'>Delete</a></td>";
            echo "</tr>";
        }

        ?>
</table>
<!-- finished fetching table rows -->