@extends('admin.layout')

@section('title', 'Login')

@section('content')
    <div style="display:flex; justify-content:center; align-items:center; min-height:80vh;">
        <div class="form-card">
            <div style="text-align:center; margin-bottom:24px;">
                <h1 style="font-size:36px;">Anber</h1>
                <p style="color:#E8A598; letter-spacing:4px; font-size:12px; text-transform:uppercase;">Admin Panel</p>
            </div>
            <h2 style="text-align:center; margin-bottom:24px; font-size:20px;">🔐 Admin Login</h2>

            @if(session('error'))
                <p style="color:#e74c3c; margin-bottom:16px;">{{ session('error') }}</p>
            @endif

            <form method="POST" action="/admin/login">
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required autofocus>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="btn" style="width:100%;">Login</button>
            </form>
        </div>
    </div>
@endsection