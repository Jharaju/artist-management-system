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
                        <h5>Add Artist</h5>
						<button type="button" class="close"
								data-dismiss="modal">
							×
						</button>

					</div>
					<div class="modal-body">
                        <div class="">
                                 <form method="POST" action="{{ isset($update) ? route('artist.update', $update->id) : route('artist.store') }}" encType="multipart/form-data">
                                        @csrf
                                        @if(isset($update))
                                        @method('PUT')
                                        @endif
                                        
                                            
                                        <div class="row" style="padding:20px;">
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>Name</label>
                                                    <input name="name" class="form-control" id="basicInput" type="text" value="{{ isset($update) ? $update->name : '' }}" required>
                                                    @error('name')
                                                    <p class="alert alert-danger">{{$message}}</p>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                          
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>Dob</label>
                                                    <input name="dob" class="form-control" id="basicInput" type="datetime-local" value="{{ isset($update) ? $update->dob : '' }}" required>
                                                    @error('dob')
                                                    <p class="alert alert-danger">{{$message}}</p>
                                                    @enderror
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" value="m" id="gender1" {{isset($update) && $update->gender == 'm' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="gender1">
                                                        Male
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" value="f" id="gender2" {{isset($update) && $update->gender == 'f' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="gender2">
                                                        Female
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" value="o" id="gender3" {{isset($update) && $update->gender == 'o' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="gender3">
                                                        Other
                                                    </label>
                                                    </div>
                                                    @error('gender')
                                                    <p class="alert alert-danger">{{$message}}</p>
                                                    @enderror
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>Address</label>
                                                    <input name="address" class="form-control" id="basicInput" type="text" value="{{ isset($update) ? $update->address : '' }}" required>
                                                    @error('address')
                                                    <p class="alert alert-danger">{{$message}}</p>
                                                    @enderror
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>First Release Year</label>
                                                    <!-- <input name="first_release_year" class="form-control" id="basicInput" type="year" value="{{ isset($update) ? $update->dob : '' }}" required> -->
                                                    <input type="number" min="1900" max="2099" step="1" name="first_release_year" class="form-control" id="basicInput" value="{{ isset($update) ? $update->first_release_year : '2016' }}" required/>
                                                    @error('first_release_year')
                                                    <p class="alert alert-danger">{{$message}}</p>
                                                    @enderror
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>No Of Albums Released</label>
                                                    <input name="no_of_albums_released" class="form-control" id="basicInput" type="number" value="{{ isset($update) ? $update->no_of_albums_released : '' }}" required>
                                                    @error('no_of_albums_released')
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