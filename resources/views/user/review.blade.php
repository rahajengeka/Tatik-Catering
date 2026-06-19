@extends('layouts.app')

@section('content')
<div class="container">

<h2>Review Pelanggan</h2>

<table class="table table-bordered">
<thead>
<tr>
    <th>Nama</th>
    <th>Bintang</th>
    <th>Komentar</th>
    <th>Tanggal</th>
</tr>
</thead>

<tbody>
@foreach($reviews as $r)
<tr>
    <td>{{ $r->nama_pelanggan }}</td>
    <td>{{ str_repeat('⭐', $r->bintang) }}</td>
    <td>{{ Str::limit($r->komentar, 80) }}</td>
    <td>{{ $r->created_at->format('d/m/Y') }}</td>
</tr>
@endforeach
</tbody>
</table>

{{ $reviews->links() }}

</div>
@endsection
