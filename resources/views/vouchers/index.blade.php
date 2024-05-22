@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vouchers</h1>
    <a href="{{ route('vouchers.create') }}" class="btn btn-primary">Create Voucher</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Voucher Number</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vouchers as $voucher)
                <tr>
                    <td>{{ $voucher->id }}</td>
                    <td>{{ $voucher->voucher_number }}</td>
                    <td>{{ $voucher->date }}</td>
                    <td>{{ $voucher->amount }}</td>
                    <td>{{ $voucher->description }}</td>
                    <td>
                        <a href="{{ route('vouchers.show', $voucher->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('vouchers.edit', $voucher->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('vouchers.destroy', $voucher->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
