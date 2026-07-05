@extends('layouts.customer')

@section('title', 'Contact')

@section('content')
    <div style="padding:60px; max-width:900px; margin:0 auto;">
        <h1 style="color:#5C3D2E; font-family:Georgia,serif; margin-bottom:40px; text-align:center;">Contactez-nous 🌸</h1>

        @if(session('success'))
            <div style="background:#d4edda; color:#27ae60; padding:16px; border-radius:10px; margin-bottom:24px; text-align:center;">
                {{ session('success') }}
            </div>
        @endif

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:40px;">
            <div style="background:white; padding:30px; border-radius:16px; box-shadow:0 4px 16px rgba(200,133,58,0.1);">
                <h2 style="color:#C8853A; margin-bottom:20px;">Informations</h2>
                <p style="margin-bottom:16px;">📍 <strong>Adresse:</strong> Sfax, Tunisie</p>
                <p style="margin-bottom:16px;">📞 <strong>Téléphone:</strong> +216 24 888 103</p>
                <p style="margin-bottom:16px;">📧 <strong>Email:</strong> patisserieanber@gmail.com</p>
                <p style="margin-bottom:16px;">🕐 <strong>Horaires:</strong> 24h/24</p>
            </div>
            <div class="form-card">
                <h2 style="color:#C8853A; margin-bottom:20px;">Envoyez un message</h2>
                <form method="POST" action="/contact">
                    @csrf
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="name" placeholder="Votre nom" required>
                        @error('name') <p style="color:#e74c3c; font-size:13px;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="text" name="phone" placeholder="Votre numéro" required>
                        @error('phone') <p style="color:#e74c3c; font-size:13px;">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" rows="4" placeholder="Votre message..." required></textarea>
                        @error('message') <p style="color:#e74c3c; font-size:13px;">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="btn" style="width:100%;">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
@endsection