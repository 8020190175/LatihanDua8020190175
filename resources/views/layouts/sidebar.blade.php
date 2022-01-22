@if(auth()->user()->level == 'Admin')
    <li>
        <a @if(Route::current()->action['as'] == 'buku.index') class='active-menu' @endif
        href="{{ route('buku.index') }}"><i class="fa fa-table"></i>Buku</a>
    </li>
@endif