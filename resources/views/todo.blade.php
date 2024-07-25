<body>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@2.0.1"
        integrity="sha384-QWGpdj554B4ETpJJC9z+ZHJcA/i59TyjxEPXiiUgN2WmTyV5OEZWCD6gQhgkdpB/"
        crossorigin="anonymous"></script>
</body>

<div class="flex justify-center bg-slate-500 p-5">
    <form action="/new-todo" method="POST" class="flex flex-col space-y-2 ">
        <h1 class="text-3xl text-green-400">Create new todo</h1>
        @csrf
        <input type="text" name="title" placeholder="title">
        <input type="text" name="description" placeholder="description">
        <button type="submit">Submit</button>
    </form>
</div>


@foreach ($todos as $todo)
    <li>{{ $todo->title }}</li>
    <li>{{ $todo->description }}</li>
    <li>{{ $todo->completed }}</li>
@endforeach

<div class="flex justify-center">
    <table class="border border-collapse border-slate-500">
        <tr>
            <th class="border border-slate-900 bg-amber-300">Title</th>
            <th class="border border-slate-900 bg-orange-300">Description</th>
            <th class="border border-slate-900 bg-red-500">Completed</th>
        </tr>
        @foreach ($todos as $todo)
            <tr>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->description }}</td>
                <td id="status-{{ $todo->id }}">
                    @if ($todo->completed == 0)
                        False
                    @else
                        True
                    @endif
                    <!-- {{ $todo->completed }} -->
                </td>
                <td>
                    <form>
                        @csrf
                        <button type='submit' hx-post="/edit/{{ $todo->id }}/status/{{ $todo->completed }}"
                            hx-target="#status-{{ $todo->id }}">Update
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>

<div id="state">
    {{ $state }}
</div>

xd: {{ $xd }}