<?php
	class Vm extends Eloquent {
		public $timestamps = true;
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