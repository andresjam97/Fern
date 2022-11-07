<div class="table-responsive">
    <table class="table table-stripped table-hover">
        <thead class="table-dark">
        <tr>
            @foreach ($headers as $header)
                <th class="text-left p-4 font-medium">
                    {{ $header }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>

</div>
