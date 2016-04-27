<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/27
 * Time: 9:57
 * Descriptions php读、写xml文件
 */
class xml
{
    public function readXml()
    {
        $xmlfile =  "/menu.xml";
        //$xsd = vmc::singleton('base_xml')->xml2array(file_get_contents($xmlfile), $tags);
        $parser = xml_parser_create();
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, file_get_contents($xmlfile), $tags);
        xml_parser_free($parser);
        $group = Array();
        $menus = Array();
        $count = count($tags);
        $menuSetting = array(
            'index' => array('store', 'deal', 'goods', 'service'),
            'account' => array('account'),
            'message' => array('message'),
        );
        $menu = $menuSetting[$this->menuSetting];
        foreach ($tags as $key => $item) {
            if ($item['tag'] == 'menugroup' && in_array($item['attributes']['name'], $menu)) {
                $menuItem = $item['attributes'];
                for ($i = $key + 1; $i < $count; $i++) {
                    if ($tags[$i]['tag'] == 'menu') {
                        $tags[$i]['attributes']['label'] = $tags[$i]['value'];
                        $menuItem['items'][] = $tags[$i]['attributes'];
                        continue;
                    }
                    break;
                }
                $menus[] = $menuItem;
            }
        }
        return $menus;
    }

    public function SplReadXml($sxi)
    {
        $a = array();
        for ($sxi->rewind(); $sxi->valid(); $sxi->next()) {
            if (!array_key_exists($sxi->key(), $a)) {
                $a[$sxi->key()] = array();
            }
            if ($sxi->hasChildren()) {
                $a[$sxi->key()][] = $this->SplReadXml($sxi->current());
            } else {
                $a[$sxi->key()][] = strval($sxi->current());
            }
        }
        return$a;
    }
}

$xmlIterator = new SimpleXMLIterator(file_get_contents('menu.xml'));
$rs = (new xml())->SplReadXml($xmlIterator);
print_r($rs);