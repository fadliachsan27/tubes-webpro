@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    Profil Saya
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- Avatar -->
                            <div class="col-md-4 text-center">
                                <img src="{{ $user->avatar 
                                    ? asset('storage/avatars/'.$user->avatar) 
                                    : asset('default-avatar.png') }}"
                                    class="img-thumbnail mb-3"
                                    width="150">

                                <input type="file" name="avatar" class="form-control">
                                @error('avatar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Data -->
                            <div class="col-md-8">

                                <div class="mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control"
                                           value="{{ old('name', $user->name) }}">
                                </div>

                                <div class="mb-3">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control"
                                           value="{{ old('username', $user->username) }}">
                                </div>

                                <div class="mb-3">
                                    <label>No HP</label>
                                    <input type="text" name="phone" class="form-control"
                                           value="{{ old('phone', $user->phone) }}">
                                </div>

                                <div class="mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="gender" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="birth_date" class="form-control"
                                           value="{{ old('birth_date', $user->birth_date) }}">
                                </div>

                            </div>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea name="address" class="form-control">{{ old('address', $user->address) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Kota</label>
                                <input type="text" name="city" class="form-control"
                                       value="{{ old('city', $user->city) }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Provinsi</label>
                                <input type="text" name="province" class="form-control"
                                       value="{{ old('province', $user->province) }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Kode Pos</label>
                                <input type="text" name="postal_code" class="form-control"
                                       value="{{ old('postal_code', $user->postal_code) }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Simpan Perubahan
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
