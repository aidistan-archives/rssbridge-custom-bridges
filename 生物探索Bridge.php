<?php
class 生物探索Bridge extends XPathAbstract {
    const NAME = '生物探索';
    const URI = 'https://www.biodiscover.com';
    const DESCRIPTION = '探索生物科技价值的新媒体门户';
    const MAINTAINER = 'aidistan';
    const PARAMETERS = array(array(
        'c' => array(
            'name' => '订阅频道',
            'type' => 'list',
            'required' => true,
            'values' => array(
                '技术研究' => 'reaseach',
                '产业动态' => 'industry',
                '人物访谈' => 'interview',
                '活动发布' => 'activity'
            ),
            'defaultValue' => 'reaseach'
        )
    ));

    // const FEED_SOURCE_URL = '';
    // const XPATH_EXPRESSION_FEED_TITLE = '';
    // const XPATH_EXPRESSION_FEED_ICON = '';
    const XPATH_EXPRESSION_ITEM = '//div[@class="new_list"]/ul/li[position()<=10]';
    const XPATH_EXPRESSION_ITEM_TITLE = './/a/@title';
    const XPATH_EXPRESSION_ITEM_CONTENT = './/a/@href';
    const XPATH_EXPRESSION_ITEM_URI = './/a/@href';
    const XPATH_EXPRESSION_ITEM_AUTHOR = './/a/@href';
    const XPATH_EXPRESSION_ITEM_TIMESTAMP = './/div[@class="times"]';
    // const XPATH_EXPRESSION_ITEM_ENCLOSURES = '';
    // const XPATH_EXPRESSION_ITEM_CATEGORIES = '';

    protected function getSourceUrl() {
        return static::URI . '/' . $this->getInput('c');
    }

    protected function provideWebsiteContent() {
        return defaultLinkTo(parent::provideWebsiteContent(), static::URI);
    }

    protected function formatItemContent($uri) {
        return getSimpleHTMLDOMCached($uri)->find('.main_info', 0);
    }

    protected function formatItemAuthor() {
        return '生物探索';
    }
}
