@extends('layouts.sidebarproject-info')
@section('content')
<section id="section-1">
	<h2 >#Motivation</h2>
	<article>
		<p>Catastrophic events, such as the 2011 Thailand flood, cause major disruption of operations and services provided by various organizations in every aspect of society, and it is expected that such events will continue to occur, potentially with increased frequency. The flood raised a number of issues and had devastating impacts not only in Thailand, but also in all countries that invest or rely on products manufactured in Thailand. Organizations increasingly rely on information technology (IT) for tasks that range from normal routine operation to management of organization’s information, making it essential for such services to continue operation even during disaster events to avoid further impacts with respect to economic and human loss.</p>
		<p>
			This proposal aims at conducting research on the use of machine virtualization technologies, which allow the live migration of virtual machines (VMs) to/among datacenters and their backup/checkpointing, to mitigate and recover from the impact of catastrophic events on IT infrastructures and the services they deliver. The key idea is the possibility of leveraging Internet Data Centers (IDCs) as disaster recovery sites, where government and corporate data can be backed up and operational servers can be temporarily located in order to provide high-availability and resiliency for the organizations’ operations and services.
		</p>
		<p>
			Research questions that arise in this context are: (a) the need to assess exiting infrastructures since suitable solutions have dependencies on the type of disasters and the realities of the IT environments in the disaster locations, and (b) the need to address challenges when migrating VMs across geographic locations, given that existing VM migration technology have been developed with local area network assumptions that do not hold true in disaster recovery scenarios.
		</p>
		<div class="row" >
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<img src="images/tu-disaster.png" class="img-responsive center-block" alt="Image">
			</div>
		</div>
	</article>
	<hr>
</section >
<section id="section-2">
<article>
	<h2>#Objectives</h2>
	<p>
		The proposed research will study the effectiveness of virtualized Internet data centers in improving IT service continuity during and after a disaster through VM live migration and backup/checkpointing.
	</p>
	<p> The research efforts will be developed in the following thrusts: </p>
	<p>
		(a) collection and analysis of data related to damaged IT services due to the 2011 Thailand flood; (b) studies of the nature of the IT services and their infrastructure designs; (c) studies of the practicality and scalability of VM live migration and backup/checkpointing in wide-area setting; and, (d) investigation of virtualization-based resilient middleware architectures for service continuity.
	</p>
</article>
<hr>
</section>
<section id="section-3">
<article>
	<h2>#Methodology</h2>
	<p>The proposed research will study the effectiveness of virtualized Internet data centers in improving IT service continuity during and after a disaster through VM live migration and backup/checkpointing.</p>
	<p> The research efforts will be in the following thrusts:</p>
	<p>
		1) Collection and analysis of data related to damaged IT services due to the 2011 Thailand flood: information and statistics about affected services will be collected from organizations in various sectors by the PI and her team. Collected information will be recorded and analyzed to understand the procedures taken by the organizations during disasters, the challenges faced in their procedures to recover data and operation, the amount of infrastructure affected by the flood, the amount of effort required by each mitigation or recovery procedure and the cost attributed to it. This knowledge will be used to assess the requirements in terms of time frame and scale of data movement needed during and after the disaster based on different classes of services.
	</p>
	<p>
		2) Studies of the nature of the IT services and their infrastructure designs: Information will be gathered by the PI and her team from Internet Service and IDC providers on the cost, feature and proficiency of the current data backup, storage and migration services they provide. In addition, the characteristics of usage by customers from different sectors will be studied. These characteristics include requirements, types of data/services, storage scales, tolerance periods, server consolidation and colocation, and disaster recovery site configurations. Assessment of infrastructure services through experimentation may also be required. This knowledge will be used to design realistic scenarios where migration technologies will be evaluated.
	</p>
	<p>
		3) Studies of the practicality and scalability of VM live migration and backup/checkpointing in wide-area settings: experiments will be conducted using laboratory IT setups to quantify the capabilities and resiliency of candidate architectures taking into consideration IT infrastructure and WAN connectivity in Thailand. In backup/checkpointing scenarios this work proposes to experimentally evaluate the scalability of VM images transfer through networks that simulate real WANs. In live VM migration, the solution will evaluate the trade-off between maintaining high-availability of the underlying services and the ability to transfer an increased number of services with little downtime.
	</p>
	<p>
		4) Investigation of virtualization-based resilient middleware architectures for service continuity: on the basis of the above-mentioned studies, architectures will be proposed to deploy IT services in the future so that IT disruptions can be avoided while protecting the quality of IT services (including privacy, speed, consistency, etc). The proposed architecture will need to balance between the need for live migration and backup/checkpointing according the existing infrastructure, and may consider the need to perform distributed replication of services.
	</p>
	
	
</article>
<hr>
<section>
<section id="section-4">
<article>
	<h2 >#Results</h2>
	<p>The proposed research will study the effectiveness of virtualized Internet data centers in improving IT service continuity during and after a disaster through VM live migration and backup/checkpointing.</p>
	<p>
		4) Investigation of virtualization-based resilient middleware architectures for service continuity: on the basis of the above-mentioned studies, architectures will be proposed to deploy IT services in the future so that IT disruptions can be avoided while protecting the quality of IT services (including privacy, speed, consistency, etc). The proposed architecture will need to balance between the need for live migration and backup/checkpointing according the existing infrastructure, and may consider the need to perform distributed replication of services.
	</p>
	<p>
		4) Investigation of virtualization-based resilient middleware architectures for service continuity: on the basis of the above-mentioned studies, architectures will be proposed to deploy IT services in the future so that IT disruptions can be avoided while protecting the quality of IT services (including privacy, speed, consistency, etc). The proposed architecture will need to balance between the need for live migration and backup/checkpointing according the existing infrastructure, and may consider the need to perform distributed replication of services.
	</p>
</article>
<hr>
</section>
@stop
@section('js')
{{ HTML::script('js/readmore.js') }}
<script>
	$(document).ready(function () {
	$('#sidebar.nav > li').click(function (e) {
	e.preventDefault();
	$('#sidebar.nav > li').removeClass('active');
	$(this).addClass('active');
	});
	});
	$('article').readmore({
		speed: 75,
		lessLink: '<a href="#">Read less</a>'
	});
</script>
@stop