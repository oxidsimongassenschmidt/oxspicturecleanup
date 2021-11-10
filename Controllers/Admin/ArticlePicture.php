<?php
namespace OxidSupport\PictureCleanup\Controllers\Admin;

use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Core\PictureHandler;

class ArticlePicture extends ArticlePicture_parent
{
    /**
     * Saves (uploads) pictures to server.
     *
     * @return mixed
     */
    public function save()
    {
        /** @var \OxidEsales\Eshop\Application\Model\Article $oArticle */
        $oArticle = oxNew(Article::class);
        if ($oArticle->load($this->getEditObjectId())) {
            $this->removeOldMasterPictureIfANewPictureIsReplacingIt($oArticle);
        }
        return parent::save();
    }

    /**
     * Removes old master picture by the new one.
     * @param \OxidEsales\Eshop\Application\Model\Article $article
     */
    protected function removeOldMasterPictureIfANewPictureIsReplacingIt(\OxidEsales\Eshop\Application\Model\Article $article)
    {
        /** @var oxPictureHandler $pictureHandler */
        $pictureHandler  = oxNew(PictureHandler::class);
        foreach ($_FILES['myfile']['name'] as $key => $value) {
            if (!empty($value)) {
                preg_match('/.*[^\d]([\d]+)/', $key, $matches);
                if (count($matches) === 2) {
                    $pictureHandler->deleteArticleMasterPicture($article, $matches[1]);
                }
            }
        }
    }
}
