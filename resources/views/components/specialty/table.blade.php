<div class="d-flex justify-content-between align-items-center mx-0 row">
  <div class="col-sm-12 col-md-6">
    <div class="dataTables_length" id="DataTables_Table_0_length">
      <label>Show
        <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
          <option value="7">7</option><option value="10">10</option>
          <option value="25">25</option><option value="50">50</option>
          <option value="75">75</option><option value="100">100</option>
        </select> entries
      </label>
    </div>
  </div>
  <div class="col-sm-12 col-md-6">
    <div id="DataTables_Table_0_filter" class="dataTables_filter">
      <label>Search:<input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0">
      </label>
    </div>
  </div>
</div>
<table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1443px;">
  <thead>
    <tr role="row">
      <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th>
      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 97px;" aria-label="Salary: activate to sort column ascending">Especialidad</th>
      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 123px;" aria-label="Status: activate to sort column ascending">estatus</th>
      <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 92px;" aria-label="Actions">Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($datos as $dato)
      <tr class="odd">
        <td class=" control" tabindex="0" style="display: none;"></td>
        <td>{{$dato->especialidad}}</td>
        <td>
          @if ($dato->status === 1)
            <span class="badge rounded-pill  badge-light-success">Activo</span>
          @else
            <span class="badge rounded-pill badge-light-danger me-1">Desactivado</span>
          @endif
        </td>
        <td>
          @if ($dato->status === 1)
            <button type="button" class="btn btn-icon rounded-circle btn-outline-danger waves-effect"><i data-feather='thumbs-down'></i></button>
          @else
            <button type="button" class="btn btn-icon rounded-circle btn-outline-success waves-effect"><i data-feather='thumbs-up'></i></button>
          @endif
          {{--  <a href="javascript:;" class="item-edit">
            <i data-feather='edit'></i>
          </a>  --}}
          {{--  $dato->status   --}}
          <button type="button" class="btn btn-icon rounded-circle btn-outline-info waves-effect" data-toggle="modal" data-target="#editSpecialty">
            <i data-feather='edit'></i>
          </button>
        </td>
      </tr>
    @endforeach 
  </tbody>
</table>
<div class="d-flex justify-content-between mx-0 row">
  <div class="col-sm-12 col-md-6">
    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 7 of 100 entries</div>
  </div>
  <div class="col-sm-12 col-md-6">
    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
      <ul class="pagination">
        <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
          <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">&nbsp;</a>
        </li>
        <li class="paginate_button page-item active">
          <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a>
        </li>
        <li class="paginate_button page-item ">
          <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a>
        </li>
        <li class="paginate_button page-item ">
          <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">3</a>
        </li>
        <li class="paginate_button page-item ">
          <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0" class="page-link">4</a>
        </li>
        <li class="paginate_button page-item ">
          <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0" class="page-link">5</a>
        </li>
        <li class="paginate_button page-item disabled" id="DataTables_Table_0_ellipsis">
          <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0" class="page-link">…</a>
        </li>
        <li class="paginate_button page-item ">
          <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="7" tabindex="0" class="page-link">15</a>
        </li>
        <li class="paginate_button page-item next" id="DataTables_Table_0_next">
          <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="8" tabindex="0" class="page-link">&nbsp;</a>
        </li>
      </ul>
    </div>
  </div>
</div>
       