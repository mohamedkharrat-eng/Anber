@extends('admin.layout')

@section('title', 'Messages')

@section('content')
    <h1>Messages 📩</h1>

    @if($messages->isEmpty())
        <p style="color:#9e7b6b;">No messages yet.</p>
    @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $msg)
                <tr>
                    <td>{{ $msg->id }}</td>
                    <td>{{ $msg->name }}</td>
                    <td>{{ $msg->phone }}</td>
                    <td>{{ $msg->message }}</td>
                    <td>{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <form method="POST" action="/admin/messages/{{ $msg->id }}/delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; cursor:pointer; font-size:20px;" title="Delete">🗑️</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection