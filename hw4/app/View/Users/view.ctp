<h1> User </h1>
<table>
    <tr>
        <th> Name </th>
        <th> Age </th>
        <th> Info </th>
    </tr>
    
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['Name']; ?></td>
        <td><?php echo $user['User']['Age']; ?></td>
        <td><?php echo $user['User']['Info']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>
