<script>
  /*
We want to preview images, so we need to register the Image Preview plugin
*/
FilePond.registerPlugin(

// for multiple images
	// encodes the file as base64 data
    FilePondPluginFileEncode,
	
	// validates the size of the file
	FilePondPluginFileValidateSize,
	
	// corrects mobile image orientation
	FilePondPluginImageExifOrientation,
	
	// previews dropped images
  FilePondPluginImagePreview,


  // For editing
	// validates files based on input type
  FilePondPluginFileValidateType,
	
	// crops the image to a certain aspect ratio
  FilePondPluginImageCrop,
	
	// resizes the image to fit a certain size
  FilePondPluginImageResize,
	
	// applies crop and resize information on the client
  FilePondPluginImageTransform,
);

const inputElement = document.querySelector('input[type="file"]');
// Select the file input and use create() to turn it into a pond
const pond= FilePond.create(inputElement,
{
		labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
    imagePreviewHeight: 170,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200,
    stylePanelLayout: 'compact circle',
    styleLoadIndicatorPosition: 'center bottom',
    styleButtonRemoveItemPosition: 'center bottom'
	}
);

$('.filepond').filepond();

    // Set allowMultiple property to true
    $('.filepond').filepond('allowMultiple', true);

    const pondBox = document.querySelector('.filepond--root');
    pondBox.addEventListener('FilePond:addfile', e => {
        console.log('file added event', e.detail);
        var fileName = e.detail.pond.getFile().filename;
        var file = e.detail.pond.getFile();
        console.log(file);
    });
  
    // Listen for addfile event
    // $('.filepond').on('FilePond:addfile', function(e) {
    //     console.log('file added event', e.target.filepond);

    // });

    // Manually add a file using the addfile method
    // $('.filepond').first().filepond('addFile', 'index.html').then(function(file){
    //   console.log('file added', file);
    // });
</script>