<?php
include ('db.php');
$db = new Database(); 
 

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
</tr>

  <tr> <?php
    $user = $db->selectOneUser(1); ?>
    <td><?php echo $user['id'];?></td>
    <td><?php echo $user['email'];?></td>
    <td><?php echo $user['password'];?></td>
    </tr>
  </table>
</body>
</html>