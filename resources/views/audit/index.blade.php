@extends('adminlte::page')

@section('content')
  
  <div class="box-body">
    <div class="box">
      <h4 class="box-title"> &nbsp;&nbsp; Jejak Audit </h4>
        <div class="box-body table-responsive no-padding">
      <!-- /.box-header -->
      <div class="box-body">
        <table id="programTable" class="table table-bordered table-striped">
          <thead>
          <!-- /.box -->
            
            <!-- /.box-header -->
            <table class="table table-bordered">
            <div class="box-body">
            <div class="container">
    <table class="table" >
      <thead class="thead-dark">
        <tr>
          <th scope="col">Model</th>
          <th scope="col">Action</th>
          <th scope="col">User</th>
          <th scope="col">Masa</th>
          <th scope="col">Old Values</th>
          <th scope="col">New Values</th>
        </tr>
      </thead>
      <tbody id="audits">
        @foreach($audits as $audit)
          <tr>
            <td>{{ $audit->auditable_type }} (id: {{ $audit->auditable_id }})</td>
            <td>{{ $audit->event }}</td>
            {{-- <td>{{ $audit->user->nama_singkatan }}</td> --}}
            <td>{{ $audit->created_at }}</td>
            <td>
              <table class="table">
                @foreach($audit->old_values as $attribute => $value)
                  <tr>
                    <td><b>{{ $attribute }}</b></td>
                    <td>{{ $value }}</td>
                  </tr>
                @endforeach
              </table>
            </td>
            <td>
              <table class="table">
                @foreach($audit->new_values as $attribute => $value)
                  <tr>
                    <td><b>{{ $attribute }}</b></td>
                    <td>{{ $value }}</td>
                  </tr>
                @endforeach
              </table>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          <!-- Page level plugins -->
      </div>
  </div>
@endsection