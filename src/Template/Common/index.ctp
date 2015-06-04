<h1>Blog articles</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($class as $each_class): ?>
    <tr>
        <td><?= $each_class->id ?></td>
        <td>
    </tr>
    <?php endforeach; ?>
</table>