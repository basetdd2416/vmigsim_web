@extends('layouts.default')
@section('content')
<style type="text/css">
p {
    text-indent: 50px;
}
</style>
   

     <ul id="myTab" class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">TH</a></li>
  <li class=""><a href="#profile" data-toggle="tab">ENG</a></li>
</ul>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div id="loading" style="display:none" >
      <p class="text-center"><img height="200" width="200" src="{{URL::to('images/loading.gif')}}" /><br> Please Wait...... </p>
    </div>
  </div>
</div> 
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="home">
    <div class="panel-heading jumbotron">
           <h1 class="panel-title"><i class="fa fa-pencil-square-o"></i> ข้อตกลงในการใช้ซอฟต์แวร์</h1>
         </div>
    <p>ซอฟต์แวร์นี้เป็นผลงานที่พัฒนาขึ้นโดย <a> นายอภิสิทธิ์ อ่อนเอกสิทธิ์ </a> และ<a>นายทวีศิลป์ วงศ์รัชตโภคัย </a> จากมหาวิทยาลัยธรรมศาสตร์ ภายใต้การดูแลของ <a> อ.ดร. ประภาพร รัตนธำรง </a> ภายใต้โครงการ <a>"การจำลองเพื่อศึกษาการควบคุมการถ่ายโอนเครื่องเสมือนที่มีระยะเวลาจำกัดบนเครือข่ายแบบ WAN" </a> ซึ่งสนับสนุนโดย <a> ศูนย์เทคโนโลยีอิเล็กทรอนิกส์และคอมพิวเตอร์แห่งชาติ </a>โดยมีวัตถุประสงค์เพื่อส่งเสริมให้นักเรียนและนักศึกษาได้เรียนรู้และฝึกทักษะในการพัฒนาซอฟต์แวร์ ลิขสิทธิ์ของซอฟต์แวร์นี้จึงเป็นของผู้พัฒนา ซึ่งผู้พัฒนาได้อนุญาตให้<a> ศูนย์เทคโนโลยีอิเล็กทรอนิกส์และคอมพิวเตอร์แห่งชาติ </a> เผยแพร่ซอฟต์แวร์นี้ตาม “ต้นฉบับ” โดยไม่มีการแก้ไขดัดแปลงใดๆ ทั้งสิ้น ให้แก่บุคคลทั่วไปได้ใช้เพื่อประโยชน์ส่วนบุคคลหรือประโยชน์ทางการศึกษาที่ไม่มีวัตถุประสงค์ในเชิงพาณิชย์ โดยไม่คิดค่าตอบแทนการใช้ซอฟต์แวร์ ดังนั้น <a>ศูนย์เทคโนโลยีอิเล็กทรอนิกส์และคอมพิวเตอร์แห่งชาติ </a> จึงไม่มีหน้าที่ในการดูแล บำรุงรักษา จัดการอบรมการใช้งาน หรือพัฒนาประสิทธิภาพซอฟต์แวร์ รวมทั้งไม่รับรองความถูกต้องหรือประสิทธิภาพการทำงานของซอฟต์แวร์ ตลอดจนไม่รับประกันความเสียหายต่างๆ อันเกิดจากการใช้ซอฟต์แวร์นี้ทั้งสิ้น</p>
  </div>
  <div class="tab-pane fade" id="profile">
    <div class="panel-heading jumbotron">
           <h1 class="panel-title"><i class="fa fa-pencil-square-o"></i> License Agreement</h1>
         </div>
<p>    This software is a work developed by <a href="#"> Mr.Apisit Onakekasit  </a> and <a href="#"> Mr.Taweesil Wonratchatapokai </a> from <a href="#"> Thammasat university </a> under the provision
of <a> Dr. Prapaporn Rattanatamrong under </a>(Project’s name)… , which has been supported by the <a> National Electronics and
Computer Technology Center (NECTEC) </a>, in order to encourage pupils and students to learn and practice their
skills in developing software. Therefore, the intellectual property of this software shall belong to the
developer and the developer gives <a> NECTEC </a> a permission to distribute this software as an “as is ” and nonmodified
software for a temporary and nonexclusive
use without remuneration to anyone for his or her own
purpose or academic purpose, which are not commercial purposes. In this connection, <a> NECTEC </a> shall not be
responsible to the user for taking care, maintaining, training or developing the efficiency of this
software. Moreover, <a> NECTEC </a> shall not be liable for any error, software efficiency and damages in
connection with or arising out of the use of the software.”</p>
  </div>
</div>

@section('js')
  {{ HTML::script('js/about.js') }}
@stop
@stop