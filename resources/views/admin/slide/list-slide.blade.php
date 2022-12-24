@extends('admin.layout.master')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Danh sách Sản phâm</h4>
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
                        <th style="text-align: center">Tên slide</th>
                        <th style="text-align: center">Hình ảnh</th>
                        <th style="text-align: center">
                            <a class="btn btn-primary waves-effect waves-light btn-xs" href="{{ route('add-slide') }}">
                                <i class=" fas fa-plus"></i> Thêm Slide
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach ($slide as $list)
                        <tr>
                            <td style="text-align: center; line-height: 4">{{ $i }}</td>
                            <td style="text-align: center; line-height: 4">{{ $list ->title}}</td>
                            <td style="text-align: center">
                                <img class="rounded" alt="64x64" src="{{ asset($list->img_slide) }}"
                                     style="width: 100px; height: 66px;">
                            </td>
                            <td style="text-align: center; line-height: 4">
                                <a class="btn btn-facebook waves-effect waves-light btn-xs"
                                   href="{{ route('edit-slide',$list->id) }}">
                                    <i class="typcn typcn-edit"></i> Sửa
                                </a>
                                <a class="btn btn-pinterest waves-effect waves-light btn-xs delete"
                                   href="{{ route('del-slide',$list->id) }}"
                                   data-confirm="Bạn có chắc chán muốn xóa Slide">
                                    <i class=" typcn typcn-times"></i> Xóa
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
