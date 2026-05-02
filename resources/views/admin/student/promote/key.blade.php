@extends('admin.layout.app')

@section('page_title', 'Generate Promotion Key')

@section('content')
<div class="container-fluid py-2">
    <div class="mb-4 d-flex flex-wrap gap-2 justify-content-between align-items-start">
        <div>
            <h2 class="fs-4 fw-bold text-dark mb-1">Promotion Keys</h2>
            <p class="text-muted small mb-0">Generate a new, one-time use key to initiate student promotion.</p>
        </div>
        <a href="{{ route('admin.promote.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i>Back to Promotion
        </a>
    </div>



    <div class="card border border-light shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white p-3 border-bottom d-flex justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">
                <i class="fa-solid fa-key me-2 text-primary"></i>Promotion Keys
            </h5>
            <form action="{{ route('admin.promote.key.generate') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-plus me-1"></i>Generate New Key
                </button>
            </form>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-3 py-3">#</th>
                            <th class="px-3 py-3">Key</th>
                            <th class="px-3 py-3">Is Used</th>
                            <th class="px-3 py-3">Created At</th>
                            <th class="px-3 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($keys as $index => $promoKey)
                            <tr>
                                <td class="px-3 py-2 text-muted small">{{ $index + 1 }}</td>
                                <td class="px-3 py-2 fw-medium">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" value="{{ $promoKey->key }}" readonly>
                                        <button class="btn btn-outline-secondary" type="button" onclick="copyPromotionKey('{{ $promoKey->key }}')">
                                            <i class="fa-solid fa-copy"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-3 py-2">
                                    @if($promoKey->is_used)
                                        <span class="badge bg-secondary">Used</span>
                                    @else
                                        <span class="badge bg-success">Unused</span>
                                    @endif
                                </td>
                                <td class="px-3 py-2 small text-muted">{{ $promoKey->created_at->format('M d, Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('admin.promote.key.delete', $promoKey->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash me-1"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    <i class="fa-solid fa-folder-open mb-2 text-secondary opacity-50 fa-2x"></i>
                                    <p class="mb-0">No promotion keys generated yet.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function copyPromotionKey(key) {
        navigator.clipboard.writeText(key);
        alert('Promotion key copied to clipboard!');
    }
</script>
@endsection
