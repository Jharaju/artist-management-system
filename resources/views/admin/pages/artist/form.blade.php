<!-- Modal -->
@if(isset($update))
@php
$show = "show";
@endphp
@else
@php
$show = "";
@endphp
@endif
<div class="modal fade {{$show}}" id="formModal" role="dialog" style="width:100%; height:100vh; min-height:100%; overflow:scroll;" >
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
                        <h5>Add Carousel Items</h5>
						<button type="button" class="close"
								data-dismiss="modal">
							×
						</button>

					</div>
					<div class="modal-body">
                        <div class="">
                                 <form method="POST" action="{{ isset($update) ? route('banner.update', $banner->id) : route('banner.store') }}" encType="multipart/form-data">
                                        @csrf
                    
                                        
                                            
                                        <div class="row" style="padding:20px;">
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>Carousel Title</label>
                                                    <input name="title" class="form-control" id="basicInput" type="text" value="{{ isset($update) ? $update->title : '' }}" required>
                                                    @error('title')
                                                    <p class="alert alert-danger">{{$message}}</p>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                          
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>Excerpt</label>
                                                    <textarea name="excerpt" class="form-control" id="basicInput"  rows="8" cols="50">{{ isset($update) ? $update->excerpt : '' }}</textarea>
                                                    @error('excerpt')
                                                    <p class="alert alert-danger">{{$message}}</p>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>Select Image</label>
                                                    <input type="file" name="image" id="image">
                                                    @error('image')
                                                    <p class="alert alert-danger">{{$message}}</p>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                
                                            </div>
                                        
                        
                                         <div class="col-lg-12">
                                             <button type="submit" class="btn btn-primary float-right mt-2"><i class="fa fa-check"></i>
                                                 Save</button>
                                         </div>
                        
                                    </form>
                        
                           

                                    </div>
                         
                         </div>
                         <div class="modal-footer">
                            
                         </div>
                     </div>
                 </div>
             </div>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>