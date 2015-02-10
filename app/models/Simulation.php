<?php
	class Simulation extends Eloquent 
	{
		protected $fillable = array(
				'name',
				'configuration_id',
				'round'
			);
		
	}