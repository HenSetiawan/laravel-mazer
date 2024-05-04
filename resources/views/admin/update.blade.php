<x-app-layout>
    <x-slot:title>
        Dashboard
    </x-slot>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Data Admin</h3>
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
    <!-- Basic Vertical form layout section start -->
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Ubah Data Admin</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" action="{{route('update-admin')}}" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <input value="{{$user->id}}" type="text" class="d-none" name="id">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nama</label>
                                                    <input value="{{$user->name}}" type="text" id="first-name-vertical" class="form-control @error('name')  is-invalid  @enderror"
                                                        name="name" placeholder="Nama">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Email</label>
                                                    <input value="{{$user->email}}" type="email" id="email-id-vertical" class="form-control @error('email')  is-invalid  @enderror"
                                                        name="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Username</label>
                                                    <input value="{{$user->username}}" type="text" id="contact-info-vertical" class="form-control @error('username')  is-invalid  @enderror"
                                                        name="username" placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password-vertical">Password</label>
                                                    <input type="password" id="password-vertical" class="form-control @error('password')  is-invalid  @enderror"
                                                        name="password" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- // Basic Vertical form layout section end -->
    </div>
</x-app-layout>
