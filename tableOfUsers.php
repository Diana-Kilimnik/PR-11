<table class="table" >
    <thead>
        <th>№</th>
        <th>First Name</th> 
        <th>Last Name</th>
        <th>Login</th>
        <th>Photo</th>
        <th>Role</th>
    </thead>
    <tbody>
    <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "testdb";
        
        $conn = mysqli_connect($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo"ERROR!";
        }
            $queryUser = "SELECT * FROM users";
            $resultUser = mysqli_query($conn, $queryUser);
            if($resultUser){
                while($rowUser = mysqli_fetch_array($resultUser)){
                    echo "<tr>";
                        echo "<td>".$rowUser['id']."</td>";
                        echo "<td>".$rowUser['first_name']."</td>";
                        echo "<td>".$rowUser['last_name']."</td>";
                        echo "<td>".$rowUser['email']."</td>";
                        
                        if($rowUser['photo'] == ''){
                            echo '<td><img src="public/images/default-user-icon.jpg" alt="" width="50" height="50"><td>';
                        }else{
                            if(file_exists("public/images/{$rowUser['photo']}")){
                                echo '<td><img src="public/images/' .$rowUser['photo']. '" alt="" width="50" height="50"><td>';
                            }else{
                                echo '<td><img src="public/images/default-user-icon.jpg" alt="" width="50" height="50"><td>';
                            }
                        }

                        $queryRole = "SELECT title FROM roles WHERE id = '{$rowUser['role_id']}'";
                        $resultRole = mysqli_query($conn, $queryRole);
                        $rowRole = mysqli_fetch_array($resultRole);
                        echo "<td>".$rowRole['title']."</td>";
                    echo "</tr>";
                }
            }
        ?>
    </tbody> 
</table>