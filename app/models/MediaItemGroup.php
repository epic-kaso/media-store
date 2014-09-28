<?php

class MediaItemGroup extends \Eloquent {
	protected $fillable = ['title','description','mediapartner_id','media_type'];
	protected $table = "media_item_groups";
}