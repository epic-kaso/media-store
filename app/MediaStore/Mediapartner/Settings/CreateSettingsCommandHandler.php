<?php namespace MediaStore\Mediapartner\Settings;

use Laracasts\Commander\CommandHandler;
use MediaStore\Repositories\Mediapartner\MediapartnerSettingsRepository;

class CreateSettingsCommandHandler implements CommandHandler {

    /**
     * @var MediapartnerSettingsRepository
     */
    private $mediapartnerSettingsRepository;

    public function __construct(MediapartnerSettingsRepository $mediapartnerSettingsRepository)
    {
        $this->mediapartnerSettingsRepository = $mediapartnerSettingsRepository;
    }


    /**
     * Handle the command.
     *
     * @param object $command
     * @return mixed
     */
    public function handle($command)
    {
        $settings = $this->mediapartnerSettingsRepository
            ->buildSettings($command->business_logo,
                $command->business_background_color,
                $command->business_name,
                $command->business_tagline);

        return $settings;
    }

}