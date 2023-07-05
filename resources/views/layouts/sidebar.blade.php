<li class="sidebar-toggler-wrapper">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler">
    </div>
    <div class="clearfix">
    </div>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
</li>
<li class="start active ">
    <a href="index.html">
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
@else
@endif
