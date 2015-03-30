@extends('layouts.sidebar')
@section('content')
	 <div class="row featurette">
          <h2 id="s1" class="featurette-heading">Step 1 create configuration</h2>
          <h3 class="featurette-heading">#Quick simulation</h3>
          
             <p>1.1) choose <a> Quick simualtion </a> on the leff side bar.</p>
          
         
          <img src="images/screen-short/1.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" />
         
          <h3 class="featurette-heading">#Type of create configuration</h3>
          <p>1.2) There are three type of create configuration, you can use it for creating is fast and easy configuration file.</p>

          <ul>
            <li>Create from scratches</li>
            <li>Create from existing</li>
            <li>Crete from template.json file</li>
          </ul>
             <img src="images/screen-short/2.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" />

          <h3 class="featurette-heading">#Define configuration</h3>
          <p>1.3) There are five part that you have to define.</p>
          <ul>
            <li><a>Create configuration:</a> define name of configuration.</li>
              <img src="images/screen-short/3.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" />
            <li><a>Create vm:</a> define vm is service of your application.</li>
            <img src="images/screen-short/4.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" />
            <li><a>Create migration environment:</a> define your environment for migrating such as network bandwidth that you can tranfer per second and Time limitation of migration in second, you have to estimation event time of real situation .</li>
             <img src="images/screen-short/5.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" />
            <li><a>Create application settings:</a> define behavior of your application such as wws = Writable Working Set. It is the set of global frequently modified pages of the iteration phase.</li>
              <img src="images/screen-short/6.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" />
            <li><a>Create policy settings:</a> define mechanism of your application such as</li>
              <ul>
                <li>Migration algorithm</li>
                <li>Scheduling algorithm</li>
                <li>Control alogorithm</li>
              </ul>
             <img src="images/screen-short/7.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" />
          </ul>
          <h3 class="featurette-heading">#Save configuration and reset function</h3>
          <p>1.5) if you have to reset all settings you can use <a>reset all default</a> function. it will clear all input and define as a default value by automatic.</p>
          <p>1.6) if you have define already finished you have to use <a>save</a> function for save your configuration.</p>
            <img src="images/screen-short/8.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" />
      </div>
      <hr class="featurette-divider">

      <div class="row featurette">
          <h2 id="s2" class="featurette-heading">Step 2 create simulation</h2>
          <p>The simulation there is configuaration that you have already finished setting.</p>
          <p>2.1) Choose <a>Run simulation</a> on the lef side bar.</p>
          <p>2.2) Choose <a>Simulation settings</a> on the tab panel.</p>
          <p>2.3) Define simulation name.</p>
          <p>2.4) Select configuration in dropdown that you have already finished settings.It will retrive value that you define.</p>

          <img src="images/screen-short/10.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" />
      </div>
      <hr class="featurette-divider">

      <div class="row featurette">
          <h2 id="s3" class="featurette-heading">Step 3 run simulation</h2>
          <p>3.1) Click <a>Run</a>. After run simulation, it will show <a>History of simulation running</a> and the status of simulation is <a>running</a>.</p>
          <img src="images/screen-short/11.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" /><br>
          <p>3.2) You can see the <a>deatils</a> of simulation that you just defined.</p>
          <img src="images/screen-short/11.1.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" /><br>
          <img src="images/screen-short/12.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" /> <br>           
          <p>3.2) After run simulation you must wait until status of simulation <a>success</a>.</p>
          <img src="images/screen-short/13.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" />
      </div>
      <hr class="featurette-divider">

      <div class="row featurette">
          <h2 id="s4" class="featurette-heading">Step 4 view result</h2>
           <p>4.1) Choose <a><i class="fa fa-bar-chart"></i></a> on the list of simulation running</p>
           <p>4.2) Choose type of result by default is <a>log file</a></p>
            <img src="images/screen-short/14.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" /><br>
             <img src="images/screen-short/15.png" style="margin: 0 auto;"  alt="bla bla" class="img-responsive" />
      </div>

      <hr class="featurette-divider">

@section('js')
<script type="text/javascript">

  $(function() {
   
       $('#sidebar-nav').on('click',function(){
          
       });
  });
</script>
@stop
@stop