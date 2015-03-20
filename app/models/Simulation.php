<?php
	class Simulation extends Eloquent 
	{
		public $timestamps = true;
		protected $fillable = array(
				'name',
				'configuration_id',
				'round'
			);

		public function configuration()
		{
			return $this->hasOne('Configuration','id','configuration_id');
		}
		
	}