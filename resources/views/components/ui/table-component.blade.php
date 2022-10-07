<table class="table-auto w-full">
    <thead class="border-b">
        <tr class="bg-gray-200">
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
