<?php

class Product
{

    public $productArray = array(
        "1" => array(
            'id' => '1',
            'title' => '3D Camera',
            'description' => '3D Camera for sale',
            'code' => '3DcAM01',
            'image' => 'product-images/camera.jpg',
            'image_large' => 'product-images/camera-large.png',
            'price' => '1500.00',
            'detail' => 'detail about 3D Camera',
            'aditional' => ''
        ),
        "2" => array(
            'id' => '2',
            'title' => 'External Hard Drive',
            'description' => 'Esternalk Hard Drive for Sale',
            'code' => 'USB02',
            'image' => 'product-images/external-hard-drive.jpg',
            'image_large' => 'product-images/external-hard-drive-large.png',
            'price' => '800.00',
            'detail' => 'detail about 3D Camera',
            'aditional' => 'aditional about 3D camera'
        ),
        "3" => array(
            'id' => '3',
            'title' => 'Wrist Watch',
            'description' => 'Wrist wath for Sale',
            'code' => 'wristWear03',
            'image' => 'product-images/watch.jpg',
            'image_large' => 'product-images/watch-large.png',
            'price' => '300.00',
            'detail' => 'detail aboutWrist Watch',
            'aditional' => 'aditional information about Wrist Watch'
        ),
        "4" => array(
            'id' => '4',
            'title' => 'Apple TV',
            'description' => 'Apple TV for sale',
            'code' => 'ATV',
            'image' => 'product-images/Apple-TV.png',
            'image_large' => 'product-images/Apple-TV-large.png',
            'price' => '400.00',
            'detail' => 'detail about Apple-TV',
            'aditional' => 'aditiona information about Apple-TV'
        ),
        "5" => array(
            'id' => '5',
            'title' => 'Ipod Nano',
            'description' => 'Ipod Nano for sale',
            'code' => 'IpodNano',
            'image' => 'product-images/iPod-Nano.png',
            'image_large' => 'product-images/iPod-Nano-large.png',
            'price' => '500.00',
            'detail' => 'detail about Ipod Nano',
            'aditional' => 'Aditiona Information about Ipod Nano'
        ),
        "6" => array(
            'id' => '6',
            'title' => 'Ipod Shuffle',
            'description' => 'Ipod Shuffle for sale',
            'code' => 'IpodShuffle',
            'image' => 'product-images/iPod-Shuffle.png',
            'image_large' => 'product-images/iPod-Shuffle-large.png',
            'price' => '600.00',
            'detail' => 'detail about Ipod Shuffle',
            'aditional' => 'aditional information about Ipod Shuffle'
        ),
        "7" => array(
            'id' => '7',
            'title' => 'Iphone',
            'description' => 'Iphone for sale',
            'code' => 'Iphone',
            'image' => 'product-images/iPhone.png',
            'image_large' => 'product-images/iPhone-large.png',
            'price' => '650.00',
            'detail' => 'detail about Iphone',
            'aditional' => 'Aditiona Information about iPhone'
        ),
        "8" => array(
            'id' => '8',
            'title' => 'Ipod Air 2',
            'description' => 'Ipod Air 2 for sale',
            'code' => 'Ipod',
            'image' => 'product-images/iPod.png',
            'image_large' => 'product-images/iPod-large.png',
            'price' => '400.00',
            'detail' => 'detail about Ipod Air 2',
            'aditional' => 'aditional information about Ipod Air 2'
        ),
        "9" => array(
            'id' => '9',
            'title' => 'IMac',
            'description' => 'IMac for sale',
            'code' => 'IMac',
            'image' => 'product-images/iMac.png',
            'image_large' => 'product-images/iMac-large.png',
            'price' => '400.00',
            'detail' => 'detail about Imac',
            'aditional' => 'aditional information about IMac'
        )
    );

    public function getAllProduct()
    {
        return $this->productArray;
    }
}
