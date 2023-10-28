<ul class="list-group mb-5">
    @foreach ($tasks as $item)
    <li class="list-group-item card mb-3 @if ($item->status === "1") bg-dark text-white completed @endif">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-10">
                    <h1>{{ $item->title }}</h1>
                    <p>{{ $item->description }}</p>
                </div>
                <div class="col-12 col-md-2">
                    <div class="text-center text-md-end">
                        <div class="mb-2">
                            <form action="status/{{ $item->id }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-light fst-italic fs-5" style="background-color: #4BA3C9;" id="{{ $item->id }}">
                                    @if($item->status == 0)
                                        <i class="bi bi-square" style="color: white;"> Check</i>
                                    @else
                                        <i class="bi bi-check2-square" style="color: black;"> Uncheck</i>
                                    @endif
                                </button>
                            </form>
                        </div>
                        <div class="mb-2">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#detail{{ $item->id }}" class="fst-italic btn btn-light fs-5" style="background-color: #D3D3D3; color: black;">
                                <i class="bi bi-pencil-square"></i> Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
        <div class="text-center text-md-end mt-2">
            <form method="POST" action="destroy/{{ $item->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-light fst-italic fs-5" style="background-color: #FF6B6B; color: black;" id="{{ $item->id }}">
                    <i class="bi bi-x-square"></i> Delete
                </button>
            </form>
        </div>
        </div>
    </li>
    @endforeach
</ul>
