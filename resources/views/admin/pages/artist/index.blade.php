@extends('layout.app')

@push('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  border: none !important;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: blue;
  color: white;
}
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

    @include('admin.pages.artist.form')
    @include('layout.flash-message')

    {{--        <!-- Main content -->--}}

    @if(! isset($update))
           <div class="content">

               <div class="row">
                   <div class="col-lg-12 m-b-3">
                       <div class="box box-info" style="padding: 10px;">
                           <div class="box-header with-border p-t-1">
                             <a href="#" id="form"> <button type="button" class="btn btn-primary mt-2 mb-2">Create Banner</button> </a>     
                           </div>
                           <div class="col-lg-12">

                              <form action="{{ route('artist.index') }}" method="GET">
                                  <div class="input-group">
                                    <input type="text" class="search-query form-control" placeholder="Search" name="search" value="{{ request('search') }}" />
                                        <span class="input-group-btn" style="margin-left:10px;">
                                            <button class="btn btn-primary" type="submit">
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
                                            <th>Title</th>
                                            <th>Excerpt</th>
                                            <th>Content</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                      </thead>
                                        <tbody>
                                            @foreach ($artist as $key => $product)
                                            <tr>
                                                <td>{{ ++ $key }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->excerpt }}</td>
                                                <td>{!! html_entity_decode(Str::limit($product->content)) !!}</td>
                                                <td><img src="" alt="" style="width: 50px; height:50px; background-size:cover; background-repeat:no-repeat;"></td>
                                                
                                                <td>
                                                    <a href="{{ url('/dashboard/artist/edit/' . $product->id) }}"><span class="label label-success">Edit</span></a>
                                                </td>
                                                <td>
                                                     <form method="POST" action="{{ route('artist.destroy', $product->id) }}">
                                                     @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="show_confirm label-danger" data-toggle="tooltip" title='Delete' style="background: tranparent; border:none;"> Delete </button>
                                                 </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
   
                                   </table>
                                    <div class="pagination-container" style="margin-top:20px;">
                                         {{ $artist->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
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
    $('#formModal').hide();
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