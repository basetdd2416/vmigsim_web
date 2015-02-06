<?php
	class Environment extends Eloquent {
		protected $fillable = array(
			'bandwidth',
			'time_limit',
			'schedule_type',
			'migration_type',
			'control_type',
			'network_type',
			'page_size',
			'wws_ratio',
			'wws_dirty_rate',
			'normal_dirty_rate',
			'max_precopy_round',
			'min_dirty_page',
			'max_no_progress_round',
			'network_interval',
			'network_sd',
			'configuration_id'
			);

		public function configuration()
		{
			$this->belongsTo('Configuration');
		}
	}