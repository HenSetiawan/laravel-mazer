<x-app-layout>
    <x-slot:title>
        Dashboard
    </x-slot>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Admin</h3>
                    <p class="text-subtitle text-muted">Dashboard</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
<!-- Basic Tables start -->
    <section class="section">
        @if(session('message'))
            <div class="alert alert-success alert-dismissible show fade">
                {{session()->get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row" id="basic-table">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table Data Admin</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <a href="{{route('createForm-admin')}}" class="btn btn-sm btn-primary">Tambah Data</a>
                                    <a href="{{route('admin-excel')}}" class="btn btn-sm btn-primary">Export</a>
                                </div>
                                
                                <form method="GET" action="{{route('admin')}}">
                                    <div class="d-flex align-items-center">
                                        <input type="text" name="search" class="form-control" placeholder="nama admin">
                                    <button type="submit" class="btn btn-primary">cari</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>NAMA</th>
                                            <th>EMAIL</th>
                                            <th>USERNAME</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                       <tr>
                                            <td class="text-bold-500">{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td class="text-bold-500">{{$user->username}}</td>
                                            <td class="text-bold-500">
                                                <button data-endpoint="{{route('admin')}}/{{$user->id}}" class="btn btn-danger btn-delete-admin"><i class="bi bi-trash-fill"></i></button>
                                                <a class="btn btn-warning text-white" href="{{route('updateForm-admin',$user->id)}}"><i class="bi bi-pencil-square"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->
    </div>
</x-app-layout>
