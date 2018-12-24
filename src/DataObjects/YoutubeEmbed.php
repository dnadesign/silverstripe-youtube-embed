<?php

namespace DNADesign\YoutubeEmbed;

use SilverStripe\ORM\DataObject;
use SilverStripe\View\ArrayData;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use EdgarIndustries\YouTubeField\YouTubeField;
use Sinergi\BrowserDetector\Os;

class YoutubeEmbed extends DataObject
{
  private static $table_name = "DNADesign_YoutubeEmbed";

  private static $db = [
    'VideoID' => 'Varchar(11)'
  ];

  private static $has_one = [
    'Poster' => Image::class,
  ];

  public function getIsMobile() {
    $os = new Os();
    return $os->getIsMobile();
  }

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->addFieldsToTab('Root.Main', array(
      YouTubeField::create('VideoID', 'YouTube Video'),
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
}
