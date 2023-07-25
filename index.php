<?php

require_once('Router.php');

function connect() {
    return new SQLite3("db/test_pizzasushiwok.db");
}

function share() {
    $db = connect();
    $sql = ('SELECT products.id, products.title, categories.title as category_title 
                                        FROM products INNER JOIN categories
                                        ON products.category_id = categories.id');
    $result = $db->query($sql);
    $data = [];
    while ($row = $result->fetchArray()) {
        $data[$row['category_title']][] = ['title' =>  $row['title'], 'id' => $row['id']];
    }

    return $data;
}

$router = new Router();

$router->add('^/$',function($url) {
    $data = share();
    require __DIR__ . '/views/home.php';
});

$router->add('^/product/([0-9a-zA-Z\-]+)',function($url,$slug) {

    $data = share();

    $db = connect();
    $stmt = $db->prepare('SELECT * FROM products WHERE id=:id');
    $stmt->bindValue(':id', (int) $slug, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $product = $result->fetchArray();

    if($product) {
        $stmt = $db->prepare( 'SELECT value, title FROM product_attributes INNER JOIN attributes
                                                            ON product_attributes.attribute_id = attributes.id 
                                                            WHERE product_attributes.product_id = :product_id');
        $stmt->bindValue(':product_id', (int) $product['id'], SQLITE3_INTEGER);
        $result = $stmt->execute();
        $product['attributes'] = [];
        while ($row = $result->fetchArray()) {
            $product['attributes'][] = ['title' =>  $row['title'], 'value' => $row['value']];
        }

        $stmt = $db->prepare('SELECT id, title FROM products WHERE category_id=:category_id');
        $stmt->bindValue(':category_id', (int) $product['category_id'], SQLITE3_INTEGER);
        $result = $stmt->execute();
        $products = [];
        while ($row = $result->fetchArray()) {
            $products[] = ['id' => $row['id'], 'title' => $row['title']];
        }
    }

    require __DIR__ . '/views/product.php';
});


$router->init();