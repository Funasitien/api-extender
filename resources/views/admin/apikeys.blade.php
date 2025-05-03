@extends('admin.layouts.admin')

@section('title', trans('apiextender::admin.api.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ trans('apiextender::admin.api.title') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('apiextender.admin.api-keys.generate') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ trans('apiextender::admin.api.name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">{{ trans('apiextender::admin.api.description') }}</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3"></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> {{ trans('apiextender::admin.api.generate') }}
                </button>
            </form>

            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ trans('apiextender::admin.api.name') }}</th>
                            <th>{{ trans('apiextender::admin.api.description') }}</th>
                            <th>{{ trans('apiextender::admin.api.key') }}</th>
                            <th>{{ trans('apiextender::admin.api.status') }}</th>
                            <th>{{ trans('messages.fields.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($apiKeys as $apiKey)
                            <tr>
                                <td>{{ $apiKey->name }}</td>
                                <td>{{ $apiKey->description }}</td>
                                <td><code>{{ $apiKey->api_key }}</code></td>
                                <td>
                                    <span class="badge bg-{{ $apiKey->is_active ? 'success' : 'danger' }}">
                                        {{ trans('apiextender::admin.api.' . ($apiKey->is_active ? 'active' : 'inactive')) }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('apiextender.admin.api-keys.toggle', $apiKey) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-{{ $apiKey->is_active ? 'warning' : 'success' }}">
                                            <i class="bi bi-{{ $apiKey->is_active ? 'x-lg' : 'check-lg' }}"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('apiextender.admin.api-keys.delete', $apiKey) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ trans('apiextender::admin.api.delete_confirm') }}')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
