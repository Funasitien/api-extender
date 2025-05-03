@extends('admin.layouts.admin')

@section('title', trans('apiextender::messages.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ trans('apiextender::messages.title') }}</h5>
        </div>
        <div class="card-body">
            <div class="alert alert-info mb-4">
                <h4 class="alert-heading">{{ trans('apiextender::messages.auth.title') }}</h4>
                <p>{{ trans('apiextender::messages.auth.description') }}</p>
                <code>{{ trans('apiextender::messages.auth.header') }}</code>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="endpoint-card mb-4">
                        <h3 class="text-primary">{{ trans('apiextender::messages.endpoints.root.title') }}</h3>
                        <div class="method-badge bg-primary text-white">GET</div>
                        <code class="endpoint-url">api/apiextender/</code>
                        <p class="mt-2">{{ trans('apiextender::messages.endpoints.root.description') }}</p>
                        <div class="mt-3">
                            <h6>{{ trans('apiextender::messages.endpoints.root.example') }} :</h6>
                            <pre class="bg-light p-3 rounded"><code>curl -X GET "http://127.0.0.1:8000/api/apiextender/" -H "API-Key: votre_cle_api"</code></pre>
                        </div>
                    </div>
                    <div class="endpoint-card mb-4">
                        <h3 class="text-primary">{{ trans('apiextender::messages.endpoints.money.title') }}</h3>
                        <div class="method-badge bg-primary text-white">GET</div>
                        <code class="endpoint-url">api/apiextender/money</code>
                        <p class="mt-2">{{ trans('apiextender::messages.endpoints.money.description') }}</p>
                        <div class="mt-3">
                            <h6>{{ trans('apiextender::messages.endpoints.money.example') }} :</h6>
                            <pre class="bg-light p-3 rounded"><code>curl -X GET "http://127.0.0.1:8000/api/apiextender/money" -H "API-Key: votre_cle_api"</code></pre>
                        </div>
                    </div>
                    <div class="endpoint-card mb-4">
                        <h3 class="text-primary">{{ trans('apiextender::messages.endpoints.social.title') }}</h3>
                        <div class="method-badge bg-primary text-white">GET</div>
                        <code class="endpoint-url">api/apiextender/social</code>
                        <p class="mt-2">{{ trans('apiextender::messages.endpoints.social.description') }}</p>
                        <div class="mt-3">
                            <h6>{{ trans('apiextender::messages.endpoints.social.example') }} :</h6>
                            <pre class="bg-light p-3 rounded"><code>curl -X GET "http://127.0.0.1:8000/api/apiextender/social" -H "API-Key: votre_cle_api"</code></pre>
                        </div>
                    </div>
                    <div class="endpoint-card mb-4">
                        <h3 class="text-primary">{{ trans('apiextender::messages.endpoints.servers.title') }}</h3>
                        <div class="method-badge bg-primary text-white">GET</div>
                        <code class="endpoint-url">api/apiextender/servers</code>
                        <p class="mt-2">{{ trans('apiextender::messages.endpoints.servers.description') }}</p>
                        <div class="mt-3">
                            <h6>{{ trans('apiextender::messages.endpoints.servers.example') }} :</h6>
                            <pre class="bg-light p-3 rounded"><code>curl -X GET "http://127.0.0.1:8000/api/apiextender/servers" -H "API-Key: votre_cle_api"</code></pre>
                        </div>
                    </div>

                    <div class="endpoint-card mb-4">
                        <h3 class="text-primary">{{ trans('apiextender::messages.endpoints.roles.title') }}</h3>
                        <div class="method-badge bg-primary text-white">GET</div>
                        <code class="endpoint-url">api/apiextender/roles</code>
                        <p class="mt-2">{{ trans('apiextender::messages.endpoints.roles.description') }}</p>
                        <div class="mt-3">
                            <h6>{{ trans('apiextender::messages.endpoints.roles.example') }} :</h6>
                            <pre class="bg-light p-3 rounded"><code>curl -X GET "http://127.0.0.1:8000/api/apiextender/roles" -H "API-Key: votre_cle_api"</code></pre>
                        </div>
                    </div>

                    <div class="endpoint-card mb-4">
                        <h3 class="text-primary">{{ trans('apiextender::messages.endpoints.users.title') }}</h3>
                        <div class="method-badge bg-primary text-white">GET</div>
                        <code class="endpoint-url">api/apiextender/users</code>
                        <p class="mt-2">{{ trans('apiextender::messages.endpoints.users.description') }}</p>
                        <div class="mt-3">
                            <h6>{{ trans('apiextender::messages.endpoints.users.example') }} :</h6>
                            <pre class="bg-light p-3 rounded"><code>curl -X GET "http://127.0.0.1:8000/api/apiextender/users" -H "API-Key: votre_cle_api"</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .endpoint-card {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 0.5rem;
            border-left: 4px solid #007bff;
        }
        .method-badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            font-weight: 600;
            margin-right: 1rem;
        }
        .endpoint-url {
            background: #e9ecef;
            padding: 0.5rem;
            border-radius: 0.25rem;
            font-family: monospace;
        }
        pre {
            margin-bottom: 0;
        }
    </style>
@endsection
