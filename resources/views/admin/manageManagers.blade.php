@extends('layouts.app')

@section('sideMenu')
    @include('layouts.adminSideMenu')
@endsection


@section('content');
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">         
            <h1 class="m-0">Managers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Managers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <div class="content">
  <div class="container-fluid">
  <div class="card-body p-2">
    <table id="table_id " class="yajra-datatable display table table-bordered table-striped">
    <thead>
        <tr>
            <th class='text-centerr'>Avater</th>
            <th class='text-centerr'>Name</th>
            <th class='text-centerr'>Email</th>
            <th class='text-centerr'>Created At</th>
            <th class='text-centerr'>National ID</th>
            <th class='text-centerr'>Action</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
            <td>Row 1 Data 1</td>

            <td>
            <a class="bi bi-pencil-square pl-2" style="font-size: 1.25rem; color:gray;" href="managers/1/edit"></a>
                <i class="bi bi-trash pl-2" style="font-size: 1.25rem; color:gray;"></i>
                <i class="bi bi-person-x pl-2" style="font-size: 1.25rem; color:gray;"></i>
                <i class="bi bi-person-check pl-2" style="font-size: 1.25rem; color:gray;"></i>

            </td>

        </tr>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
            <td>Row 2 Data 2</td>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
              <td>
              <a class="bi bi-pencil-square pl-2" style="font-size: 1.25rem; color:gray;" href="managers/1/edit"></a>
                <i class="bi bi-trash pl-2" style="font-size: 1.25rem; color:gray;"></i>
                <i class="bi bi-person-x pl-2" style="font-size: 1.25rem; color:gray;"></i>
                <i class="bi bi-person-check pl-2" style="font-size: 1.25rem; color:gray;"></i>
            </td>

        </tr>
    </tbody>
  </table>
  </div>
</div>
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(function () {
    console.log('scriiiipt');
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('get-managers') }}',
        columns: [
                {data: 'avatar', name: 'avatar'},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
                {data: 'createdAt', name: 'createdAt'},
                {data: 'NationalID', name: 'NationalID'},
            

            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>
@endsection
