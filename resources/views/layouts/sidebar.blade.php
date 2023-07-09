<li class="sidebar-toggler-wrapper">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler">
    </div>
    <div class="clearfix">
    </div>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
</li>
@if (Auth::user()->role != 'owner')
    <li class="active">
        <a href="/" name="Dashboard">
            <i class="icon-home"></i>
            <span class="title">Dashboard</span>
            <span class="selected"></span>
        </a>
    </li>
@endif
{{-- Pembeli --}}
@if (Auth::user()->role == 'pembeli')
    <li>
        <a href="{{ route('pembeliCategory') }}" name="Category">
            <i class="icon-puzzle"></i>
            <span class="title">Category</span>
        </a>
    </li>
    <li>
        <a href="{{ route('cart') }}" name="Keranjang">
            <i class="icon-present"></i>
            <span class="title">Keranjang</span>
        </a>
    </li>
    <li>
        <a href="{{ route('historyTransaksi') }}" name="History">
            <i class="icon-calendar"></i>
            <span class="title">Transaction History</span>
        </a>
    </li>
    <li>
        <a href="{{ route('profile') }}">
            <i class="icon-user"></i>
            <span class="title">Profile</span>
        </a>
    </li>
    {{-- OWNER --}}
@elseif (Auth::user()->role == 'owner')
    <li>
        <a href="{{ route('staff.index') }}">
            <i class="icon-user"></i>
            <span class="title">Staff</span>
        </a>
    </li>
    <li>
        <a href="{{ route('laporan.index') }}">
            <i class="icon-book-open"></i>
            <span class="title">Laporan Transaksi</span>
        </a>
    </li>
    <li>
        <a href="{{ route('product.index') }}">
            <i class="icon-anchor"></i>
            <span class="title">Product</span>
        </a>
    </li>
    <li>
        <a href="{{ route('category.index') }}">
            <i class="icon-book-open"></i>
            <span class="title">Category</span>
        </a>
    </li>
    <li>
        <a href="{{ route('type.index') }}">
            <i class="icon-pin"></i>
            <span class="title">Type</span>
        </a>
    </li>
    <li>
        <a href="{{ route('discount.index') }}">
            <i class="icon-vector"></i>
            <span class="title">Discount</span>
        </a>
    </li>
@elseif (Auth::user()->role == 'staff')
    <li>
        <a href="{{ route('product.index') }}">
            <i class="icon-anchor"></i>
            <span class="title">Product</span>
        </a>
    </li>
    <li>
        <a href="{{ route('category.index') }}">
            <i class="icon-book-open"></i>
            <span class="title">Category</span>
        </a>
    </li>
    <li>
        <a href="{{ route('type.index') }}">
            <i class="icon-pin"></i>
            <span class="title">Type</span>
        </a>
    </li>
    <li>
        <a href="{{ route('discount.index') }}">
            <i class="icon-vector"></i>
            <span class="title">Discount</span>
        </a>
    </li>
@endif
