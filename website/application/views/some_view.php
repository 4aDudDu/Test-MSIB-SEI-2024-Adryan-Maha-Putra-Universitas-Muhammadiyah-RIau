<!DOCTYPE html>
<html>
<head>
    <title>Data Lokasi dan Proyek</title>
</head>
<body>
    <h1>Lokasi</h1>
    <ul>
        <?php foreach ($lokasi as $item): ?>
            <li><?php echo $item['name']; ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Proyek</h1>
    <ul>
        <?php foreach ($proyek as $item): ?>
            <li><?php echo $item['title']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
