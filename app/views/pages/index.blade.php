@extends('layouts.default')

@section('content')


	<div class="jumbotron">
        <h1>Welcome to VmigSim!</h1>
        <p class="lead">There is a simple way for simulation of virtual machine migration on network Let's get started.</p>
        <p><a class="btn btn-lg btn-success" href="{{URL::to('getting_start')}}" role="button">Tutorial</a></p>
     </div>
     <div class="panel panel-default">
  		 <div class="panel-body">
      		<img src="images/animate_src_dest.gif" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" />
  	 	</div>
  	 	<p class ="text-center">Virtual machines migration simulation on network</p>
  	 	<p class="text-center"><a class="btn btn-lg btn-success" href="{{URL::to('simulation/quicksim')}}" role="button">Start simulation</a></p>
	</div>
    <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    VmigSim
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>Problem</h4>
                    </div>
                    <div class="panel-body">
                        <p>The migration of virtual machines for the purpose of relieving of data loss, or decreasing the downtime of applications is very important nowadays with various services running on virtual machines. However, migrating virtual machines in time-limited circumstances such as disasters like flood, with a good performance of results, is needed to determine many environment variable especially the condition of the network connecting the source and destination datacenters. Moreover, the network connecting the datacenters is often the WAN that is unstable that is the cause of unpredictable migration time. Those conditions make it difficult to study the proper inter-datacenter virtual-machine migration method with time limitation and WAN environment. Therefore, we are interested in designing and developing the simulation, because the simulation can easily control the environment variables used in studying.</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Free &amp; Open Source</h4>
                    </div>
                    <div class="panel-body">
                        <p>We design and develop the simulation named “VmigSim” by using simulation framework called CloudSim, which is widely accepted in creating the cloud simulation. VmigSim is consists of two datacenters, which are source and destination, with virtual machines contained within the source. Besides, we simulate the WAN to connect two datacenters and allow the user to define parameters for the migration, for example, the bandwidth of the network, time limitation, amount and priority of services running in virtual machines, by using the user interface.</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> Easy to Use</h4>
                    </div>
                    <div class="panel-body">
                        <p>VmigSim easy to use because we have study of factor that effect about simulation of migration such as various methods of migration by using the example environment data from Thammasat University. We compare the performance of two migration mechanisms, (1) Offline Migration and (2) Pre-copy Migration along with two migration policies, (1) Non-priority based and (2) Priority based. </p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

  
@section('js')
<script type="text/javascript">
  $(function() {

    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    
    });
</script>
@stop



@stop