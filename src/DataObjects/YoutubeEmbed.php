<?php

namespace DNADesign\YoutubeEmbed;

use SilverStripe\ORM\DataObject;
use SilverStripe\View\ArrayData;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use EdgarIndustries\YouTubeField\YouTubeField;
use SilverStripe\Forms\TextField;
use Sinergi\BrowserDetector\Os;

class YoutubeEmbed extends DataObject
{
    private static $table_name = "DNADesign_YoutubeEmbed";

    private static $db = [
    'VideoID' => 'Varchar(11)',
    'VideoTitle' => 'Varchar(255)'
  ];

    private static $has_one = [
    'Poster' => Image::class,
  ];
  
    private static $owns = [
    'Poster',
  ];

    public function getIsMobile()
    {
        $os = new Os();
        return $os->getIsMobile();
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', array(
          YouTubeField::create('VideoID', 'YouTube Video'),
          TextField::create('VideoTitle')->setDescription('Used as title of the iframe, for accessibility.'),
          UploadField::create('Poster')
        ));

        return $fields;
    }

    public function forTemplate()
    {
        // return $this->renderWith(self::class);
        return $this->customise(new ArrayData([
          'IsMobileBrowser' => $this->getIsMobile(),
        ]))->renderWith(self::class);
    }

    /**
     * Return the title used as attribute on the iframe
     *
     * @return string
     */
    public function getIframeTitle()
    {
        return $this->getTitle();
    }

    /**
     *
     * @return string
     */
    public function getTitle()
    {
        if (trim($this->VideoTitle)) {
            return $this->VideoTitle;
        }

        return _t(self::class . '.DEFAULT_VIDEO_TITLE', 'Youtube video');
    }
}
