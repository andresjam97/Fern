<div class="table-responsive">
    <table class="table table-stripped table-auto w-full">
        <thead>
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
