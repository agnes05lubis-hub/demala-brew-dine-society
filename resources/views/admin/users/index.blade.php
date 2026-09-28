@extends('layouts.admin')

@section('title', 'User Baru')
@section('admin_page_title', 'User Baru')

@section('content')
<div class="adm-page">

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $u)
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->created_at->format('d M Y, H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align:center;color:#888;padding:30px">Belum ada user yang mendaftar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pager">
        @if($users->previousPageUrl())
            <a href="{{ $users->previousPageUrl() }}">← Sebelumnya</a>
        @endif
        @if($users->nextPageUrl())
            <a href="{{ $users->nextPageUrl() }}">Berikutnya →</a>
        @endif
    </div>

</div>
@endsection