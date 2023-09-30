<script type="text/javascript">
function upload_file(id, supported_ext){

    var file_element = document.getElementById(id);

    var progress_bar = document.getElementById('progress_bar');

    var progress_bar_process = document.getElementById('progress_bar_process');

    var uploaded_image = document.getElementById('uploaded_image');

    if(! supported_ext.includes(file_element.files[0].type))
    {
        uploaded_image.innerHTML = '<div class="alert alert-danger">Unsupported File !</div>';

        file_element.value = '';
    }
    else
    {
        var form_data = new FormData();

        form_data.append('sample_image', file_element.files[0]);

        form_data.append('_token', document.getElementsByName('_token')[0].value);

        progress_bar.style.display = 'block';

        var ajax_request = new XMLHttpRequest();

        ajax_request.open("POST", "{{ route('upload_file.upload') }}");

        ajax_request.upload.addEventListener('progress', function(event){

            var percent_completed = Math.round((event.loaded / event.total) * 100);

            progress_bar_process.style.width = percent_completed + '%';

            progress_bar_process.innerHTML = percent_completed + '% completed';

        });

        ajax_request.addEventListener('load', function(event){

            var file_data = JSON.parse(event.target.response);

            uploaded_image.innerHTML = '<div class="alert alert-success">Files Uploaded Successfully</div><img src="'+file_data.image_path+'" class="img-fluid img-thumbnail" />';

            document.getElementById('image_name').value = file_data.filename;

        });

        ajax_request.send(form_data);


    }

}

    </script>