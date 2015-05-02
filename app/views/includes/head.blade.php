 <title>VmigSim</title>

{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/jasny-bootstrap.css') }}
{{ HTML::style('css/vmig.css') }}
{{ HTML::style('css/plugins/metisMenu/metisMenu.min.css') }}

{{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css') }}


 <!-- Custom CSS -->
    

    <!-- Morris Charts CSS -->
   
     {{ HTML::style('css/plugins/morris.css') }}
    <!-- Custom Fonts -->
    
    {{ HTML::style('css/font-awesome-4.3.0/css/font-awesome.min.css') }}
	{{ HTML::style('css/jquery.bootstrap-touchspin.css') }}
    
    <!-- MetisMenu CSS -->
      {{ HTML::style('css/plugins/metisMenu/metisMenu.min.css') }}
    

    <!-- Timeline CSS -->
 
    {{ HTML::style('css/plugins/timeline.css') }}
    <!-- Custom CSS -->

    {{ HTML::style('css/sb-admin-2.css') }}
    <!-- Morris Charts CSS -->
   
    {{ HTML::style('css/plugins/morris.css') }}

<!-- specific footer section on bottom. -->
<style type="text/css">
        html {
          position: relative;
          min-height: 100%;
        }
        body {
          /* Margin bottom by footer height */
          margin-bottom: 60px;
        }
        footer {
          position: absolute;
          bottom: 0;
          width: 85%;
          /* Set the fixed height of the footer here */
          /*height: 30px;*/
          /*background-color: #f5f5f5;*/
        }
        /** The Magic **/
.btn-breadcrumb .btn:not(:last-child):after {
  content: " ";
  display: block;
  width: 0;
  height: 0;
  border-top: 17px solid transparent;
  border-bottom: 17px solid transparent;
  border-left: 10px solid white;
  position: absolute;
  top: 50%;
  margin-top: -17px;
  left: 100%;
  z-index: 3;
}
.btn-breadcrumb .btn:not(:last-child):before {
  content: " ";
  display: block;
  width: 0;
  height: 0;
  border-top: 17px solid transparent;
  border-bottom: 17px solid transparent;
  border-left: 10px solid rgb(173, 173, 173);
  position: absolute;
  top: 50%;
  margin-top: -17px;
  margin-left: 1px;
  left: 100%;
  z-index: 3;
}

/** The Spacing **/
.btn-breadcrumb .btn {
  padding:6px 12px 6px 24px;
}
.btn-breadcrumb .btn:first-child {
  padding:6px 6px 6px 10px;
}
.btn-breadcrumb .btn:last-child {
  padding:6px 18px 6px 24px;
}

/** Default button **/
.btn-breadcrumb .btn.btn-default:not(:last-child):after {
  border-left: 10px solid #fff;
}
.btn-breadcrumb .btn.btn-default:not(:last-child):before {
  border-left: 10px solid #ccc;
}
.btn-breadcrumb .btn.btn-default:hover:not(:last-child):after {
  border-left: 10px solid #ebebeb;
}
.btn-breadcrumb .btn.btn-default:hover:not(:last-child):before {
  border-left: 10px solid #adadad;
}

/** Primary button **/
.btn-breadcrumb .btn.btn-primary:not(:last-child):after {
  border-left: 10px solid #428bca;
}
.btn-breadcrumb .btn.btn-primary:not(:last-child):before {
  border-left: 10px solid #357ebd;
}
.btn-breadcrumb .btn.btn-primary:hover:not(:last-child):after {
  border-left: 10px solid #3276b1;
}
.btn-breadcrumb .btn.btn-primary:hover:not(:last-child):before {
  border-left: 10px solid #285e8e;
}

/** Success button **/
.btn-breadcrumb .btn.btn-success:not(:last-child):after {
  border-left: 10px solid #5cb85c;
}
.btn-breadcrumb .btn.btn-success:not(:last-child):before {
  border-left: 10px solid #4cae4c;
}
.btn-breadcrumb .btn.btn-success:hover:not(:last-child):after {
  border-left: 10px solid #47a447;
}
.btn-breadcrumb .btn.btn-success:hover:not(:last-child):before {
  border-left: 10px solid #398439;
}

/** Danger button **/
.btn-breadcrumb .btn.btn-danger:not(:last-child):after {
  border-left: 10px solid #d9534f;
}
.btn-breadcrumb .btn.btn-danger:not(:last-child):before {
  border-left: 10px solid #d43f3a;
}
.btn-breadcrumb .btn.btn-danger:hover:not(:last-child):after {
  border-left: 10px solid #d2322d;
}
.btn-breadcrumb .btn.btn-danger:hover:not(:last-child):before {
  border-left: 10px solid #ac2925;
}

/** Warning button **/
.btn-breadcrumb .btn.btn-warning:not(:last-child):after {
  border-left: 10px solid #f0ad4e;
}
.btn-breadcrumb .btn.btn-warning:not(:last-child):before {
  border-left: 10px solid #eea236;
}
.btn-breadcrumb .btn.btn-warning:hover:not(:last-child):after {
  border-left: 10px solid #ed9c28;
}
.btn-breadcrumb .btn.btn-warning:hover:not(:last-child):before {
  border-left: 10px solid #d58512;
}

/** Info button **/
.btn-breadcrumb .btn.btn-info:not(:last-child):after {
  border-left: 10px solid #5bc0de;
}
.btn-breadcrumb .btn.btn-info:not(:last-child):before {
  border-left: 10px solid #46b8da;
}
.btn-breadcrumb .btn.btn-info:hover:not(:last-child):after {
  border-left: 10px solid #39b3d7;
}
.btn-breadcrumb .btn.btn-info:hover:not(:last-child):before {
  border-left: 10px solid #269abc;
}
    </style>
  