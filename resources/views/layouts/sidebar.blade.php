<li class="sidebar-toggler-wrapper">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler">
    </div>
    <div class="clearfix">
    </div>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
</li>
<li class="start active ">
    <a href="index">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
    </a>
</li>
{{-- Pembeli --}}
@if (Auth::user()->role == 'pembeli')
    <li>
        <a href="javascript:;">
            <i class="icon-puzzle"></i>
            <span class="title">Category</span>
        </a>
    </li>
    <li>
        <a href="javascript:;">
            <i class="icon-present"></i>
            <span class="title">Keranjang</span>
        </a>
    </li>
    <li>
        <a href="javascript:;">
            <i class="icon-user"></i>
            <span class="title">Profile</span>
        </a>
    </li>
@elseif (Auth::user()->role == 'staff')
    <li>
        <a href="/product">
            <i class="icon-anchor"></i>
            <span class="title">Product</span>
        </a>
    </li>
    <li>
        <a href="javascript:;">
            <i class="icon-book-open"></i>
            <span class="title">Category</span>
        </a>
    </li>
    <li>
        <a href="javascript:;">
            <i class="icon-pin"></i>
            <span class="title">Type</span>
        </a>
    </li>
    <li>
        <a href="javascript:;">
            <i class="icon-vector"></i>
            <span class="title">Discount</span>
        </a>
    </li>
@endif
