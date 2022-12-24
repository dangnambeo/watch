@extends('admin.layout.master')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Danh sách đơn hàng</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <table id="datatable" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr align="center">
                        <th style="text-align: center">STT</th>
                        <th style="text-align: center">Mã đơn hàng</th>

                        <th style="text-align: center">Trạng thái đơn hàng</th>
                        <th style="text-align: center">
                            Hành động
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach ($bill as $list)
                        <tr>
                            <td style="text-align: center">{{ $i }}</td>
                            <td style="text-align: center"># {{ $list->id }}</td>
                            <td style="text-align: center">
                                @if(($list->status)==0)
                                    <label class="badge badge-warning">
                                        Chưa xác nhận
                                    </label>
                                @elseif(($list->status)==1)
                                <label class="badge badge-primary">
                                    Xác nhận đơn hàng
                                </label>
                                @elseif(($list->status)==2)
                                <label class="badge badge-success">
                                    Giao hàng thành công
                                </label>
                                @else
                                    <label class="badge badge-danger">
                                        Hủy đơn hàng
                                    </label>
                                @endif
                            </td>
                            <td style="text-align: center">
                                <a class="btn btn-success waves-effect waves-light btn-xs"
                                   href="{{ route('order-list',$list->id) }}">
                                    <i class="typcn typcn-eye"></i> Xem chi tiết
                                </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
