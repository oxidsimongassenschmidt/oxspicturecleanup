<?php
namespace OxidSupport\OxsPictureCleanup\Controllers\Admin;

use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Core\PictureHandler;

class oxsArticlePicture extends oxsArticlePicture_parent
{
    /**
     * Saves (uploads) pictures to server.
     *
     * @return mixed
     */
    public function save()
    {
        /** @var oxarticle $oArticle */
        $oArticle = oxNew(Article::class);
        if ($oArticle->load($this->getEditObjectId())) {
            $this->removeOldMasterPictureIfANewPictureIsReplacingIt($oArticle);
        }
        return parent::save();
    }

    /**
     * Removes old master picture by the new one.
     * @param oxArticle $article
     */
    protected function removeOldMasterPictureIfANewPictureIsReplacingIt(\OxidEsales\Eshop\Application\Model\Article $article)
    {
        /** @var oxPictureHandler $oxPicHandler */
        $oxPicHandler = oxNew(PictureHandler::class);
        foreach ($_FILES['myfile']['name'] as $key => $value) {
            if (!empty($value)) {
                preg_match('/.*[^\d]([\d]+)/', $key, $matches);
                if (count($matches) === 2) {
                    $oxPicHandler->deleteArticleMasterPicture($article, $matches[1]);
                }
            }
        }
    }
}
