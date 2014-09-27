<?php

    use Codesleeve\Stapler\ORM\EloquentTrait;
    use Codesleeve\Stapler\ORM\StaplerableInterface;

    class MediaItem extends \Eloquent implements StaplerableInterface {
    use EloquentTrait;

    // Add the 'avatar' attachment to the fillable array so that it's mass-assignable on this model.
    protected $guarded = ['id'];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('album_art', [
            'styles' => [
                'normal'=>'500x500',
                'medium' => '300x300',
                'thumb' => '100x100'
            ]
        ]);

        parent::__construct($attributes);
    }
}