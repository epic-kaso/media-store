<?php namespace MediaStore\Mediapartner\Settings;

class CreateSettingsCommand {
    public $business_logo;
    public $business_background_color;
    public $business_name;
    public $business_tagline;

    /**
     * @param $business_logo
     * @param $business_background_color
     * @param $business_name
     * @param $business_tagline
     */
    public function __construct($business_logo,
                                $business_background_color,
                                $business_name,
                                $business_tagline)
    {
        $this->business_logo = $business_logo;
        $this->business_background_color = $business_background_color;
        $this->business_name = $business_name;
        $this->business_tagline = $business_tagline;
    }

}