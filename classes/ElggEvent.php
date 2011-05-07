<?php
class ElggEvent extends ElggObject {
	protected function initializeAttributes() {
		$this->attributes['subtype'] = 'event';
	}

	public function rsvp($value = 'yes') {
		if (!$this->canAnnotate(0, 'rsvp')) {
			return false;
		}


		elgg_get_annotations(array(
			'entity_guid' => $this->guid,
			'owner_guid' => 0, //FIXME!!!
			'name' => 'rsvp',
			'limit' => 1,
		));

		switch ($value) {
			case 'yes':
			case 'maybe':
			case 'no':
				return $this->annotate('rsvp', $value);
			default:
				//oops... didn't recognize that rsvp value
				return false;
		}
	}
}