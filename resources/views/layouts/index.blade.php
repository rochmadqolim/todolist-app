<ul class="list-group">
    @foreach ($tasks as $item)
    <li class="list-group-item card mb-3 @if ($item->status === "1") bg-dark text-white @endif">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h4>{{ $item->title }}</h4>
                </div>
                <div class="col-12 col-md-6 text-center text-md-end">
                    <div class="btn-group">
                        <form action="status/{{ $item->id }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary" id="{{ $item->id }}">
                                @if($item->status == 0)
                                    <i class="bi bi-square"></i> Checklist
                                @else
                                    <i class="bi bi-check2-square"></i> Checklist
                                @endif
                            </button>
                        </form>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#detail{{ $item->id }}" class="btn btn-secondary">
                            <i class="bi bi-pencil-square"></i> Update
                        </button>
                        <form method="POST" action="destroy/{{ $item->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" id="{{ $item->id }}">
                                <i class="bi bi-x-square"></i> Delete
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
