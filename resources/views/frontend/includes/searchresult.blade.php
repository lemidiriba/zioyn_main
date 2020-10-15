@if ($search_result->isEmpty())
<ul class="blog-info-link mt-3 mb-4">
    <li> <b> Search Result .....</b></li>
    <li class="alert-warning"> Match Not Found</li>
</ul>
@else


<ul class="blog-info-link mt-3 mb-4">
    <li><b> Search Result .....</b> </li>
    <li class="alert-info"> {{ count($search_result) }}</li>
</ul>
@for ($i = 0; $i < count($search_result); $i++) @if ($i < count($school_data) && $i < 30) <h3>
    {{ ucwords($search_result[$i]->title) }} {{ $search_result[$i]->type }}
    </h3>

    <p class="excert">

        {{ ucwords($search_result[$i]->title) }}
        <span>{{ ucwords($search_result[$i]->searchable->schooladdress) }}</span>
        <a href="{{ $search_result[$i]->url }}" style="color:#eb566c !important;"> see
            More</a>

    </p>@endif
    @endfor
    {{-- {{  $search_result->render() }} --}}


    @endif

    @push('after-script')

    @endpush