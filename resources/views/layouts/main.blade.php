<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>E~Library | Page {{ $page }}</title>
    <link rel="icon" href="{{ '/images/guemuda.png' }}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{ '/css/main.min.css' }}">
    <link rel="stylesheet" href="{{ '/css/style.css' }}">
    <link rel="stylesheet" href="{{ '/css/color.css' }}">
    <link rel="stylesheet" href="{{ '/css/responsive.css' }}">
    <link href="{{ '/plugins/apex/apexcharts.css' }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    {{-- Dropify --}}
    <link rel="stylesheet" href="{{ '/plugins/dropify/dist/css/dropify.css' }}">

</head>


<body>

    @include('loader')

    <div>
        @yield('container')
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ '/js/main.min.js'}}"></script>
    <script src="{{ '/js/vivus.min.js'}}"></script>
    <script src="{{ '/js/script.js'}}"></script>
    <script src="{{ '/plugins/apex/apexcharts.min.js'}}"></script>
    <script src="{{ '/js/graphs-scripts.js'}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js">
    </script>

    {{-- Dropify --}}
    <script src="{{ '/plugins/dropify/dist/js/dropify.js' }}"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>
    <script src="https://use.fontawesome.com/0cd8ce916e.js"></script>

    {{-- Tinymce cloud --}}
    <script src="https://cdn.tiny.cloud/1/lb6rntq6y19l4pygkcorm4dqjp8nisxw2lzonalgepcy1mlv/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <!-- TinnyMCE -->
    <script>
        tinymce.init({
        selector: '.tmpTextArea',
        menubar: false,
        placeholder: "Enter Sinopsis Book",
        branding: false,
        statusbar: false,
        toolbar: false,
        plugins: 'noneditable',
        readonly: 1,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        // toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: '//www.tinymce.com/css/codepen.min.css'
    });
    //get what is inside the textarea editor
    var content = $('iframe').contents().find('#tinymce').contents();
    //append it in a div
    $("#toAppend").append(content);
    //disable edit 
    tinymce.activeEditor.hide();
    //hide the textarea editor 
    $(".tmpTextArea").hide();
    </script>

    <!-- Editor News -->
    <script>
        tinymce.init({
        selector: '#createnews',
        branding: false,
        placeholder: "Enter Sinopsis Book",
        plugins: 'link',
        default_link_target: '_blank'
    });

    $("#submitnews").click(function() {
        tinyMCE.triggerSave();
        var status;
        status = $("#createnews").val(); //Validate again
        // console.log(status);
        if (status == '') {
            //Carry on
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong in Field News',
            });
            return false;
        } else {
            Swal.fire({
                icon: 'success',
                title: 'Oops...',
                text: 'Success Create News',
            });
        }
    });
    </script>

</body>

</html>