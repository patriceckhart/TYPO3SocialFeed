<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'SteinbauerIT.SitSocialfeed',
            'Socialfeed',
            [
                'SocialFeed' => 'feed',
            ],
            // non-cacheable actions
            [
                'SocialFeed' => 'feed',
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    socialfeed {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('sit_socialfeed') . 'Resources/Public/Icons/user_plugin_socialfeed.svg
                        title = LLL:EXT:sit_socialfeed/Resources/Private/Language/locallang_db.xlf:tx_sit_socialfeed_domain_model_socialfeed
                        description = LLL:EXT:sit_socialfeed/Resources/Private/Language/locallang_db.xlf:tx_sit_socialfeed_domain_model_socialfeed.description
                        tt_content_defValues {
                            CType = list
                            list_type = sitsocialfeed_socialfeed
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
