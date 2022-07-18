<head>

  <link rel="stylesheet" href="{{ asset('vendors/plugins/daterangepicker/daterangepicker.css') }}">

  <link rel="stylesheet" href="{{ asset('vendors/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('vendors/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">

  <link rel="stylesheet" href="{{ asset('vendors/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('vendors/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('vendors/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">

  <link rel="stylesheet" href="{{ asset('vendors/plugins/bs-stepper/css/bs-stepper.min.css') }}">

  <link rel="stylesheet" href="{{ asset('vendors/plugins/dropzone/min/dropzone.min.css') }}">
</head>
@extends('home')
@section('content')
<style>
  #map {
    height: 400px;
    width: 100%;
  }

  .form-group.required .control-label::after {
    content: "*";
    color: red;
  }

  :not(.required) .control-label::after {
    content: " (optional)";
    font-style: italic;
    font-size: small;
  }
</style>

@if(session()->has('position_added'))
<div class="alert alert-success alert-dismissible fade show text-center" id="success-alert" role="alert" style="width: 500px;">
  {{session()->get('position_added')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif
<div class="card card-info mx-auto" style="width: 700px; ">
  <div class="card-header">
    <h3 class="card-title">Add Position</h3>
  </div>
  <div class="card-body">
    <form method="POST" action="{{route('position.store')}}">
      @csrf


      <div class="form-group clearfix required">
        <label for="departments" class="control-label">Belonging Departments</label>
        @foreach($departments as $dep)
        <div class="icheck-primary" style="padding-left: 20px;">
          <input type="checkbox" name="departments[]" id="{{$dep->name}}" value="{{$dep->id}}">
          <label for="{{$dep->name}}">{{$dep->name}}
          </label>
        </div>
        @endforeach
        @error('departments')
        <span class="invalid-feedback" role="alert">
          <strong>{{$message}}</strong>
        </span>
        @enderror
      </div>


      <div class="form-group required">
        <label class="control-label" class="control-label" for="name"> Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter campus Name" required>
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{$message}}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group required">
        <label class="control-label">Position Level</label>
        <select name="position_level" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" required>
          <option data-select2-id="45" value=4>4</option>
          <option data-select2-id="46" value=5>5</option>
          <option data-select2-id="47" value=6>6</option>
          <option data-select2-id="48" value=7>7</option>
          <option data-select2-id="49" value=8>8</option>
          <option data-select2-id="50" value=9>9</option>
          <option data-select2-id="51" value=10>10</option>
          <option data-select2-id="44" value=3>3--Vise-President</option>
          <option data-select2-id="43" value=2>2--President</option>
          <option data-select2-id="42" value=1>1--CEO</option>
        </select>
        @error('position_level')
        <span class="invalid-feedback" role="alert">
          <strong>{{$message}}</strong>
        </span>
        @enderror
      </div>



      <div class="card-footer">
        <button type="submit" class="btn btn-info">Add</button>
      </div>
    </form>
  </div>

  <script src="{{ asset('vendors/plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('vendors/plugins/select2/js/select2.full.min.js') }}"></script>

  <script src="{{ asset('vendors/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>

  <script src="{{ asset('vendors/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('vendors/plugins/inputmask/jquery.inputmask.min.js') }}"></script>

  <script src="{{ asset('vendors/plugins/daterangepicker/daterangepicker.js') }}"></script>

  <script src="{{ asset('vendors/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>

  <script src="{{ asset('vendors/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

  <script src="{{ asset('vendors/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

  <script src="{{ asset('vendors/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>

  <script src="{{ asset('vendors/plugins/dropzone/min/dropzone.min.js') }}"></script>
  <script src="{{ asset('vendors/dist/js/adminlte.min.js') }}"></script>

  <script>
    $(function() {
      $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
        $("#success-alert").slideUp(500);
      });
      var campus = document.getElementById("campus");
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      });
      $('#birthday').datetimepicker({
        format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({
        icons: {
          time: 'far fa-clock'
        }
      });

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'DD/MM/YYYY'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      })

      $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function() {
        myDropzone.enqueueFile(file)
      }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
      myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
  </script>
  @endsection