<?php

	use Codesleeve\Stapler\ORM\EloquentTrait;
	use Codesleeve\Stapler\ORM\StaplerableInterface;

	class MediapartnerSetting extends \Eloquent implements StaplerableInterface {

		use EloquentTrait;
		protected $guarded = ['id'];

		public function __construct(array $attributes = array()) {
			$this->hasAttachedFile('business_logo', [
				'styles' => [
					'normal'=>'640x480',
					'medium' => '320x240',
					'thumb' => '160x120'
				]
			]);

			parent::__construct($attributes);
		}

	}