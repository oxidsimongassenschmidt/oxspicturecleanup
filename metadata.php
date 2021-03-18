<?php
/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'oxspicturecleanup',
    'title'        => 'Overwrites old master picture instead of archive it',
    'description'  => array(
        'en' => 'see title',
        'de' => '',
    ),
    'thumbnail'    => 'example.jpg',
    'version'      => '1.0.0',
    'author'       => 'oxs',
    'url'          => 'http://www.oxid-esales.com',
    'email'        => 'info@oxid-esales.com',
    'extend'       => array(
        OxidEsales\Eshop\Application\Controller\Admin\ArticlePictures::class  => OxidSupport\OxsPictureCleanup\Controllers\Admin\oxsArticlePicture::class,
    ),

);
