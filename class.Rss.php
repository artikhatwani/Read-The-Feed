<?php

class Rss {
    /*     * *************Declaring Variables*************** */

    public $title = array();
    public $image = array();
    
    public $whole = '<html><body>';
    public $description="";
	public $sub=array();
	public $link="";

    /*     * ********************************************** */

    public function validateFeed($sFeedURL) {

        $sValidator = 'http://feedvalidator.org/check.cgi?url=';

        if ($sValidationResponse = @file_get_contents($sValidator . urlencode($sFeedURL))) {
            if (stristr($sValidationResponse, 'This is a valid RSS feed') !== false) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function readFeed($url) {
        $xml = simplexml_load_file($url);
        $xmlString = file_get_contents($url);
        $inxml = new SimpleXMLElement($xmlString);
        $doc = new DOMDocument();
        //Read XML feed
        for ($i = 0; $i < 10; $i++) {
            if (empty($xml->channel->item[$i]->title)) {
                break;
            }
            $title[$i] = $xml->channel->item[$i]->title;
           
            $title[$i] = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $title[$i]);
          

           // $title[$i] = htmlspecialchars($title[$i], ENT_QUOTES);
            $content = $inxml->channel->item[$i]->children("content", true);
            $description=$xml->channel->item[$i]->description;
           
			$sub[$i]=substr($description,0,140);
			$link[$i]=$xml->channel->item[$i]->link;
            @$doc->loadHTML($content);
            $tags = $doc->documentElement->getElementsByTagName('img');

            if ($tags->length == 0) { //If no image is found


                $image[$i] = "images/noimage.png";
            }

            foreach ($tags as $tag) {
                $image[$i] = $tag->getAttribute('src');

                break;
            }
        }

        //Get the whole Data in one variable	
        $size = sizeof($title);
        $whole = '<html><body>';
        for ($i = 0; $i < $size; $i++) {
            $whole = $whole . '<table style="page-break-after: always;"><tr><td><h2>' . $title[$i] . '</h2></td></tr><tr><td><img src="' . $image[$i] . '" /></td></tr></table>';
        }
        $whole.="</body></html>";

        return array($whole, $title, $image,$sub,$link);
    }

}

?>