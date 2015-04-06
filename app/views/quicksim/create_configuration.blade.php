@extends('layouts.default-create')
@section('head-title')

<style type="text/css">
.panel-heading .accordion-toggle:after {
/* symbol for "opening" panels */
font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
content: "\e114";    /* adjust as needed, taken from bootstrap.css */
float: right;        /* adjust as needed */
color: grey;         /* adjust as needed */
}
.panel-heading .accordion-toggle.collapsed:after {
/* symbol for "collapsed" panels */
content: "\e080";    /* adjust as needed, taken from bootstrap.css */
}
.tooltip-inner {
min-width: 200px;

}
</style>
<h1>Create from new</h1>
@stop


@section('js')
{{ HTML::script('js/jquery.bootstrap-touchspin.js') }}
{{ HTML::script('js/jquery.serialize-object.js') }}
{{ HTML::script('js/quicksim.js') }}
<script type="text/javascript">
	var confname,amount,ram,priority,qos
	$(function() {
		
		
		$(".tips").tooltip({
			placement : 'right'
		});

		function hidePanels(){
			$('#phase2').hide();
			$('#phase3').hide();
			$('#phase4').hide();
			$('#phase5').hide();
			$('#phase6').hide();
		}
		// bin event btn
		/*$('#nextPahse1').click(processPhase1);
		$('#nextPahse2').click(processPhase2);
		$('#nextPahse3').click(processPhase3);
		$('#nextPahse4').click(processPhase4);
		$('#nextPahse5').click(processPhase5);
		$('#backPhase1').click(backPhase1);
		$('#backPhase2').click(backPhase2);
		$('#backPhase3').click(backPhase3);
		$('#backPhase4').click(backPhase4);
		$('#backPhase5').click(backPhase5);
		*/
		// main flow
		//hidePanels();
		
		// angular here
	});
	function processPhase1(){
		confname = $('#name').val();
		if(confname.length > 0) {
			
			$('#phase1').hide();
			$('#phase2').show();
		}
	}
	function processPhase2(){
		amount = $('#amount').val();
		ram = $('#ram').val();
		priority = $('#priority').val();
		qos = $('#qos').val();
		
		if(amount.length > 0) {
			
			$('#phase2').hide();
			$('#phase3').show();
		}
	}
	function processPhase3(){
	
			$('#phase3').hide();
			$('#phase4').show();
		
	}
	function processPhase4(){
	
			$('#phase4').hide();
			$('#phase5').show();
		
	}
	function processPhase5(){
	
			$('#phase5').hide();
			$('#phase6').show();
		
	}
	function backPhase1(){
		$('#phase2').hide();
		$('#phase1').show();
	}
	function backPhase2(){
		
		$('#phase3').hide();
		$('#phase2').show();
	}
	function backPhase3(){
		
		$('#phase4').hide();
		$('#phase3').show();
	}
	function backPhase4(){
		
		$('#phase5').hide();
		$('#phase4').show();
	}
	function backPhase5(){
		
		$('#phase6').hide();
		$('#phase5').show();
	}
	
</script>
@stop
@stop