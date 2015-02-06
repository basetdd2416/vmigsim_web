<?php
	class Vm extends Eloquent {
		protected $fillable = array(
				'amount',
				'ram',
				'priority',
				'qos'
			);


		public function configuration()
		{
			$this->belongsTo('Configuration');
		}
	}