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
                        <h5>Add Musics</h5>
						<button type="button" class="close"
								data-dismiss="modal">
							×
						</button>

					</div>
					<div class="modal-body">
                        <div class="">
                                 <form method="POST" action="{{ isset($update) ? route('music.update', $update->id) : route('music.store') }}" encType="multipart/form-data">
                                        @csrf
                                        @if(isset($update))
                                        @method('PUT')
                                        @endif
                                        
                                            
                                        <div class="row" style="padding:20px;">
                                            <div class="col-lg-12">
                                            <fieldset class="form-group">
                                                <select name="artist" class="form-select" aria-label="Select Artist" class="form-control">
                                                    <option >Select Artist</option>
                                                    @foreach($artist as $a)
                                                    @php
                                                    if(isset($update) && $update->id == $a->id){
                                                        $check = 'checked';
                                                    }else{
                                                        $check = '';
                                                    }
                                                    @endphp
                                                    <option value="{{$a->id}}" class="form-control">{{$a->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('artist')
                                                <p class="alert alert-danger">{{$message}}</p>
                                                @enderror
                                            </fieldset>
                                            </div>

                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>Title</label>
                                                    <input name="title" class="form-control" id="basicInput" type="text" value="{{ isset($update) ? $update->title : '' }}" required>
                                                    @error('title')
                                                    <p class="alert alert-danger">{{$message}}</p>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                          
                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label>Genre</label>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="genre" value="rnb" id="genre1" {{isset($update) && $update->genre == 'rnb' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="genre1">
                                                        Rnb
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="genre" value="country" id="genre2" {{isset($update) && $update->genre == 'country' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="genre2">
                                                        Country
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="genre" value="classic" id="genre3" {{isset($update) && $update->genre == 'classic' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="genre3">
                                                        Classic
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="genre" value="rock" id="genre4" {{isset($update) && $update->genre == 'rock' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="genre4">
                                                        Rock
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="genre" value="jazz" id="genre5" {{isset($update) && $update->genre == 'jazz' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="genre5">
                                                        Jazz
                                                    </label>
                                                    </div>
                                                    @error('genre')
                                                    <p class="alert alert-danger">{{$message}}</p>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        
                                            <div class="col-lg-12">
                                                <div class="col-md-12 col-lg-12">
                    @if(isset($update) && $update->album_name != null && $update->album_name != '')
                    <audio controls>
                        <!-- <source src="horse.ogg" type="audio/ogg"> -->
                        <source src="{{asset('storage/musics/'.$update->album_name)}}" type="audio/mpeg">
                    
                    </audio>

                    @else
                        <audio controls>
                        <!-- <source src="horse.ogg" type="audio/ogg"> -->
                        <source src="#" type="audio/mpeg">
                    
                    </audio>
                    @endif
                </div>

                <div class="form-group col-md-12 col-lg-12">
                    <label>Music</label>
                    <input type="file" id="music" name="music_image"
                           onclick="anyFileUploader('music')">
                    <small id="slider_help_text" class="help-block"></small>
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                         aria-valuemax="100"
                         aria-valuenow="0">
                        <div id="music_progress" class="progress-bar progress-bar-success"
                             style="width: 0%">
                        </div>
                    </div>
                    <input type="hidden" id="music_path" name="music" class="form-control"
                           value="{{isset($update) ? $update->album_name : '' }}"/>
                    {!! $errors->first('music', '<div class="text-danger">:message</div>') !!}
                </div>
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


             @push('scripts')
                <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
                @include('parties.common.file-upload')
             @endpush