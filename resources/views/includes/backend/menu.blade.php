<div>
    <h2>Menu</h2>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('backend.categories.index') }}">Dashboard</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('backend.categories.index') }}">Categories</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('backend.products.index') }}">Products</a>
        </li>
        <li class="list-group-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-default">Logout</button>
            </form>
        </li>
    </ul>
</div>