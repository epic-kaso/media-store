<?php
    use Laracasts\Commander\CommanderTrait;

    /**
	@class BaseController
	This is the class that all controller will extend from directly or indirectly so that 
	common/ related methods and properties can be placed here.
*/

class BaseController extends Controller {

    use CommanderTrait;
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
