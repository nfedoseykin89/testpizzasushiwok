<?php include ("partials/header.php");?>
    <main>
        <div class="container">
            <div class="main">
                <div class="slider">
                    <img src="https://placehold.co/1000x300" alt="">
                </div>
                <? foreach ($data as $key => $items): ?>
                <div class="category">
                    <div class="category__heading"><?=$key?></div>
                    <div class="category__list">
                        <? foreach ($items as $item): ?>
                        <div class="categoryCard">
                            <div class="categoryCard__img">
                                <a href="<?='/product/'.$item['id']?>" class="link"><img src="https://placehold.co/200x200" alt=""></a>
                            </div>
                            <div class="categoryCard__title">
                                <a href="<?='/product/'.$item['id']?>" class="link"><?=$item['title']?></a>
                            </div>
                        </div>
                        <? endforeach; ?>
                    </div>
                </div>
                <? endforeach; ?>
            </div>
        </div>
    </main>
<?php include ("partials/footer.php");?>
