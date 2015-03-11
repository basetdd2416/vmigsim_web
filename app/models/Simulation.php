<?php
	class Simulation extends Eloquent 
	{
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