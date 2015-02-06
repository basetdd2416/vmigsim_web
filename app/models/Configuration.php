<?php
	class Configuration extends Eloquent {

		protected $fillable = array('name');

		public function vms ()
		{
			return $this->hasMany('Vm');
		}

		public function environment()
		{
			return $this->hasOne('Environment');
		}

	}