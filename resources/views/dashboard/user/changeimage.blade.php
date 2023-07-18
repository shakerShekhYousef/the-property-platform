@extends('layouts.dashboard.base')
@section('pageTitle',__('sidebar.users.image'))

@section('custom-style')
    <style>
        .select2-container .select2-selection--single {
            height: 38px !important;
        }
     
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px !important;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            float: left;
            padding-right: 0 !important;
            color: #fdfdff !important;
            transform: rotate(180deg);
            margin-right: 5px;
        }

        .select2-search--inline {
    display: contents; /*this will make the container disappear, making the child the one who sets the width of the element*/
    }

    .select2-search__field:placeholder-shown {
        width: 100% !important; /*makes the placeholder to be 100% of the width while there are no options selected*/
        margin-left: 6px !important;
    }
    .iti--allow-dropdown input, .iti {
    width: 100% !important;
    
}
.iti--allow-dropdown input{
    border: 1px solid #ced4da;
    padding-top: 5px;
    padding-bottom: 5px;
    border-radius: 5px;
}

.uploader {
	 display: block;
	 clear: both;
	 margin: 0 auto;
	 width: 100%;
	 max-width: 600px;
     text-align: center;
}
 .uploader label {
	 float: left;
	 clear: both;
	 width: 100%;
	 padding: 2rem 1.5rem;
	 text-align: center;
	 background: #fff;
	 border-radius: 7px;
	 border: 2px dashed #e7e5e5;
	 transition: all 0.2s ease;
	 user-select: none;
}
 /* .uploader label:hover {
	 border-color: #454cad;
} */
 .uploader label.hover {
	 border: 3px solid #454cad;
	 box-shadow: inset 0 0 0 6px #eee;
}
 .uploader label.hover #start i.fa {
	 transform: scale(0.8);
	 opacity: 0.3;
}
 .uploader #start {
	 float: left;
	 clear: both;
	 width: 100%;
}
 .uploader #start.hidden {
	 display: none;
}
 .uploader #start i.fa {
	 font-size: 50px;
	 margin-bottom: 1rem;
	 transition: all 0.2s ease-in-out;
}
 .uploader #response {
	 float: left;
	 clear: both;
	 width: 100%;
}
 .uploader #response.hidden {
	 display: none;
}
 .uploader #response #messages {
	 margin-bottom: 0.5rem;
}
 .uploader #file-image {
	 display: inline;
	 margin: 0 auto 0.5rem auto;
	 width: auto;
	 height: auto;
	 max-width: 180px;
}
 .uploader #file-image.hidden {
	 display: none;
}
 .uploader #notimage {
	 display: block;
	 float: left;
	 clear: both;
	 width: 100%;
}
 .uploader #notimage.hidden {
	 display: none;
}
 .uploader progress, .uploader .progress {
	 display: inline;
	 clear: both;
	 margin: 0 auto;
	 width: 100%;
	 max-width: 180px;
	 height: 8px;
	 border: 0;
	 border-radius: 4px;
	 background-color: #eee;
	 overflow: hidden;
}
 .uploader .progress[value]::-webkit-progress-bar {
	 border-radius: 4px;
	 background-color: #eee;
}
 .uploader .progress[value]::-webkit-progress-value {
	 background: linear-gradient(to right, #393f90 0%, #454cad 50%);
	 border-radius: 4px;
}
 .uploader .progress[value]::-moz-progress-bar {
	 background: linear-gradient(to right, #393f90 0%, #454cad 50%);
	 border-radius: 4px;
}
 .uploader input[type=&#34;
file&#34;
] {
	 display: none;
}
 .uploader div {
	 margin: 0 0 0.5rem 0;
	 color: #5f6982;
}
 /* .uploader .btn {
	 display: inline-block;
	 margin: 0.5rem 0.5rem 1rem 0.5rem;
	 clear: both;
	 font-family: inherit;
	 font-weight: 700;
	 font-size: 14px;
	 text-decoration: none;
	 text-transform: initial;
	 border: none;
	 border-radius: 0.2rem;
	 outline: none;
	 padding: 0 1rem;
	 height: 36px;
	 line-height: 36px;
	 color: #fff;
	 transition: all 0.2s ease-in-out;
	 box-sizing: border-box;
	 background: #454cad;
	 border-color: #454cad;
	 cursor: pointer;
} */
.uploader input[type=file] {
    display: none;
}
    </style>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="{{asset('css/intlTelInput.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div class="page-title">
                                <h4 class="mb-0 font-size-18">{{ __('sidebar.users.image') }}</h4>
                                <ol class="breadcrumb">
                                    {{ Breadcrumbs::render('image') }}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- Start Page-content-Wrapper -->
                <div class="page-content-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form id="file-upload-form" class="uploader" novalidate
                                    action="{{ route('update_imge', $users->id) }}"
                                    method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                        @method("POST")
                                        <input  id="file-upload" type="file" name="image" accept="image/*" />
                                      
                                        <label for="file-upload" id="file-drag">
                                          <img id="file-image" src="#" alt="Preview" class="hidden">
                                          <div id="start">
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                            <div>Select a file or drag here</div>
                                            <div id="notimage" class="hidden">Please select an image</div>
                                          </div>
                                          <div id="response" class="hidden">
                                            <div id="messages"></div>
                                          
                                          </div>
                                        </label>
                                        <button class="btn btn-primary" type="submit">{{__('buttons.submitt')}}</button>

                                    </form>
                                  
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- end row -->

                </div>
                <!-- End Page-content -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        © 2022
                    </div>

                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->
    @section('custom-script')
        <!-- validation init -->
        <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
        <!-- parsley plugin -->
        <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>
        <script src="{{asset('js/intlTelInput.js')}}"></script>

        {{-- <script src="js/intlTelInput.js"></script>    --}}
       
<script>
    // File Upload
// 
function ekUpload(){
  function Init() {

    console.log("Upload Initialised");

    var fileSelect    = document.getElementById('file-upload'),
        fileDrag      = document.getElementById('file-drag'),
        submitButton  = document.getElementById('submit-button');

    fileSelect.addEventListener('change', fileSelectHandler, false);

    // Is XHR2 available?
    var xhr = new XMLHttpRequest();
    if (xhr.upload) {
      // File Drop
      fileDrag.addEventListener('dragover', fileDragHover, false);
      fileDrag.addEventListener('dragleave', fileDragHover, false);
      fileDrag.addEventListener('drop', fileSelectHandler, false);
    }
  }

  function fileDragHover(e) {
    var fileDrag = document.getElementById('file-drag');

    e.stopPropagation();
    e.preventDefault();

    fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
  }

  function fileSelectHandler(e) {
    // Fetch FileList object
    var files = e.target.files || e.dataTransfer.files;

    // Cancel event and hover styling
    fileDragHover(e);

    // Process all File objects
    for (var i = 0, f; f = files[i]; i++) {
      parseFile(f);
      uploadFile(f);
    }
  }

  // Output
  function output(msg) {
    // Response
    var m = document.getElementById('messages');
    m.innerHTML = msg;
  }

  function parseFile(file) {

    console.log(file.name);
    output(
      '<strong>' + encodeURI(file.name) + '</strong>'
    );
    
    // var fileType = file.type;
    // console.log(fileType);
    var imageName = file.name;

    var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
    if (isGood) {
      document.getElementById('start').classList.add("hidden");
      document.getElementById('response').classList.remove("hidden");
      document.getElementById('notimage').classList.add("hidden");
      // Thumbnail Preview
      document.getElementById('file-image').classList.remove("hidden");
      document.getElementById('file-image').src = URL.createObjectURL(file);
    }
    else {
      document.getElementById('file-image').classList.add("hidden");
      document.getElementById('notimage').classList.remove("hidden");
      document.getElementById('start').classList.remove("hidden");
      document.getElementById('response').classList.add("hidden");
      document.getElementById("file-upload-form").reset();
    }
  }

  function setProgressMaxValue(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.max = e.total;
    }
  }

  function updateFileProgress(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.value = e.loaded;
    }
  }

  function uploadFile(file) {

    var xhr = new XMLHttpRequest(),
      fileInput = document.getElementById('class-roster-file'),
      pBar = document.getElementById('file-progress'),
      fileSizeLimit = 1024; // In MB
    if (xhr.upload) {
      // Check if file is less than x MB
      if (file.size <= fileSizeLimit * 1024 * 1024) {
        // Progress bar
        pBar.style.display = 'inline';
        xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
        xhr.upload.addEventListener('progress', updateFileProgress, false);

        // File received / failed
        xhr.onreadystatechange = function(e) {
          if (xhr.readyState == 4) {
            // Everything is good!

            // progress.className = (xhr.status == 200 ? "success" : "failure");
            // document.location.reload(true);
          }
        };

        // Start upload
        xhr.open('POST', document.getElementById('file-upload-form').action, true);
        xhr.setRequestHeader('X-File-Name', file.name);
        xhr.setRequestHeader('X-File-Size', file.size);
        xhr.setRequestHeader('Content-Type', 'multipart/form-data');
        xhr.send(file);
      } else {
        output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
      }
    }
  }

  // Check for the various File API support.
  if (window.File && window.FileList && window.FileReader) {
    Init();
  } else {
    document.getElementById('file-drag').style.display = 'none';
  }
}
ekUpload();
</script>
    @endsection
@endsection
