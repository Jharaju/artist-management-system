<script type="text/javascript">
    

    function loadHandler(event) {
        var res = JSON.parse(event.target.response);
        $('#image_name').val(res.filenames);
        $("#uploaded_image").html(res.success);
        // console.log(res.filenames);
        // alert('success');
        // $("#uploadProgressBar").css("width", "0%");
    }

    function errorHandler(event) {
        alert("Upload Failed");
    }

    function abortHandler(event) {
        alert("Upload Aborted");
    }

$(document).ready(function (e) {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$('#image').change(function(e) {
e.preventDefault();
// var progress_bar = document.getElementById('progress_bar');
// var progress_bar_process = document.getElementById('progress_bar_process');

var formData = new FormData();
let TotalFiles = $('#image')[0].files.length; //Total files
console.log(TotalFiles);
let files = $('#image')[0];
for (let i = 0; i < TotalFiles; i++) {
formData.append('files' + i, files.files[i]);
}
formData.append('TotalFiles', TotalFiles);
$.ajax({
type:'POST',
url: "{{ route('upload_multiple.upload') }}",
data: formData,
cache:false,
contentType: false,
processData: false,
dataType: 'json',

            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(event){
                    $("#uploaded_image").html("Uploaded " + event.loaded + " bytes of " + event.total);
                    // var percent_completed = Math.round((event.loaded / event.total) * 100);
                    // $('#progress_bar_process').width(percent_completed + '%');
                    // $('#progress_bar_process').html(percent_completed + '% completed');
                });
                xhr.addEventListener("load", loadHandler, false);
                xhr.addEventListener("error", errorHandler, false);
                xhr.addEventListener("abort", abortHandler, false);

                return xhr;
            },

});
});
});
</script>