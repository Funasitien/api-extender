@extends('admin.layouts.admin')

@section('title', trans('apiextender::admin.images'))

@push('styles')
<style>
.image-card {
    transition: opacity 0.3s ease-in-out;
}
.image-card.loading {
    opacity: 0.6;
}
.image-container {
    position: relative;
    width: 60px;
    height: 60px;
}
.image-placeholder {
    position: absolute;
    top: 0;
    left: 0;
    background: #f0f0f0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: opacity 0.3s ease-in-out;
}
.image-container img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}
.image-container img.loaded {
    opacity: 1;
}
.image-container .image-placeholder.hidden {
    opacity: 0;
    pointer-events: none;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                const container = img.closest('.image-container');
                const placeholder = container.querySelector('.image-placeholder');
                
                if (img.dataset.src) {
                    const tempImage = new Image();
                    tempImage.onload = () => {
                        img.src = tempImage.src;
                        img.classList.add('loaded');
                        placeholder.classList.add('hidden');
                    };
                    tempImage.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    observer.unobserve(img);
                }
            }
        });
    }, {
        rootMargin: '50px 0px',
        threshold: 0.1
    });

    // Préchargement des images de la page suivante
    function preloadNextPageImages() {
        const nextPageUrl = document.querySelector('.pagination .page-item.active + .page-item a')?.href;
        if (nextPageUrl) {
            fetch(nextPageUrl)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const nextImages = doc.querySelectorAll('img[data-src]');
                    nextImages.forEach(img => {
                        const preloadLink = document.createElement('link');
                        preloadLink.rel = 'prefetch';
                        preloadLink.href = img.dataset.src;
                        document.head.appendChild(preloadLink);
                    });
                });
        }
    }

    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });

    window.addEventListener('load', preloadNextPageImages);
});
</script>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ trans('apiextender::admin.images') }}</h5>
        </div>

        @plugin('skin-api')
            <div class="card-body">
                <p>{{ trans('apiextender::admin.using_starlight_api') }}</p>

                <div class="row">
                    @foreach($requests as $request => $crops)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 border-primary image-card">
                            <div class="card-body">
                                <h6 class="card-title text-capitalize">{{ $request }}</h6>
                                <p class="card-text mb-2">
                                    <strong>{{ trans('apiextender::admin.available_crops') }}</strong>
                                </p>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="d-flex flex-wrap">
                                        @foreach($crops as $crop)
                                            <span class="badge bg-secondary me-2 mb-1">{{ $crop }}</span>
                                        @endforeach
                                    </div>
                                    <div class="image-container">
                                        <div class="image-placeholder">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </div>
                                        <img 
                                            data-src="/api/apiextender/images/{{ $request }}/full/{{ auth()->user()->name }}"
                                            alt="{{ $request }}"
                                            class="img-fluid"
                                            loading="lazy"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if($totalPages > 1)
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        {{ trans('apiextender::admin.showing_images', [
                            'from' => ($currentPage - 1) * 3 + 1,
                            'to' => min($currentPage * 3, $totalImages),
                            'total' => $totalImages
                        ]) }}
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination mb-0">
                            @if($currentPage > 1)
                                <li class="page-item">
                                    <a class="page-link" href="?page={{ $currentPage - 1 }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            @endif

                            @for($i = 1; $i <= $totalPages; $i++)
                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                    <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if($currentPage < $totalPages)
                                <li class="page-item">
                                    <a class="page-link" href="?page={{ $currentPage + 1 }}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                @endif

                <hr>
                <p><strong>{{ trans('apiextender::admin.example_url') }}</strong></p>
                <code>/api/apiextender/images/{request}/{crop}/authuser</code>
            </div>
        @else
            <div class="card-body">
                <p>{!! trans('apiextender::admin.enable_plugin') !!}</p>
            </div>
        @endplugin
    </div>
@endsection
