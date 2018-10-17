<?php
namespace SteinbauerIT\SitSocialfeed\Controller;

/**
 * SocialFeedController
 */
class SocialFeedController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * socialFeedRepository
     *
     * @var \SteinbauerIT\SitSocialfeed\Domain\Repository\SocialFeedRepository
     * @inject
     */
    protected $socialFeedRepository = null;

    /**
     * action feed
     *
     * @return void
     */
    public function feedAction()
    {
        $pageId = $this->settings['facebookPageId'];
        $accessToken = $this->settings['facebookAccessToken'];
        $limit = $this->settings['facebookLimit'];
        $feed = $this->socialFeedRepository->getPageFeed($pageId,$accessToken,$limit);
        $this->view->assign('pageFeed',$feed);
    }

}
