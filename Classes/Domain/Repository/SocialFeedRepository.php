<?php
namespace SteinbauerIT\SitSocialfeed\Domain\Repository;

/**
 * The repository for SocialFeed
 */
class SocialFeedRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @param string $pageId
     * @param string $accessToken
     * @param string $limit
     * @return array
     */
    public function getPageFeed($pageId,$accessToken,$limit) {
        $string = file_get_contents('https://graph.facebook.com/'.$pageId.'/feed?fields=full_picture,created_time,message,link&limit='.$limit.'&access_token='.$accessToken);
        $pageFeedJson = json_decode($string, true);
        $pageFeedJson = $pageFeedJson['data'];
        return $pageFeedJson;
    }

}
