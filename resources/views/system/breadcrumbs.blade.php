@if ($breadcrumbs)
    <div class="page-bar">
        <ol class="page-breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && !$breadcrumb->last)
                    <li>
                        <a href="{{ $breadcrumb->url }}">
                            @if ($breadcrumb->icon)<i class="{{ $breadcrumb->icon }}">&nbsp;</i>@endif
                            {{ $breadcrumb->title }}
                        </a><i class="fa fa-angle-right"></i>
                    </li>
                @else
                    <li class="active"><span>{{ $breadcrumb->title }}</span></li>
                @endif
            @endforeach
        </ol>
    </div>
@endif