@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Crear práctica agricola')

@section('header')
    <section class="content-header">
        <h1>
            Calendario de las Practicas Agricolas
            <small>Revisa el timeline segun la epoca de siembra</small>
        </h1>

    </section>
@endsection

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('practicas.create') !!}</li>
    </ul>
@endsection
@section('content')


<div class="row">
    <div class="jumbotron col-md-8"><h1>Labores Agrícolas de la semana</h1>

        <article>
            <h2>{{$practicas->nombre_practica}}</h2>
            <div class="row">
                <div class="col-md-8">
                    <i class="fa fa-folder-open" aria-hidden="true"></i>{{$practicas->tecnologia->nombre_tecnologia}}
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>{{$practicas->user->name}}
                </div>
                <div class="col-md-4">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i> {{$practicas->created_at}}
                </div>
            </div>
            <br>
            @if(empty($practicas->path))
                <img src="{{asset('img/no-imagen.jpg')}}" class="img-responsive" width="100%">
            @else
                <img src="{{asset('img/')}}/{{$practicas->path}}" class="img-responsive" width="100%">
            @endif
            <br>
            <p>{!! substr($practicas->contenido,0,10000) !!} </p>

        </article>

    </div>

   

</div>

 <!-- Main content -->
        <div class="content body">

<section id="introduction">
  <h2 class="page-header"><a href="#introduction">{{$practicas->nombre_practica}}</a></h2>
  <p class="lead">
    <b>AdminLTE</b> is a popular open source WebApp template for admin dashboards and control panels.
    It is a responsive HTML template that is based on the CSS framework Bootstrap 3.
    It utilizes all of the Bootstrap components in its design and re-styles many
    commonly used plugins to create a consistent design that can be used as a user
    interface for backend applications. AdminLTE is based on a modular design, which
    allows it to be easily customized and built upon. This documentation will guide you through
    installing the template and exploring the various components that are bundled with the template.
  </p>
</section><!-- /#introduction -->


<!-- ============================================================= -->

<section id="download">
  <h2 class="page-header"><a href="#download">Download</a></h2>
  <p class="lead">
    AdminLTE can be downloaded in two different versions, each appealing to different skill levels and use case.
  </p>
  <div class="row">
    <div class="col-sm-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Ready</h3>
          <span class="label label-primary pull-right"><i class="fa fa-html5"></i></span>
        </div><!-- /.box-header -->
        <div class="box-body">
          <p>Compiled and ready to use in production. Download this version if you don't want to customize AdminLTE's LESS files.</p>
          <a href="http://almsaeedstudio.com/download/AdminLTE-dist" class="btn btn-primary"><i class="fa fa-download"></i> Download</a>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-sm-6">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Source Code</h3>
          <span class="label label-danger pull-right"><i class="fa fa-database"></i></span>
        </div><!-- /.box-header -->
        <div class="box-body">
          <p>All files including the compiled CSS. Download this version if you plan on customizing the template. <b>Requires a LESS compiler.</b></p>
          <a href="http://almsaeedstudio.com/download/AdminLTE" class="btn btn-danger"><i class="fa fa-download"></i> Download</a>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
  <pre class="hierarchy bring-up"><code class="language-bash" data-lang="bash">File Hierarchy of the Source Code Package

AdminLTE/
├── dist/
│   ├── CSS/
│   ├── JS
│   ├── img
├── build/
│   ├── less/
│   │   ├── AdminLTE's Less files
│   └── Bootstrap-less/ (Only for reference. No modifications have been made)
│       ├── mixins/
│       ├── variables.less
│       ├── mixins.less
└── plugins/
    ├── All the customized plugins CSS and JS files</code></pre>
</section>


<!-- ============================================================= -->

<section id="dependencies">
  <h2 class="page-header"><a href="#dependencies">Dependencies</a></h2>
  <p class="lead">AdminLTE depends on two main frameworks.
    The downloadable package contains both of these libraries, so you don't have to manually download them.</p>
  <ul class="bring-up">
    <li><a href="http://getbootstrap.com" target="_blank">Bootstrap 3</a></li>
    <li><a href="http://jquery.com/" target="_blank">jQuery 1.11+</a></li>
    <li><a href="#plugins">All other plugins are listed below</a></li>
  </ul>
</section>


<!-- ============================================================= -->

<section id="advice">
  <h2 class="page-header"><a href="#advice">A Word of Advice</a></h2>
  <p class="lead">
    Before you go to see your new awesome theme, here are few tips on how to familiarize yourself with it:
  </p>

  <ul>
    <li><b>AdminLTE is based on <a href="http://getbootstrap.com/" target="_blank">Bootstrap 3</a>.</b> If you are unfamiliar with Bootstrap, visit their website and read through the documentation. All of Bootstrap components have been modified to fit the style of AdminLTE and provide a consistent look throughout the template. This way, we guarantee you will get the best of AdminLTE.</li>
    <li><b>Go through the pages that are bundled with the theme.</b> Most of the template example pages contain quick tips on how to create or use a component which can be really helpful when you need to create something on the fly.</li>
    <li><b>Documentation.</b> We are trying our best to make your experience with AdminLTE be smooth. One way to achieve that is to provide documentation and support. If you think that something is missing from the documentation, please do not hesitate to create an issue to tell us about it.</li>
    <li><b>Built with <a href="http://lesscss.org/" target="_blank">LESS</a>.</b> This theme uses the LESS compiler to make it easier to customize and use. LESS is easy to learn if you know CSS or SASS. It is not necessary to learn LESS but it will benefit you a lot in the future.</li>
    <li><b>Hosted on <a href="https://github.com/almasaeed2010/AdminLTE/" target="_blank">GitHub</a>.</b> Visit our GitHub repository to view issues, make requests, or contribute to the project.</li>
  </ul>
  <p>
    <b>Note:</b> LESS files are better commented than the compiled CSS file.
  </p>
</section>


<!-- ============================================================= -->

<section id="layout">
  <h2 class="page-header"><a href="#layout">Layout</a></h2>
  <p class="lead">The layout consists of four major parts:</p>
  <ul>
    <li>Wrapper <code>.wrapper</code>. A div that wraps the whole site.</li>
    <li>Main Header <code>.main-header</code>. Contains the logo and navbar.</li>
    <li>Sidebar <code>.sidebar-wrapper</code>. Contains the user panel and sidebar menu.</li>
    <li>Content <code>.content-wrapper</code>. Contains the page header and content.</li>
  </ul>
  <div class="callout callout-danger lead">
    <h4>Tip!</h4>
    <p>The <a href="../starter.html">starter page</a> is a good place to start building your app if you'd like to start from scratch.</p>
  </div>

  <h3>Layout Options</h3>
  <p class="lead">AdminLTE 2.0 provides a set of options to apply to your main layout. Each one of these classes can be added
    to the body tag to get the desired goal.</p>
  <ul>
    <li><b>Fixed:</b> use the class <code>.fixed</code> to get a fixed header and sidebar.</li>
    <li><b>Collapsed Sidebar:</b> use the class <code>.sidebar-collapse</code> to have a collapsed sidebar upon loading.</li>
    <li><b>Boxed Layout:</b> use the class <code>.layout-boxed</code> to get a boxed layout that stretches only to 1250px.</li>
    <li><b>Top Navigation</b> use the class <code>.layout-top-nav</code> to remove the sidebar and have your links at the top navbar.</li>
  </ul>
  <p><b>Note:</b> you cannot use both layout-boxed and fixed at the same time. Anything else can be mixed together.</p>

  <h3>Skins</h3>
  <p class="lead">Skins can be found in the dist/css/skins folder.
    Choose and the skin file that you want then add the appropriate
    class to the body tag to change the template's appearance. Here is the list of available skins:</p>
  <div class="box box-solid" style="max-width: 300px;">
    <div class="box-body no-padding">
      <table id="layout-skins-list" class="table table-striped bring-up nth-2-center">
        <thead>
          <tr>
            <th style="width: 210px;">Skin Class</th>
            <th>Preview</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>skin-blue</code></td>
            <td><a href="#" data-skin="skin-blue" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>skin-blue-light</code></td>
            <td><a href="#" data-skin="skin-blue-light" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>skin-yellow</code></td>
            <td><a href="#" data-skin="skin-yellow" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>skin-yellow-light</code></td>
            <td><a href="#" data-skin="skin-yellow-light" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>skin-green</code></td>
            <td><a href="#" data-skin="skin-green" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>skin-green-light</code></td>
            <td><a href="#" data-skin="skin-green-light" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>skin-purple</code></td>
            <td><a href="#" data-skin="skin-purple" class="btn bg-purple btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>skin-purple-light</code></td>
            <td><a href="#" data-skin="skin-purple-light" class="btn bg-purple btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>skin-red</code></td>
            <td><a href="#" data-skin="skin-red" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>skin-red-light</code></td>
            <td><a href="#" data-skin="skin-red-light" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>skin-black</code></td>
            <td><a href="#" data-skin="skin-black" class="btn bg-black btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>skin-black-light</code></td>
            <td><a href="#" data-skin="skin-black-light" class="btn bg-black btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
        </tbody>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</section>




        </div><!-- /.content -->
      </div><!-- /.content-wrapper -->

@endsection


@section('script')

<script>
    $(function () {
        $('#practicas-table').DataTable({
            "paging": false,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false
        });
    });
</script>

<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>


<script>
    CKEDITOR.replace('my-editor', options);
</script>

<script>
    $(".chosen-select").chosen({width: "100%"});
</script>

<script>
    //Date picker
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        lenguage: "es"
        autoclose: true,

    });

   var accept = ".png";
   
   var myDropzone = new Dropzone('.dropzone',{
        url : '/admin/practicas/',
        dictDefaultMessage: 'Arrastra las fotos aqui para subirlas',

    });
    Dropzone.autoDiscover = false;    

</script>
@endsection




