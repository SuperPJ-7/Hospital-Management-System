<?php
include ('authorize.php');
?>

<table cellspacing="0" class="table">
    <tr>
        <th class="table-width">Name</th>
        <th class="table-width">Specialization</th>
        <th class="table-width">Contact</th>
        <th class="table-width">Email</th>
        <th class="table-width">Password</th>
        <th class="table-width">License</th>
        <th>Action</th>
    <tr>
        <!-- fetching search rows -->
        <?php

        $email = $_POST['email'];
        //if empty search is performed show all results
        $condition = ($email=='')?(' status = 1'):(" email = '$email' and status=1");

        $query = "SELECT *from doctor WHERE" . $condition;
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td class='table-width'>" . $row['name'] . "</td>";
            echo "<td class='table-width'>" . $row['spec'] . "</td>";
            echo "<td class='table-width'>" . $row['contact'] . "</td>";
            echo "<td class='table-width'>" . $row['email'] . "</td>";
            echo "<td class='table-width'>" . $row['password'] . "</td>";
            echo "<td class='table-width'>" . $row['lic'] . "</td>";
            echo "<td> <a href='doc_delete.php?id=" . $row['did'] . "' class='cancel button'>Delete</a></td>";
            echo "</tr>";
        }

        ?>
</table>
<!-- finished fetching table rows -->