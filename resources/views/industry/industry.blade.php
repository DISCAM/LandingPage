@extends('layouts/main')

@section('title')
    @if(isset($title))
        - {{$title}}
    @endif
@endsection('title')

@section('content')
    <div class="container mt-4">

        {{-- Flash messages, jeśli masz partial --}}
        {{--@includeIf('partials.flash')--}}

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="card-title m-0">Branże</h3>
                    <div class="text-muted small">Zarządzaj branżami i powiązanymi kontaktami</div>
                </div>
                <a href="{{ route('industry.create') }}" class="btn btn-primary">
                    + Dodaj branżę
                </a>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th style="width:72px">ID</th>
                            <th style="width:260px">Nazwa</th>
                            <th>Opis</th>
                            <th style="width:220px">Kontakty</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($lista as $asset)
                            <tr>
                                <td class="text-muted">{{ $asset->id }}</td>

                                <td class="fw-semibold">
                                    {{ $asset->industry_name }}
                                </td>

                                <td>
                <span class="d-inline-block text-truncate" style="max-width: 520px;">
                  {{ $asset->description ?? '—' }}
                </span>
                                </td>

                                <td>
                                    @php $contactsCount = $asset->allContact->count(); @endphp
                                    <span class="badge bg-secondary">{{ $contactsCount }}</span>

                                    @if($contactsCount > 0)
                                        <a class="btn btn-sm btn-outline-secondary ms-2"
                                           data-bs-toggle="collapse"
                                           href="#contacts-{{ $asset->id }}"
                                           role="button"
                                           aria-expanded="false"
                                           aria-controls="contacts-{{ $asset->id }}">
                                            Pokaż
                                        </a>

                                        <div class="collapse mt-2" id="contacts-{{ $asset->id }}">
                                            <ul class="list-unstyled small mb-0">
                                                @foreach($asset->allContact as $contact)
                                                    <li>{{ $contact->first_name }} {{ $contact->last_name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    Brak danych do wyświetlenia.
                                    <a href="{{ route('industry.create') }}" class="ms-1">Dodaj pierwszą branżę</a>.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Paginacja (jeśli używasz paginate()) --}}
            @if(method_exists($lista, 'links'))
                <div class="card-footer d-flex justify-content-end">
                    {{ $lista->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
@endsection
