<?php
class 当然我在扯淡Bridge extends XPathAbstract {
    const NAME = '当然我在扯淡';
    const URI = 'https://www.yinwang.org';
    const DESCRIPTION = '王垠的中文博客';
    const MAINTAINER = 'aidistan';

    const FEED_SOURCE_URL = 'https://www.yinwang.org/';
    // const XPATH_EXPRESSION_FEED_TITLE = '';
    const XPATH_EXPRESSION_FEED_ICON = '//link[@rel="shortcut icon"]/@href';
    const XPATH_EXPRESSION_ITEM = '///div[@class="outer"]/ul/li[position()<=10]';
    const XPATH_EXPRESSION_ITEM_TITLE = './/a';
    const XPATH_EXPRESSION_ITEM_CONTENT = './/a/@href';
    const XPATH_EXPRESSION_ITEM_URI = './/a/@href';
    const XPATH_EXPRESSION_ITEM_AUTHOR = './/a/@href';
    const XPATH_EXPRESSION_ITEM_TIMESTAMP = './/div[@class="date"]';
    // const XPATH_EXPRESSION_ITEM_ENCLOSURES = '';
    // const XPATH_EXPRESSION_ITEM_CATEGORIES = '';

    protected function provideWebsiteContent() {
        return defaultLinkTo(parent::provideWebsiteContent(), static::URI);
    }

    protected function formatItemContent($uri) {
        return getSimpleHTMLDOMCached($uri)->find('.inner', 0);
    }

    protected function formatItemAuthor() {
        return '王垠';
    }

    protected function formatItemTimestamp($dateStr) {
        return str_replace(array('年', '月', '日'), array('/', '/', ''), $dateStr);
    }
}
