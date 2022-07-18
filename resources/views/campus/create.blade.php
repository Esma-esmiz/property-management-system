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
@if(session()->has('campus_added'))
  <div class="alert alert-success alert-dismissible fade show text-center"  id="success-alert" role="alert">
    {{session()->get('campus_added')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

  </div>
  @endif
<div class="card card-info mx-auto" style="width: 700px; ">
  <div class="card-header">
    <h3 class="card-title">Add campus</h3>
  </div>
 
  <form method="POST" action="{{route('campus.store')}}">
    @csrf
    <div class="card-body">
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
        <label class="control-label" class="control-label">Country</label>
        <select name="country" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" required>
          <option data-select2-id="42" selected="selected">Ethiopia</option>
          <option data-select2-id="43">Eritrea</option>
          <option data-select2-id="44">Kenya</option>
          <option data-select2-id="45">Rwanda</option>
          <option data-select2-id="46">Somalia</option>
          <option data-select2-id="47">Sudan</option>
          <option data-select2-id="48">South Sudan</option>
          <option data-select2-id="49">Comoros</option>
          <option data-select2-id="50">Burundi</option>
          <option data-select2-id="51">Tanzania</option>
        </select>
      </div>

      <div class="form-group required">
        <label class="control-label">Region</label>
        <select name="region" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" required>
          <option data-select2-id="22">Addis Abeba</option>
          <option data-select2-id="23">Dire Dawa</option>
          <option data-select2-id="22">Amhara</option>
          <option data-select2-id="25">Oromia </option>
          <option data-select2-id="26">Somali </option>
          <option data-select2-id="27">Afar</option>
          <option data-select2-id="28">South Nation</option>
          <option data-select2-id="39">Harari </option>
          <option data-select2-id="30">Tigray</option>
          <option data-select2-id="30">Gambela </option>
          <option data-select2-id="30">Sidama </option>
          <option data-select2-id="30">Benishangul-Gumuz </option>
          <option data-select2-id="31">Southern Nations, Nationalities Peoples </option>
        </select>
      </div>

      <div class="form-group required">
        <label class="control-label" for="name"> City</label>
        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="Enter City" required>
        @error('city')
        <span class="invalid-feedback" role="alert">
          <strong>{{$message}}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group">
        <label class="control-label" for="name">Mobile Phone</label>
        <input type="phone" name="phone_mobile" class="form-control  @error('phone_mobile') is-invalid @enderror" id="phone_mobile" placeholder="Enter Mobile Phone" required>
        @error('phone_mobile')
        <span class="invalid-feedback" role="alert">
          <strong>{{$message}}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group">
        <label class="control-label" for="name">Office Phone</label>
        <input type="phone" name="phone_office" class="form-control  @error('phone_office') is-invalid @enderror" id="office_phone" placeholder="Enter Office Phone" required>
        @error('phone_office')
        <span class="invalid-feedback" role="alert">
          <strong>{{$message}}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group">
        <label class="control-label" for="name">Email</label>
        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" required>
        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{$message}}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group required">
        <label class="control-label" for="name"> Street Address </label>
        <input type="text" name="street_address" class="form-control  @error('street_address') is-invalid @enderror" id="street_address" placeholder="Enter Address" required>
        @error('street_address')
        <span class="invalid-feedback" role="alert">
          <strong>{{$message}}</strong>
        </span>
        @enderror
      </div>


      <div class="form-group required">
        <label class="control-label" class="control-label">Open Year</label>
        <div class="input-group date" id="reservationdate" data-target-input="nearest">
          <input type="text" class="form-control datetimepicker-input @error('open_year') is-invalid @enderror" name="open_year" value="{{ old('open_year') }}" data-target="#reservationdate">
          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
          </div>
          @error('open_year')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

    </div>


    <div class="form-group">
      <!-- Button trigger modal -->
      <a href="#" data-toggle="modal" data-target="#map-modal"> Location<i class="fa fa-map-marker" aria-hidden="true">

        </i></a>
      <input type="text" name="location" class="form-control  @error('location') is-invalid @enderror" hidden id="map_address">
      <p id="location_status" style="display: none;">loc status</p>
      @error('location')
      <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
      </span>
      @enderror
    </div>
    <!-- Modal -->
    <div class="modal fade" id="map-modal" tabindex="-1" role="dialog" aria-labelledby="map-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="map"> </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="map_close">Close</button>
            <button type="button" class="btn btn-primary" id="map_save">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-info">Submit</button>
    </div>
  </form>


  <script src=" {{ asset('vendors/plugins/jquery/jquery.min.js' ) }} "></script>

  <script src=" {{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js' ) }} "></script>

  <script src=" {{ asset('vendors/plugins/select2/js/select2.full.min.js' ) }} "></script>

  <script src=" {{ asset('vendors/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js' ) }} "></script>

  <script src=" {{ asset('vendors/plugins/moment/moment.min.js' ) }} "></script>
  <script src=" {{ asset('vendors/plugins/inputmask/jquery.inputmask.min.js' ) }} "></script>

  <script src=" {{ asset('vendors/plugins/daterangepicker/daterangepicker.js' ) }} "></script>

  <script src=" {{ asset('vendors/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js' ) }} "></script>

  <script src=" {{ asset('vendors/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js' ) }} "></script>

  <script src=" {{ asset('vendors/plugins/bootstrap-switch/js/bootstrap-switch.min.js' ) }} "></script>

  <script src=" {{ asset('vendors/plugins/bs-stepper/js/bs-stepper.min.js' ) }} "></script>

  <script src=" {{ asset('vendors/plugins/dropzone/min/dropzone.min.js' ) }} "></script>
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