
    <div class="col-md-6">
        <div class="{{ $settings9['column_class'] }}" style="overflow-x: auto;">
            <h3>{{ $settings9['chart_title'] }}</h3>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    @foreach($settings9['fields'] as $key => $value)
                        <th>
                            {{ trans(sprintf('cruds.%s.fields.%s', $settings9['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @forelse($settings9['data'] as $entry)
                    <tr>
                        @foreach($settings9['fields'] as $key => $value)
                            <td>
                                @if($value === '')
                                    {{ $entry->{$key} }}
                                @elseif(is_iterable($entry->{$key}))
                                    @foreach($entry->{$key} as $subEentry)
                                        <span class="label label-info">{{ $subEentry->{$value} }}</span>
                                    @endforeach
                                @else
                                    {{ data_get($entry, $key . '.' . $value) }}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($settings9['fields']) }}">{{ __('No entries found') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-6">
        <div class="{{ $settings10['column_class'] }}" style="overflow-x: auto;">
            <h3>{{ $settings10['chart_title'] }}</h3>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    @foreach($settings10['fields'] as $key => $value)
                        <th>
                            {{ trans(sprintf('cruds.%s.fields.%s', $settings10['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @forelse($settings10['data'] as $entry)
                    <tr>
                        @foreach($settings10['fields'] as $key => $value)
                            <td>
                                @if($value === '')
                                    {{ $entry->{$key} }}
                                @elseif(is_iterable($entry->{$key}))
                                    @foreach($entry->{$key} as $subEentry)
                                        <span class="label label-info">{{ $subEentry->{$value} }}</span>
                                    @endforeach
                                @else
                                    {{ data_get($entry, $key . '.' . $value) }}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($settings10['fields']) }}">{{ __('No entries found') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

