<?php include ("partials/header.php");?>
    <main>
        <? if ($product): ?>
            <div class="container">
                <div class="main">
                    <div class="breadcrumb">
                        <a href="/" class="link breadcrumb__item">Главная</a>
                        <a href="" class="link breadcrumb__item active"><?= $product['title'] ?></a>
                    </div>
                    </div>
                    <div class="productCard">
                        <div class="productCard__slider">
                            <img src="https://placehold.co/400x400" alt="">
                        </div>
                        <div class="productCard__info">
                            <div class="productCard__title"><?= $product['title'] ?></div>
                            <div class="productCard__description"><?= $product['description'] ?></div>
                            <div class="productCard__properties">
                                <div class="productCard__propertyTitle">
                                    Характеристики
                                </div>
                                <? foreach ($product['attributes'] as $attribute): ?>
                                <div class="productCard__property">
                                    <span><?= $attribute['title'] ?></span>
                                    <span><?= $attribute['value'] ?></span>
                                </div>
                                <? endforeach; ?>
                            </div>
                            <div class="productCard__priceWrap">
                                <div class="productCard__priceText">Цена:</div>
                                <div class="productCard__priceText"><?= $product['price'] ?> ₽</div>
                            </div>
                        </div>
                    </div>
                    <div class="category">
                        <div class="category__heading">Другие товары</div>
                        <div class="category__list">
                            <? foreach ($products as $item): ?>
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
                </div>
            </div>
        <? else: ?>
            <div class="container">
                <div class="main">
                    404
                </div>
            </div>
        <? endif; ?>
    </main>
<?php include ("partials/footer.php");?>