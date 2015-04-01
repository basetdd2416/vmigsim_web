<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		@include('includes.head')
		<style type="text/css">
		ul.nav-tabs {
		width: 200px;
		margin-top: 20px;
		border-radius: 4px;
		border: 1px solid #ddd;
		box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
		}
		ul.nav-tabs li {
		margin: 0;
		border-top: 1px solid #ddd;
		}
		ul.nav-tabs li:first-child {
		border-top: none;
		}
		ul.nav-tabs li a {
		margin: 0;
		padding: 8px 16px;
		border-radius: 0;
		}
		ul.nav-tabs li.active a, ul.nav-tabs li.active a:hover {
		color: #fff;
		background: #0088cc;
		border: 1px solid #0088cc;
		}
		ul.nav-tabs li:first-child a {
		border-radius: 4px 4px 0 0;
		}
		ul.nav-tabs li:last-child a {
		border-radius: 0 0 4px 4px;
		}
		ul.nav-tabs.affix {
		top: 30px; /* Set the top position of pinned element */
		}
		p {
		text-indent: 50px;
		}
		</style>
	</head>
	<body data-spy="scroll" data-target="#myScrollspy">
		<div class="container">
			<header class="row">
				@include('includes.header')
			</header>
			
			<div class="jumbotron text-center">
				<h1>Executive Summary: Enabling continued operation of IT services 
and infrastructures during floods and other disasters
</h1>
			</div>
			<div class="row">
				<div class="col-xs-3" id="myScrollspy">
					<ul class="nav nav-tabs nav-stacked affix-top" data-spy="affix" data-offset-top="400">
						<li class="active"><a href="#section-1">The data collection and analysis</a></li>
						<li><a href="#section-2">Flood impact & Feasibility Study</a></li>
						<li><a href="#section-3">The feasibility study of leveraging VM migration as a mitigating mechanism for service continuation and disaster recovery.</a></li>
						<li><a href="#section-4">Literature review on VM migration in WAN environments</a></li>
						
					</ul>
				</div>
				<div class="col-xs-9">
					<h2 id="section-1">Literature review on VM migration in WAN environments.</h2>
					<h3>#Objectives</h3>
					<ol>
						<li>To collect and analyze data related to damaged IT services due to the 2011 Thailand flood.</li>
						<li>To study the nature of the IT services and their infrastructure designs in order to design realistic. </li>
					</ol>
					<h3>#Methodology</h3>
					<ol>
						<li>Selected organizations affected by the Thailand’s 2011 flood from the educational, research, and business sectors.</li>
						<li>Created a survey using relevant questions to acquire more knowledge about the requirements and characteristics of the selected organizations’ IT services, the procedures taken during disasters, the challenges faced in their data and operation recovery procedures, the amount of infrastructure affected by the flood, the amount of effort required by each mitigation or recovery procedure and the cost attributed to it.</li>
						<li> Interviewed personnel from the selected organizations and extracted the information and statistics from the recorded interview transcripts.</li>
						<li> Analyzed and Assessed the requirements in term of time frame and scale of data movement needed during and after the disaster based on different classes of services.</li>
					</ol>
					<h3>#Summary of the outcome</h3>
					<p>The results obtained from interviewing organizations’ personnel there are three organizations were chosen as representative organizations in educational, research and business sectors. We believe that collected information provides sufficient insight and knowledge about the nature of affected organizations in general and about the countermeasures they took in order to recover their services and infrastructures during the disaster. </p>
					
					<hr>
					
				
					<h2 id="section-2">Flood impact & Feasibility Study</h2>
					<p>We assessed the requirements in terms of time frame and resources needed for migrating different classes of services.</p>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
				
									<th>Duration</th>
									<th>Maxflood level</th>
									<th>% of damagedIT infrastructures</th>
									<th>% of disruptedIT services</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								
									<td>45 – 60 days</td>
									<td>2 - 2.5 m</td>
									<td>25 - 50% (networking infrastructure, IT equipments, etc.)</td>
									<td>75 - 100% (with 2-3 days downtime on operating services)</td>
								</tr>
							</tbody>
						</table>
					</div>
					
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Electrical
									power outage</th>
									<th>Network connectivity</th>
									<th>Existing solutions</th>
									
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Yes (within 6 hrs after the evacuation announcement)</td>
									<td>Yes (within 6 hrs after the evacuation announcement)</td>
									<td>Physical server relocation</td>
								</tr>
							</tbody>
						</table>
					</div>
					<hr>
					<h2 id="section-3">The feasibility study of leveraging VM migration as a mitigating mechanism for service continuation and disaster recovery.</h2>
          <h3>#Objective</h3>
					<p>To study the feasibility of affected organizations and Thailand IDCs in leveraging VM live migration and backup/checkpointing as disaster recovery techniques.</p>
					<h3>#Methodology</h3>
          <ol>
            <li>Interviewed the selected flood-affected organizations about their ongoing or future plans in handling similar or different types of disasters.</li>
            <li>Studied about the locations and offered services of Thailand ISPs’ IDCs.</li>
            <li>Studied about the locations and potentials being a disaster recovery site of other types of IDCs.</li>
            <li>Analyzed and Assessed the feaibility in term of resources, facilities and required costs needed to leverage the ISPs’ IDCs and other IDCs.</li>
          </ol>
          <h3>#Summary of the outcome</h3>
          <p>From our study, there are distributed data center sites in unaffected areas with plausible network connections to the affected sites (as shown in Figure 1). After the incident, some countermeasures were sought and/or implemented to reduce risks from similar loss (e.g., installation of UPS equipments, redesign building to be flood-resilient) and to improve IT infrastructures (e.g., installation of gigabit optical fiber links, interest and initiation in using virtualized servers for hosting IT services). All of the above changes and existing infrastructures show the possibility of leveraging IDCs as disaster recovery site.</p>
			
			<div class='pull-middle'><img src="images/IDC.jpg" class="img-responsive center-block" alt="Image">
				<p class="text-center">
					Figure 1. Severely affected areas in The Thailand’s 2011 flood are shown in red color. The blue pins represent Internet Data Center (IDC) locations. The black pins display possible data centers owned by universities.
				</p>
				
			</div>	 
			
         
					<hr>
					<h2 id="section-4">Literature review on VM migration in WAN environments.</h2>
					<h3>#Objective</h3>
					<p>To study existing approaches used in VM migration and backup/checkpointing in WAN environments.</p>
					<h3>#Methodology</h3>
         <p>Studied from related publication the approaches used to address issues of VM migration in WAN environments, their advantages and disadvantages.</p>
          <h3>#Summary of the outcome</h3>
          <p>VM live migration has to handle three main issues: network reconfiguration, storage migration and memory relocation. In WAN environments, these issues become even more challenging due to the nature of WANs with unpredictable traffic load and possibly long communication latency. In addition, the assumption of having a shared storage system among the source and destination sites is no longer valid when considering application performance in the WAN case.</p>
				</div>
			</div>
		</div>
		
		<footer class="row">
			@include('includes.footer')
		</footer>
		@include('includes.includejs')
		@yield('js')
	</body>
</html>