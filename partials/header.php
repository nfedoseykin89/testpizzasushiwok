<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
<div class="wrapper">
    <header>
        <div class="container">
            <div class="navbar">
                <div class="menu">
                    <? foreach ($data as $key => $items): ?>
                        <div class="menu__item">
                            <span class="menu__item"><?=$key?></span>
                            <div class="menu__itemDropdown">
                                <? foreach ($items as $item): ?>
                                    <div onclick="location.href = '<?='/product/'.$item['id']?>';" class="menu__itemSub"><?=$item['title']?></div>
                                <? endforeach; ?>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </header>
