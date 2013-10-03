<h1> Comments </h1>
<table>
    <tr>
        <th> Timestamp </th>
        <th> User </th>
        <th> Message </th>
    </tr>
    
    <?php foreach ($comments as $comment; ?>
    <tr>
        <td><?php echo $comment['Comment']['Timestamp']; ?></td>
        <td><?php echo $comment['Comment']['User']; ?></td>
        <td><?php echo $comment['Comment']['Message']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($comment); ?>
</table>
