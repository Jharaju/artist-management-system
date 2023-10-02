@extends('layout.app')

@push('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    .content-wrapper .content .button:hover{
        cursor: pointer !important;
    }
.pagination-container{
   margin-right: 10px;
}
.pagination-container .pagination {
  display: flex;
}

.pagination a {
  color: black;
  border: none !important;
  /* float: left; */
  text-decoration: none;
}

.pagination a.active {
  padding: 8px 16px;
  background-color: blue;
  color: whitesmoke;
}
.pagination a.prev-next{
    padding: 8px 16px;
    background-color: black;
    color: whitesmoke;
}
.pagination li{margin-right: 3px;}
</style>
@endpush

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1></h1>
        <ol class="breadcrumb">
            <li><a href="#"></a></li>
            <li><i class="fa fa-angle-right"></i></li>
        </ol>
    </div>

    @include('admin.pages.music.form')
    @include('layout.flash-message')

    {{--        <!-- Main content -->--}}

    @if(! isset($update))
           <div class="content">

               <div class="row">
                   <div class="col-lg-12 m-b-3">
                       <div class="box box-info" style="padding: 10px;">
                           <div class="box-header with-border p-t-1">
                             <a href="#" id="form" class="button"> <button type="button" class="btn-sm btn-primary mt-2 mb-2 button">Create</button> </a>     
                           </div>
                           <div class="col-lg-12">

                              <form action="{{ route('music.index') }}" method="GET">
                                  <div class="input-group">
                                    <input type="text" class="search-query form-control" placeholder="Search" name="search" value="{{ request('search') }}" />
                                        <span class="input-group-btn" style="margin-left:10px;">
                                            <button class="btn-sm btn-primary button" type="submit">
                                                <span class="glyphicon glyphicon-search">Search</span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                        </div>

                        <div class="box-body" style="margin-top: 20px;">
                               <div class="table-responsive">
                                   <table class="table no-margin">
                                      <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Artist</th>
                                            <th>Title</th>
                                            <th>genre</th>
                                            <th>Music</th>
                                            <th>Action</th>
                                        </tr>
                                      </thead>
                                        <tbody>
                                            @foreach ($music as $key => $product)
                                            <tr>
                                                <td>{{ ++ $key }}</td>
                                                <td>{{ $product->artist_name }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->genre }}</td>
                                                <td>
                                                <audio controls>
                                                    <!-- <source src="horse.ogg" type="audio/ogg"> -->
                                                    <source src="{{asset('storage/musics/'.$product->album_name)}}" type="audio/mpeg">
                                                
                                                </audio>
                                                </td>
                                                
                                                <td>
                                                    <a href="{{ url('/dashboard/music/edit/' . $product->id) }}"><span class="label label-success"><i class="fa fa-pencil-square" aria-hidden="true"></i></span></a>
                                                </td>
                                                <td>
                                                     <form method="POST" action="{{ route('music.destroy', $product->id) }}">
                                                     @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="show_confirm label-danger" data-toggle="tooltip" title='Delete' style="background: tranparent; border:none;"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                                                 </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
   
                                   </table>
                                    <div class="pagination-container" style="margin-top:20px;">
                                    <ul class="pagination">
                                            @if(! $pageno == 1)
                                            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="prev-next"><</a>
                                            </li>
                                            @endif

                                            @for($p=1; $p <= $total_pages; $p++)
                                            <li><a href="?pageno={{$p}}" class="<?php if($pageno == $p){ echo 'active'; } ?>">{{$p}}</a></li>
                                            @endfor

                                            @if(! $pageno >= $total_pages && $total_pages != 0)
                                            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="prev-next">></a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                               </div>
                               <!-- /.table-responsive -->
                           </div>
                       </div>
                   </div>
               </div>
           </div>

</div>
<!-- /.content -->
@endif
</div>

@if(isset($update))
<script type="text/javascript">
$('#formModal').show();
$('.modal').css("background-color", "#454d55");

$('.close').click(function(){
    // $('#formModal').hide();
    $(location).attr("href", "/dashboard/music/");
});
</script>
@endif



@endsection

@push('scripts')
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

      $('#form').click(function(e){
            e.preventDefault();
            $('#formModal').modal();
        });
  
</script>

@endpush