@extends('Web.layouts.inc.app')
@section('title1')
    المشرفين
@endsection
{{--@section('title2')--}}
{{--     عرض المشرفين--}}
{{--@endsection--}}
@section('content')
    <div class="row">
    <div class=" col-12">
        <div class="card">
            <div class="card-header p-3 pb-0">
                <div class="row mb-3">
                    <div  style="float: right;display: inline-block" class="col-6">
                        <h6 class="mb-0">المشرفين</h6>
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">انضم</p>
                    </div>
{{--                    <div  style="float:left;display: inline-block" class="col-6">--}}
{{--                        <div class="icon icon-shape bg-gradient-primary shadow text-center w-auto p-2" style="float: left">--}}
{{--                            <i class="fa fa-plus opacity-10 px-1" style="top:0;" aria-hidden="true"></i>--}}
{{--                            <span class="opacity-10 text-white" aria-hidden="true">اضافة جديد</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>

            </div>

            <div class="card-body border-radius-lg p-3">
                <div class="card">
                    <div class="table-responsive">
                        <table id="example" class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Technology</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">John Michael</h6>
                                            <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Manager</p>
                                    <p class="text-xs text-secondary mb-0">Organization</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm badge-success">Online</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                </td>
                                <td class="align-middle">
                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Edit
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">Alexa Liras</h6>
                                            <p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Programator</p>
                                    <p class="text-xs text-secondary mb-0">Developer</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm badge-secondary">Offline</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">11/01/19</span>
                                </td>
                                <td class="align-middle">
                                    <a href="#!" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Edit
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">Laurent Perrier</h6>
                                            <p class="text-xs text-secondary mb-0">laurent@creative-tim.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Executive</p>
                                    <p class="text-xs text-secondary mb-0">Projects</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm badge-success">Online</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">19/09/17</span>
                                </td>
                                <td class="align-middle">
                                    <a href="#!" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Edit
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">Michael Levi</h6>
                                            <p class="text-xs text-secondary mb-0">michael@creative-tim.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Programator</p>
                                    <p class="text-xs text-secondary mb-0">Developer</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm badge-success">Online</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">24/12/08</span>
                                </td>
                                <td class="align-middle">
                                    <a href="#!" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Edit
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">Richard Gran</h6>
                                            <p class="text-xs text-secondary mb-0">richard@creative-tim.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Manager</p>
                                    <p class="text-xs text-secondary mb-0">Executive</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm badge-secondary">Offline</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">04/10/21</span>
                                </td>
                                <td class="align-middle">
                                    <a href="#!" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Edit
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">Miriam Eric</h6>
                                            <p class="text-xs text-secondary mb-0">miriam@creative-tim.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Programtor</p>
                                    <p class="text-xs text-secondary mb-0">Developer</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm badge-secondary">Offline</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">14/09/20</span>
                                </td>
                                <td class="align-middle">
                                    <a href="#!" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
{{--                <form>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="text" placeholder="Regular" class="form-control" disabled />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="input-group mb-4">--}}
{{--                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>--}}
{{--                                    <input class="form-control" placeholder="Search" type="text">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="input-group mb-4">--}}
{{--                                    <input class="form-control" placeholder="Birthday" type="text">--}}
{{--                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group has-success">--}}
{{--                                <input type="text" placeholder="Success" class="form-control is-valid" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group has-danger">--}}
{{--                                <input type="email" placeholder="Error Input" class="form-control is-invalid" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}


            </div>
        </div>
    </div>
    </div>


@endsection
