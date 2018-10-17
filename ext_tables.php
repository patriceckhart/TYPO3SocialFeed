<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'SteinbauerIT.SitSocialfeed',
            'Socialfeed',
            'Social Feed'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('sit_socialfeed', 'Configuration/TypoScript', 'Social Feed');

    }
);

$pluginSignature = str_replace('_', '', $_EXTKEY) . '_' . 'socialfeed';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/SocialFeed.xml');

$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'recursive,select_key,pages';