<?php
include 'db.php';
$db = new Database();
$pdo = $db->pdo;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $db->insertUser($_POST['email'], $_POST['password']);
        echo"Successfully added";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="email">
        <input type="password" name="password">
        <input type="submit">
    </form>
 
    <table border="2">
        <tr>
            <th>id</th>
            <th>email</th>
            <th>password</th>
            <th colspan='2'>action</th>

</tr>
<?php
            $data = $db->selectUser();
            foreach ($data as $da) {
                    echo "<td>". $da['ID'] . "</td>";
                    echo "<td>". $da['email'] . "</td>";
                    echo "<td>". $da['password'] . "</td>";
                    echo "<td><a href='edit 1.php?id={$da['ID']}' class='btn btn-info'>Bewerken</a></td>";
                    echo "<td><a href='delete.php?id={$da['ID']}' class='btn btn-danger'>Verwijderen</a></td>";
            ?>
        </tr>
        <?php  } ?>
  </table>
</body>
</html>