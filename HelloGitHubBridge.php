<?php
class HelloGitHubBridge extends XPathAbstract {
    const NAME = 'Hello GitHub';
    const URI = 'https://hellogithub.com';
    const DESCRIPTION = '分享 GitHub 上有趣、入门级的开源项目';
    const MAINTAINER = 'aidistan';

    const FEED_SOURCE_URL = 'https://hellogithub.com/article/';
    const XPATH_EXPRESSION_FEED_TITLE = '/html/head/title';
    const XPATH_EXPRESSION_FEED_ICON = '//link[@rel="icon"][last()]/@href';
    const XPATH_EXPRESSION_ITEM = '//section[@class="post"][position()<=10]';
    const XPATH_EXPRESSION_ITEM_TITLE = './/a';
    const XPATH_EXPRESSION_ITEM_CONTENT = './/@href';
    const XPATH_EXPRESSION_ITEM_URI = './/a/@href';
    const XPATH_EXPRESSION_ITEM_AUTHOR = './/*[@class="post-meta"]';
    const XPATH_EXPRESSION_ITEM_TIMESTAMP = './/*[@class="post-meta"]/span';
    // const XPATH_EXPRESSION_ITEM_ENCLOSURES = '';
    // const XPATH_EXPRESSION_ITEM_CATEGORIES = '';

    protected function provideWebsiteContent() {
        return defaultLinkTo(parent::provideWebsiteContent(), static::URI);
    }

    protected function formatItemContent($uri) {
        return getSimpleHTMLDOMCached($uri)->find('.markdown-body', 0);
    }

    protected function formatItemAuthor($meta) {
        return preg_split('/ • /', $meta)[0];
    }
}
