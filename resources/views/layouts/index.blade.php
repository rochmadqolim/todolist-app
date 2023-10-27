@push('styles')
    @livewireStyles
@endpush

@push('js')
    @livewireScripts
@endpush

<ul class="list-group">
    @foreach ($tasks as $item)
    <li class="list-group-item card mb-3 @if ($item->status === "1") bg-dark text-white @endif">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>{{ $item->title }}</h4>
                </div>
                <div class="col-md-6 text-end text-dark">
                    <div class="btn-group btn-lg">
                        <form action="status/{{ $item->id }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary " id="{{ $item->id }}">
                                <i class="bi bi-check2-square"> Checklist</i>
                            </button>
                        </form>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#detail{{ $item->id }}" class="btn btn-secondary">
                            <i class="bi bi-pencil-square"> Update</i>
                        </button>
                        <form method="POST" action="destroy/{{  $item->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger " id="{{ $item->id }}">
                                <i class="bi bi-x-square"> Delete</i>
                            </button>
                        </form>
                        </div>
                </div>
            </div>
            {{ $item->description }}
        </div>
    </li>
    @endforeach
</ul>   