@props(['tenders', 'noFilesMessage'])

@foreach ($tenders as $tender)
    <tr>
        <td>{{ $tender->tender_number }}</td>
        <td>{{ $tender->title }}</td>
        <td>{{ $tender->details }}</td>

        <td>{{ $tender->bond_cost_text }} {{ $tender->bond_currency_text }} </td>
        <td>{{ $tender->tender_cost_text }} {{ $tender->tender_cost_currency_text }} </td>
        <td>{{ $tender->close_date }}</td>
        <td>
            @if ($tender->attachments->count() > 0)
                @foreach ($tender->attachments as $attachment)
                    <div class="mt-1">
                        <a href="{{ asset($attachment->file_url) }}" class="btn btn-primary btn-sm"
                            download>{{ $attachment->file_name }}
                        </a>
                    </div>
                @endforeach
            @else
                <span class="text-muted">{{ $noFilesMessage }}</span>
            @endif
        </td>

    </tr>
@endforeach
