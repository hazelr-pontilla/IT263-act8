<?php
    require_once('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

    <style type="text/css">
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000;
            padding: 5px 10px;
        }
    </style>

</head>
<body>
    <h1>Activity for MySQL!</h1>    

    <h2>Add User</h2>

    <form action="" method="post">
        <p>Firstname: <br> <input type="text" name="fname"></p>
        <p>Lastname: <br> <input type="text" name="lname"></p>
        <p>Email: <br> <input type="text" name="email"></p>
        <input type="submit" name="save" value="Save">
    </form>
    <br>

    <?php
        if(isset($_POST['save']))
        {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
    
            insertData($fname, $lname, $email);
    
            header('location: index.php');
        } 
    ?>
    <hr>
    <h2>List of Users</h2>
    
    <?php
        $result = getAllData();

        if ($result)
        {
            ?>
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $key => $row)
                        {
                            echo '<tr>
                                <td>'.$row['first_name'].'</td>
                                <td>'.$row['last_name'].'</td>
                                <td>'.$row['email'].'</td>
                            </tr>';
                        }
                    ?>
                </tbody>
            </table>
            <?php
        }
        else
        {
            echo '<p>No result found</p>';
        }
    ?>
</body>
</html>