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
    'title'        => [
        'de' => 'OXID Support Entferne Duplikate-Bilder mit gleichen Namen',
        'en' => 'OXID Support Remove Duplicate Picture with same names',
    ],
    'description'  => array(
        'en' => 'Deletes old picture if a new upload happens with same picture name, so no duplicates remain',
        'de' => 'Löscht alte Bilder falls ein neuer Upload mit dem gleichen Bildernamen passiert, so dass keine Duplikate verbleiben',
    ),
    'thumbnail'    => 'example.jpg',
    'version'      => '1.0.0',
    'author'       => 'OXID Support',
    'url'          => 'http://www.oxid-esales.com',
    'email'        => 'support@oxid-esales.com',
    'extend'       => array(
        OxidEsales\Eshop\Application\Controller\Admin\ArticlePictures::class  => OxidSupport\PictureCleanup\Controllers\Admin\ArticlePicture::class,
    ),

);
