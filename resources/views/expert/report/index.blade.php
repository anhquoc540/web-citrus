@extends('admin.main')

@section('content')
    <form action="/expert/reports" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Chọn ngày:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input name="from_to" value="{{ $fromTo }}" type="text" class="form-control float-right" id="reservation">
                    </div>
                    <!-- /.input group -->
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="visi-hd">AD</label>
                    <div class="input-group">
                        <button type="submit" class="btn btn-info">Áp dụng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                           
                            <div class="d-flex">
                                <i class="fas fa-globe"></i> &nbsp; <h6><b>{{ $data['store']->name }}</b></h6>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <h6>Địa chỉ: <b>{{ $data['store']->address }}</b></h6>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <h6>Số điện thoại: <b>{{ $data['store']->user->phone }}</b></h6>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <h6>Email: <b>{{ $data['store']->user->email }}</b></h6>
                            </div>
                            <div class="d-flex visi-hd">
                                <h6>Username: <b>{{ $data['store']->user->fullname }}</b></h6>
                            </div>
                            <div class="text-center">
                                <h5><b>TÓM TẮT THỐNG KÊ BÁN HÀNG</b></h5>
                            </div>
                            
                            
                            {{-- <h6>{{ $data['store']->address }}</h6> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Số đơn bán:</th>
                                        <td>{{ $data['orderSuccess'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Số đơn hủy</th>
                                        <td>{{ $data['orderCancel'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phí vận chuyển:</th>
                                        <td> {{ number_format($data['shipFee'], 0, ',', '.') }} </td>
                                    </tr>
                                    <tr>
                                        <th>Thu nhập:</th>
                                        <td> {{ number_format($data['totalPay'], 0, ',', '.') }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row no-print">
                                <div class="col-12">
                                  <button onclick="window.print();" class="btn btn-default noPrint float-right"><i class="fas fa-print"></i> Print</button>
                                </div>
                              </div>

                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Bán Hàng</h3>
                                {{-- <a href="javascript:void(0);">Chi Tiết</a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">{{ number_format($data['totalOrderSuccess'], 0, ',', '.') }} VND</span>
                                    <span>Bán Hàng Theo Thời Gian</span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <span class="text-success">
                                        <i class="fas fa-arrow-up"></i> 33.1%
                                    </span>
                                    <span class="text-muted">Lợi nhuận so với tháng trước</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="sales-chart" height="200"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> Năm nay
                                </span>

                                <span>
                                    <i class="fas fa-square text-gray"></i> Năm trước
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->


    <table id="reports" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Đơn Hàng</th>
                <th>Tên Đơn Hàng</th>
                <th>Ngày Tạo</th>
                <th>Phí Vận Chuyển</th>
                <th>Phí Sản Phẩm</th>
                <th>Tổng Đơn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['list'] as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td><a href="#">{{ $item->order_code }}</a></td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ number_format($item->shipping_fee, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->total - $item->shipping_fee, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
@endsection

@section('linkscript')
    <script>
        $(function() {
            $('#reports').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                order: [
                    [3, 'desc']
                ],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                // "columnDefs": [{
                //     "targets": [7], // column index (start from 0)
                //     "orderable": false, // set orderable false for selected columns
                // }]
            }).buttons().container().appendTo('#reports_wrapper .col-md-6:eq(0)');

            //Date range picker
            $('#reservation').daterangepicker({
                ranges: {
                    'Hôm nay': [moment(), moment()],
                    'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 ngày trước': [moment().subtract(6, 'days'), moment()],
                    '30 ngày trước': [moment().subtract(29, 'days'), moment()],
                    'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                    'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
            })

        });

        $(function() {
            'use strict'

            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }

            var mode = 'index'
            var intersect = true

            var $salesChart = $('#sales-chart')
            // eslint-disable-next-line no-unused-vars
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: ['THÁNG 1', 'THÁNG 2', 'THÁNG 3', 'THÁNG 4', 'THÁNG 5', 'THÁNG 6', 'THÁNG 7',
                        'THÁNG 8', 'THÁNG 9', 'THÁNG 10', 'THÁNG 11', 'THÁNG 12'
                    ],
                    datasets: [{
                            backgroundColor: '#007bff',
                            borderColor: '#007bff',
                            data: [8000000, 20000000, 30000000, 25000000, 27000000, 25000000, 30000000,
                                8500000, 0, 0, 0, 0
                            ]
                        },
                        {
                            backgroundColor: '#ced4da',
                            borderColor: '#ced4da',
                            data: [15000000, 40000000, 62000000, 45000000, 41500000, 34500000, 47000000,
                                35000000, 25000000, 26000000, 54000000, 39500000
                            ]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            // display: false,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,

                                // Include a dollar sign in the ticks
                                callback: function(value) {
                                    if (value >= 1000000) {
                                        value /= 1000000
                                        value += ' Triệu'
                                    }

                                    return 'VND ' + value
                                }
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

        })
    </script>
@endsection
