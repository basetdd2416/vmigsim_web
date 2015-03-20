<?php
	class Configuration extends Eloquent {
		public $timestamps = true;
		protected $fillable = array('name');

		public function vms ()
		{
			return $this->hasMany('Vm');
		}

		public function environment()
		{
			return $this->hasOne('Environment');
		}

		public function simulation()
		{
			return $this->hasOne('Simulation');
		}

	}